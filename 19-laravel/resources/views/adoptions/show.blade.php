@extends('layouts.app')

@section('title', 'Larapets: Show Adoption')

@section('content')
@include('partials.navbar')
<h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
        </svg>
        Show Adoption
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
                        <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                    </svg>
                    Show Adoption
                </span>
            </li>
        </ul>
    </div>
    {{-- Card --}}
    <div class="bg-[#0009] p-10 rounded-sm">
        <div class="flex flex-col md:flex-row gap-10 justify-center">
            {{-- User Data --}}
            <div class="flex flex-col items-center">
                <h2 class="text-2xl text-white mb-4">Adopter User</h2>
                <div class="avatar">
                    <div class="mask mask-squircle w-48">
                        <img src="{{ asset($adoption->user->photo) }}" />
                    </div>
                </div>
                <ul class="list bg-[#0006] mt-4 text-white rounded-box shadow-md w-full">
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Name:</span> <span>{{ $adoption->user->fullname }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Email:</span> <span>{{ $adoption->user->email }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Phone:</span> <span>{{ $adoption->user->phone }}</span>
                    </li>
                </ul>
            </div>
            
            {{-- Pet Data --}}
            <div class="flex flex-col items-center">
                <h2 class="text-2xl text-white mb-4">Adopted Pet</h2>
                <div class="avatar">
                    <div class="mask mask-squircle w-48">
                        <img src="{{ asset($adoption->pet->image) }}" class="object-cover" />
                    </div>
                </div>
                <ul class="list bg-[#0006] mt-4 text-white rounded-box shadow-md w-full">
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Name:</span> <span>{{ $adoption->pet->name }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Kind:</span> <span>{{ $adoption->pet->kind }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Breed:</span> <span>{{ $adoption->pet->breed }}</span>
                    </li>
                </ul>
            </div>
        </div>
        
        {{-- Adoption Data --}}
        <div class="flex justify-center mt-10">
            <ul class="list bg-[#0006] text-white rounded-box shadow-md w-full md:w-96">
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold text-center w-full">Adoption Details</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Date:</span> <span>{{ $adoption->created_at->format('l, F j, Y') }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Time:</span> <span>{{ $adoption->created_at->format('g:i A') }}</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
