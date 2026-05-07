@extends('layouts.app')

@section('title', 'Larapets: List Pets')

@section('content')
    @include('partials.navbar')
    <h1
        class="bg-black/80 mt-6 text-4xl text-white flex gap-2 items-center justify-center p-6 pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="#ffffff" viewBox="0 0 256 256">
            <path
                d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
            </path>
        </svg>
        List Pets
    </h1>
    {{-- Options --}}
    <div class="flex flex-col gap-4 justify-center items-center">
        {{-- Search --}}
        <label class="input text-white bg-[#0009] w-58 md:w-112 outline outline-white mb-10">
            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
            <input type="search" placeholder="Search..." name="qsearch" id="qsearch" />
        </label>
    </div>
    <table class="table bg-black/80 text-white">
        <thead class="text-white text-xl">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Kind</th>
                <th>Breed</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="datalist">
            @foreach ($pets as $pet)
                <tr>
                    <td>{{ $pet->id }}</td>
                    <td>
                        <img src="{{ asset($pet->image) }}" alt="{{ $pet->name }}" class="w-12 h-12 rounded-full object-cover">
                    </td>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->kind }}</td>
                    <td>{{ $pet->breed }}</td>
                    <td>{{ $pet->location }}</td>
                    <td>
                        <a href="{{ url("showpet/{$pet->id}") }}" class="btn btn-outline btnxs btn-default">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                                <path
                                    d="M230.33,141.06a24.34,24.34,0,0,0-18.61-4.77C230.5,117.33,240,98.48,240,80c0-26.47-21.29-48-47.46-48A47.58,47.58,0,0,0,156,48.75,47.58,47.58,0,0,0,119.46,32C93.29,32,72,53.53,72,80c0,11,3.24,21.69,10.06,33a31.87,31.87,0,0,0-14.75,8.4L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM119.46,48A31.15,31.15,0,0,1,148.6,67a8,8,0,0,0,14.8,0,31.15,31.15,0,0,1,29.14-19C209.59,48,224,62.65,224,80c0,19.51-15.79,41.58-45.66,63.9l-11.09,2.55A28,28,0,0,0,140,112H100.68C92.05,100.36,88,90.12,88,80,88,62.65,102.41,48,119.46,48ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9Z">
                                </path>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="8" class="text-center">{{ $pets->links() }}</td>
            </tr>
        </tbody>
    </table>
@endsection

@section('js')
    @if (session('message'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('message') }}",
                showConfirmButton: false,
                timer: 4500
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 4500
            });
        </script>
    @endif
    <script>

        // Search
        function debounce(func, wait) {
            let timeout
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout)
                    func(...args)
                };
                clearTimeout(timeout)
                timeout = setTimeout(later, wait)
            }
        }

        const search = debounce(function (query) {
            $token = $('input[name=_token]').val()
            $.post("search/listpets", { 'q': query, '_token': $token },
                function (data) {
                    $('.datalist').html(data).hide().fadeIn(1000)
                }
            )
        }, 500)

        $('body').on('input', '#qsearch', function (event) {
            event.preventDefault()
            const query = $(this).val()
            $('.datalist').html(`<tr>
                                            <td colspan="6" class="text-center py-18">
                                                <span class="loading loading-spinner loading-xl"></span>
                                            </td>
                                        </tr>`)
            if (query != '') {
                search(query)
            } else {
                setTimeout(() => {
                    window.location.replace('listpets')
                }, 500)
            }
        })
    </script>
@endsection