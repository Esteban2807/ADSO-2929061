@extends('layouts.app')

@section('title', 'Larapets: Add Adoption')

@section('content')
    @include('partials.navbar')
    <h1 class="mt-6 text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z"></path>
        </svg>
        Add Adoption
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
                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z"></path>
                    </svg>
                    Add Adoption
                </span>
            </li>
        </ul>
    </div>
    <div class="card text-white md:w-[720px] w-[320px] bg-black/20 p-4 mb-4 rounded mx-auto">
        <form method="POST" action="{{ url('adoptions') }}" class="flex flex-col gap-4 mt-4">
            @csrf
            {{-- User --}}
            <div>
                <label class="label text-white">Select User:</label>
                <select name="user_id" class="select bg-[#0009] outline-0 w-full">
                    <option value="">Select User...</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>{{ $user->fullname }} ({{ $user->email }})</option>
                    @endforeach
                </select>
                @error('user_id')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>
            {{-- Pet --}}
            <div>
                <label class="label text-white">Select Pet (Only Available):</label>
                <select name="pet_id" class="select bg-[#0009] outline-0 w-full">
                    <option value="">Select Pet...</option>
                    @foreach($pets as $pet)
                        <option value="{{ $pet->id }}" @if(old('pet_id') == $pet->id) selected @endif>{{ $pet->name }} ({{ $pet->kind }} - {{ $pet->breed }})</option>
                    @endforeach
                </select>
                @error('pet_id')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-outline hover:bg-[#fff6] hover:text-white mt-3 w-full">Add Adoption</button>
        </form>
    </div>
@endsection
