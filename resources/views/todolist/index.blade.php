@extends('layouts.app')

@section('content')
    <div class="min-h-screen p-8">
        <div class="max-w-4xl mx-auto">

            {{-- Buttons Above--}}
            <div class="flex justify-center mb-6">
                <button class="px-8 py-2 bg-gray-200 text-gray-500 rounded-full mr-10 mt-8 hover:bg-pink-500 hover:text-white transition">All Todos</button>
                <button class="px-8 py-2 bg-gray-200 text-gray-500 rounded-full mr-10 mt-8 hover:bg-pink-500 hover:text-white transition">Completed</button>
                <a href="{{ route('todolist.create') }}">
                    <button
                        class="w-10 h-10 px-4 py-2 mt-8 flex items-center justify-center rounded-full border border-white-900 hover:bg-pink-500 hover:text-white transition">
                        +
                    </button>
                </a>
            </div>

            {{-- Bars --}}
            <div class="w-full max-w-md space-y-4">

                <!-- Item 1 (Selected) -->
                <div class="flex items-center justify-between bg-white p-4 rounded-full shadow-md">
                    <div class="flex items-center space-x-3">
                        <div class="w-4 h-4 rounded-full bg-black border-2 border-black"></div>
                        <span class="font-semibold">Title</span>
                        <span class="text-gray-500 text-sm">This is a description of the title.</span>
                    </div>
                    <div class="text-gray-500 cursor-pointer">⋮</div>
                </div>
        </div>
    </div>

    <script>
        function toggleMore(id) {
            let menu = document.getElementById('moreOptions_' + id);
            menu.classList.toggle('hidden');
        }
    </script>
@endsection
