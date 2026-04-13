<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdoptionsExport;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adoptions = Adoption::with(['user', 'pet'])->orderBy('id', 'desc')->paginate(12);
        return view('adoptions.index')->with('adoptions', $adoptions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $pets = Pet::where('status', 0)->get(); // Only pets that are not adopted
        return view('adoptions.create', compact('users', 'pets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'pet_id' => ['required', 'exists:pets,id'],
        ]);

        if($validation){
            $adoption = new Adoption;
            $adoption->user_id = $request->user_id;
            $adoption->pet_id = $request->pet_id;
            
            if($adoption->save()){
                // Update pet status
                $pet = Pet::find($request->pet_id);
                $pet->status = 1;
                $pet->save();

                return redirect('adoptions')->with('message','The Adoption was created successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Adoption $adoption)
    {
        return view('adoptions.show')->with('adoption', $adoption);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adoption $adoption)
    {
        $users = User::all();
        $pets = Pet::all(); // In edit mode we show all pets or maybe just the current one + available ones
        return view('adoptions.edit', compact('adoption', 'users', 'pets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adoption $adoption)
    {
        $validation = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'pet_id' => ['required', 'exists:pets,id'],
        ]);

        if($validation){
            // If pet changed, update statuses
            if ($adoption->pet_id != $request->pet_id) {
                // Reset old pet status
                $oldPet = Pet::find($adoption->pet_id);
                $oldPet->status = 0;
                $oldPet->save();

                // Set new pet status
                $newPet = Pet::find($request->pet_id);
                $newPet->status = 1;
                $newPet->save();
            }

            $adoption->user_id = $request->user_id;
            $adoption->pet_id = $request->pet_id;
            
            if($adoption->save()){
                return redirect('adoptions')->with('message','The Adoption was updated successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adoption $adoption)
    {
        // Reset pet status
        $pet = Pet::find($adoption->pet_id);
        if ($pet) {
            $pet->status = 0;
            $pet->save();
        }

        if($adoption->delete()){
            return redirect('adoptions')->with('message','The Adoption was deleted successfully');
        }
    }

    public function pdf()
    {
        $adoptions = Adoption::with(['user', 'pet'])->get();
        $pdf = Pdf::loadView('adoptions.pdf', compact('adoptions'));
        return $pdf->download('alladoptions.pdf');
    }

    public function excel()
    {
        return Excel::download(new AdoptionsExport(), 'alladoptions.xlsx');
    }

    public function search(Request $request){
        $adoptions = Adoption::names($request->q)->with(['user', 'pet'])->orderBy('id','desc')->paginate(12);
        return view('adoptions.search')->with('adoptions',$adoptions);
    }
}
