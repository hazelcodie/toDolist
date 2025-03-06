@extends('layouts.app')

@section('content')
    <div class="min-h-screen p-8">
        <div class="max-w-4xl mx-auto">

            {{-- Search Bar --}}
            <div class="flex justify-center mb-6">
                <input type="text" id="search" placeholder=" Search"
                    class="w-full max-w-lg px-4 py-2 rounded-lg bg-gray-200 text-gray-700 focus:ring-purple-500 border-none">
            </div>

            {{-- Title and Add Button --}}
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <x-heroicon-s-book-open class="w-8 h-8 mr-2" />
                <h2 class="text-lg font-bold text-gray-900">TASKS</h2>
                </div>
                <a href="{{ route('todolist.create') }}">
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-900 hover:bg-gray-900 hover:text-white transition">
                        +
                    </button>
                </a>
            </div>

            {{-- Cards Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($todos as $todo)
                    <div onclick="openModal({{ $todo->title }}, {{ $todo->description }}, '{{ $todo->created_at->format('F d, Y') }}')"
                        class="w-64 h-64 p-4 rounded-lg shadow-md bg-purple-200 flex flex-col justify-between transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-purple-100">
                        <h3 class="font-bold text-gray-900">{{ $todo->title }}</h3>
                        <p class="text-gray-700 text-sm flex-grow flex items-center">{{ $todo->description }}</p>
                        <p class="text-xs text-gray-600 mt-2 ">{{ $todo->created_at->format('F d, Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.getElementById("search").addEventListener("input", function() {
            let searchValue = this.value.toLowerCase();
            let cards = document.querySelectorAll(".grid div");

            cards.forEach(card => {
                let title = card.querySelector("h3").innerText.toLowerCase();
                card.style.display = title.includes(searchValue) ? "block" : "none";
            });
        });

        function openModal(title, description, date) {
            document.getElementById("modalTitle").innerText = title;
            document.getElementById("modalDescription").innerText = description;
            document.getElementById("modalDate").innerText = date;
            document.getElementById("taskModal").classList.remove("hidden");
        }
    </script> 
@endsection
