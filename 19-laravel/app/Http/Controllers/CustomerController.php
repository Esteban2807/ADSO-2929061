<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function myprofile()
    {
        $user = User::find(Auth::user()->id);
        //dd($user->toArray());
        return view('customer.myprofile')->with('user', $user);
    }
    public function updatemyprofile(Request $request)
    {
        $validation = $request->validate([
            'document' => ['required', 'numeric', 'unique:' . User::class . ',document,' . $request->id],
            'fullname' => ['required', 'string'],
            'gender' => ['required'],
            'birthdate' => ['required', 'date'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class . ',email,' . $request->id],
        ]);
        if ($validation) {
            // dd($request->all());
            if ($request->hasfile('photo')) {
                $photo = 'images/' . time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
                if ($request->originphoto != 'images/no-photo.jpg' && file_exists(public_path($request->originphoto))) {
                    unlink(public_path($request->originphoto));
                }
            }
            $user = User::find($request->id);
            $user->document = $request->document;
            $user->fullname = $request->fullname;
            $user->gender = $request->gender;
            $user->birthdate = $request->birthdate;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if($user->save()) {
                return redirect('dashboard')->with('message', 'Perfil actualizado correctamente');
            }

        }
    }
    public function myadoptions() {
        $adoptions = Adoption::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
       // return dd($adoptions->toArray());
       return view('customer.myadoptions')->with('adoptions', $adoptions);
    }
    public function showmyadoption(Request $request) {
        $adoption = Adoption::find($request->id);
        //return dd($adoption->toArray());
        return view('customer.showmyadoption')->with('adoption', $adoption);
    }
    public function search(Request $request){
        $adoptions = Adoption::names($request->q)->with(['user', 'pet'])->orderBy('id','desc')->paginate(12);
        return view('customer.search')->with('adoptions',$adoptions);
    }
    public function searchpets(Request $request){
        $pets = Pet::names($request->q)->orderBy('name','asc')->paginate(12);
        return view('customer.searchpets')->with('pets',$pets);
    }
    public function listpets() {
        $pets = Pet::where('status',0)->orderBy('name','asc')->paginate(12);
        // return dd($pets->toArray());
        return view('customer.listpets')->with('pets',$pets);
    }
    public function showpet(Request $request) {
        $pet = Pet::find($request->id);
        //return dd($pet->toArray());
        return view('customer.showpet')->with('pet', $pet);
    }
    public function makeadoption(Request $request)
    {
        $pet_id = $request->pet_id;

        $userId = Auth::user()->id;
        $adoptionsCount = Adoption::where('user_id', $userId)->count();

        if ($adoptionsCount >= 3) {
            return redirect('listpets')->with('error', 'You already have 3 adoptions. You cannot adopt more pets.');
        }

        $adoption = new Adoption;
        $adoption->user_id = $userId;
        $adoption->pet_id = $pet_id;

        if ($adoption->save()) {
            $pet = Pet::find($pet_id);
            $pet->status = 1;
            $pet->save();

            return redirect('listpets')->with('message', 'The pet was adopted successfully.');
        }

        return redirect('listpets')->with('error', 'The adoption could not be saved. Please try again.');
    }
}
