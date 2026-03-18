@extends('layouts.app')
@section('title', 'Larapets: Register')
        @section('content')
        @include('partials.navbar')
        <section class="bg-[#0009] outline w-96 flex flex-col justify-center text-white items-center p-4 rounded-sm">
            <h1 class="text-2xl flex gap-1 border-b-2 pb-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" viewBox="0 0 256 256"><path d="M128,112a28,28,0,0,0-8,54.83V184a8,8,0,0,0,16,0V166.83A28,28,0,0,0,128,112Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,128,152Zm80-72H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96ZM208,208H48V96H208V208Z"></path></svg> Register
            </h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="w-full md:w-80 flex flex-col flex-wrap">
                    <label for="document" class="block w-full text-sm font-medium text-white">Document</label>
                    <input id="document" class="block  mt-1 w-full p-2 border border-gray-300 rounded-md" type="text" name="document" :value="old('document')" required autofocus autocomplete="document" />
                    @error('document')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <label for="fullname" class="block text-sm font-medium text-white">Fullname</label>
                    <input id="fullname" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="text" name="fullname" :value="old('fullname')" required autofocus autocomplete="fullname" />
                    @error('fullname')


                    
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <label for="gender" class="block text-sm font-medium text-white">Gender</label>
                    <select name="gender" id="" class="w-full p-2">
                        <option class="bg-[#0009]" value="male">Male</option>
                        <option class="bg-[#0009]" value="female">Female</option>
                    </select>
                    @error('gender')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <label for="phone" class="block text-sm font-medium text-white">Phone</label>
                    <input id="phone" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                    @error('phone')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <label for="birthdate" class="block text-sm font-medium text-white">Birthdate</label>
                    <input id="birthdate" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="date" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="birthdate" />
                    @error('birthdate')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <label for="email" class="block text-sm font-medium text-white">Email</label>
                    <input id="email" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <label for="password" class="block text-sm font-medium text-white">Password</label>
                    <input id="password" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="password" name="password" required autocomplete="new-password" />
                    @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <button class="btn btn-primary text-white" type="submit">Register</button>

                </div>
            </form>
        </section>
        @endsection
            

    </main>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>

</html>

