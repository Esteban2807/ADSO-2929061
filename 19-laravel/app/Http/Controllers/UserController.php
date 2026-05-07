<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(12);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'document' => ['required', 'numeric',  'unique:'.User::class],
            'fullname' => ['required', 'string'],
            'gender' => ['required'],
            'birthdate' => ['required', 'date'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
        ]);
        if($validation){
            // dd($request->all());
            if($request->hasfile('photo')){
                $photo ='images/'.time().'.'.$request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
            }
            $user = new User;
            $user->document = $request->document;
            $user->fullname = $request->fullname;
            $user->gender = $request->gender;
            $user->birthdate = $request->birthdate;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->photo = $photo;
            
            if($user->save()){
                return redirect('users')->with('message','The User '. $user->fullname .' was created successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validation = $request->validate([
            'document' => ['required', 'numeric', 'unique:'.User::class.' document,'.$user->id],
            'fullname' => ['required', 'string'],
            'gender' => ['required'],
            'birthdate' => ['required', 'date'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.' email,'.$user->id],
            'password' => ['required', 'confirmed'],
        ]);
        if($validation){
            // dd($request->all());
            if($request->hasfile('photo')){
                $photo ='images/'.time().'.'.$request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
                if($request->originphoto != 'images/no-photo.jpg' && file_exists(public_path($request->originphoto))){
                    unlink(public_path($request->originphoto));
                }
            }
            $user->document = $request->document;
            $user->fullname = $request->fullname;
            $user->gender = $request->gender;
            $user->birthdate = $request->birthdate;
            $user->phone = $request->phone;
            $user->email = $request->email;
        //
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        if($user->photo != 'images/no-photo.jpg' && file_exists(public_path($user->photo))){
            unlink(public_path($user->photo));
        }
        if($user->delete()){
            return redirect('users')->with('message','The User '. $user->fullname .' was deleted successfully');
        }
    }
    public function pdf()
    {
        $users = User::all();
        $pdf = Pdf::loadView('users.pdf', compact('users'));
        return $pdf->download('allusers.pdf');
    }
    public function excel()
    {
        return Excel::download(new UsersExport(), 'allusers.xlsx');
    }
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new UsersImport, $file);
        return redirect('users')->with('message','The Users were imported successfully');
    }
    public function search(Request $request){
        $users = User::names($request->q)->orderBy('id','desc')->paginate(12);
        return view('users.search')->with('users',$users);
    }
}
