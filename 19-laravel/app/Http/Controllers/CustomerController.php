<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
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
}

