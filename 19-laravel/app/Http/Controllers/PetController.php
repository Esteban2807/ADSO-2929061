<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PetsExport;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::orderBy('id', 'desc')->paginate(12);
        return view('pets.index')->with('pets', $pets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'string'],
            'kind' => ['required', 'string'],
            'weight' => ['required', 'numeric'],
            'age' => ['required', 'numeric'],
            'breed' => ['required', 'string'],
            'location' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image'],
        ]);

        if($validation){
            $image = 'images/pets/'.time().'.'.$request->image->extension();
            $request->image->move(public_path('images/pets'), $image);

            $pet = new Pet;
            $pet->name = $request->name;
            $pet->kind = $request->kind;
            $pet->weight = $request->weight;
            $pet->age = $request->age;
            $pet->breed = $request->breed;
            $pet->location = $request->location;
            $pet->description = $request->description;
            $pet->image = $image;
            
            if($pet->save()){
                return redirect('pets')->with('message','The Pet '. $pet->name .' was created successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('pets.show')->with('pet', $pet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit')->with('pet', $pet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $validation = $request->validate([
            'name' => ['required', 'string'],
            'kind' => ['required', 'string'],
            'weight' => ['required', 'numeric'],
            'age' => ['required', 'numeric'],
            'breed' => ['required', 'string'],
            'location' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        if($validation){
            if($request->hasfile('image')){
                $image = 'images/pets/'.time().'.'.$request->image->extension();
                $request->image->move(public_path('images/pets'), $image);
                if($pet->image != 'images/no-photo.jpg' && file_exists(public_path($pet->image))){
                    unlink(public_path($pet->image));
                }
                $pet->image = $image;
            }

            $pet->name = $request->name;
            $pet->kind = $request->kind;
            $pet->weight = $request->weight;
            $pet->age = $request->age;
            $pet->breed = $request->breed;
            $pet->location = $request->location;
            $pet->description = $request->description;
            
            if($pet->save()){
                return redirect('pets')->with('message','The Pet '. $pet->name .' was updated successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        if($pet->image != 'images/no-photo.jpg' && file_exists(public_path($pet->image))){
            unlink(public_path($pet->image));
        }
        if($pet->delete()){
            return redirect('pets')->with('message','The Pet '. $pet->name .' was deleted successfully');
        }
    }

    public function pdf()
    {
        $pets = Pet::all();
        $pdf = Pdf::loadView('pets.pdf', compact('pets'));
        return $pdf->download('allpets.pdf');
    }

    public function excel()
    {
        return Excel::download(new PetsExport(), 'allpets.xlsx');
    }

    public function search(Request $request){
        $pets = Pet::names($request->q)->orderBy('id','desc')->paginate(12);
        return view('pets.search')->with('pets',$pets);
    }
}
