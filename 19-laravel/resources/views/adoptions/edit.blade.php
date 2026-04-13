@extends('layouts.app')

@section('title', 'Larapets: Edit Adoption')

@section('content')
    @include('partials.navbar')
    <h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
        </svg>
        Edit Adoption
    </h1>
    {{-- Breadcrumbs --}}
    <div class="breadcrumbs text-sm text-white mb-6">
        <ul>
            <li>
                <a href="{{ url('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('adoptions') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path>
                    </svg>
                    Adoption Module
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2 text-white font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
                    </svg>
                    Edit Adoption
                </span>
            </li>
        </ul>
    </div>
    <div class="card text-white md:w-[720px] w-[320px] bg-black/20 p-4 mb-4 rounded mx-auto">
        <form method="POST" action="{{ url('adoptions/'.$adoption->id) }}" class="flex flex-col gap-4 mt-4">
            @csrf
            @method('PUT')
            {{-- User --}}
            <div>
                <label class="label text-white">Select User:</label>
                <select name="user_id" class="select bg-[#0009] outline-0 w-full">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if(old('user_id', $adoption->user_id) == $user->id) selected @endif>{{ $user->fullname }} ({{ $user->email }})</option>
                    @endforeach
                </select>
                @error('user_id')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>
            {{-- Pet --}}
            <div>
                <label class="label text-white">Select Pet:</label>
                <select name="pet_id" class="select bg-[#0009] outline-0 w-full">
                    @foreach($pets as $pet)
                        {{-- Show only if available OR if it's the pet already in this adoption --}}
                        @if($pet->status == 0 || $pet->id == $adoption->pet_id)
                            <option value="{{ $pet->id }}" @if(old('pet_id', $adoption->pet_id) == $pet->id) selected @endif>{{ $pet->name }} ({{ $pet->kind }} - {{ $pet->breed }})</option>
                        @endif
                    @endforeach
                </select>
                @error('pet_id')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-outline hover:bg-[#fff6] hover:text-white mt-3 w-full">Update Adoption</button>
        </form>
    </div>
@endsection
