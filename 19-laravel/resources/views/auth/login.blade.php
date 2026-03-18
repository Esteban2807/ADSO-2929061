@extends('layouts.app')
@section('title', 'Larapets: Login')
@section('content')
@include('partials.navbar')
<section class="bg-[#0009] outline w-96 flex flex-col justify-center text-white items-center p-4 rounded-sm">
    <h1 class="text-2xl flex gap-1 border-b-2 pb-2 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" viewBox="0 0 256 256">
            <path d="M128,112a28,28,0,0,0-8,54.83V184a8,8,0,0,0,16,0V166.83A28,28,0,0,0,128,112Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,128,152Zm80-72H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96ZM208,208H48V96H208V208Z"></path>
        </svg> Login
    </h1>
    <form class="flex flex-col gap-2 w-full" action="{{ url("login") }}" method="POST">
        @csrf
        {{ session('status') }}
        <label class="label text-white" for="">Email</label>
        <input class="input w-full bg-black outlined-1 focus:border-white" value="{{ old('email') }}" type="email" name="email" placeholder="Email">
        @error('email')
        <p class="text-red-500 w-full p-2">{{ $message }}</p>
        @enderror
        <label class="label text-white" for="">Password</label>
        <input class="input w-full bg-black outlined-1 focus:border-white" type="password" name="password" placeholder="Password">
        @error('password')
        <p class="text-red-500 w-full p-2">{{ $message }}</p>
        @enderror
        @error('email')
        <small class="text-red-500 w-full p-2">{{ $message }}</small>
        @enderror
        <button class="btn btn-primary text-white" type="submit">Login</button>
        @if(Route::has('password.request'))
        <a class="text-sm mt-4 pb-1 border-b-1 w-fit text-white hover:text-[#fff6]" href="{{ route('password.request') }}">Forgot your password?</a>
        @endif
    </form>
</section>


@endsection
<script src="{{asset('js/tailwindcss5.js')}}"></script>

</body>

</html>