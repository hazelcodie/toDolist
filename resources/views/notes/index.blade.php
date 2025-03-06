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
                    <x-heroicon-o-book-open class="w-8 h-8 mr-2" />
                    <h2 class="text-lg font-bold text-gray-900">NOTES</h2>
                </div>
                <a href="{{ route('notes.create') }}">
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-900 hover:bg-gray-900 hover:text-white transition">
                        +
                    </button>
                </a>
            </div>

            {{-- Cards Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 ">
                @foreach ($notes as $note)
                    <div onclick="openModal('{{ $note->title }}', '{{ $note->description }}', '{{ $note->created_at->format('F d, Y') }}')"
                        class="w-64 h-64 p-4 rounded-xl shadow-md bg-purple-200 flex flex-col justify-between transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-purple-100">
            
                        <div class="flex justify-between items-center relative">
                            <h3 class="font-bold text-gray-900">{{ $note->title }}</h3>
                            <button onclick="toggleIcons(event, this)"
                                class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                <x-heroicon-o-ellipsis-horizontal class="w-6 h-6" />
                            </button>
                            <!-- Dropdown menu for edit & delete (hidden by default) -->
                            <div class="absolute right-0 mt-8 w-24 bg-white shadow-md rounded-lg p-2 hidden z-10">
                                <a href="{{ route('notes.edit', $note->id) }}" onclick="event.stopPropagation()">
                                    <button class="flex items-center text-gray-500 hover:text-gray-700 w-full">
                                        <x-heroicon-o-pencil-square class="w-5 h-5 mr-2" />
                                        Edit
                                    </button>
                                </a>
                                <form action="{{ route('notes.destroy', $note->id) }}" method="POST"
                                    onclick="event.stopPropagation()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center text-red-500 hover:text-red-700 w-full mt-1">
                                        <x-heroicon-o-trash class="w-5 h-5 mr-2" />
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p class="text-gray-700 text-sm flex-grow flex items-center">{{ $note->description }}</p>
                        <p class="text-xs text-gray-600 mt-2 ">{{ $note->created_at->format('F d, Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="taskModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 id="modalTitle" class="text-xl font-bold mb-4"></h2>
            <p id="modalDescription" class="text-gray-700 mb-4"></p>
            <p id="modalDate" class="text-gray-600 text-sm"></p>
            <button onclick="closeModal()"
                class="mt-4 px-4 py-2 bg-purple-500 text-white rounded-lg shadow-md hover:bg-purple-600 justify-end">Close</button>
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
            document.getElementById("taskModal").classList.remove("hidden"); // Shows the modal
        }

        function closeModal() {
            document.getElementById("taskModal").classList.add("hidden"); // Hides the modal
        }

        function toggleIcons(event, button) {
            event.stopPropagation(); // Prevent the click event from triggering the openModal function
            let menu = button.nextElementSibling;
            document.querySelectorAll('.relative .hidden').forEach(div => {
                if (div !== menu) div.classList.add('hidden');
            });
            menu.classList.toggle('hidden');
        }

        // Close modal if the background (dark area) is clicked
        document.getElementById("taskModal").addEventListener("click", function(event) {
            // Check if the click is on the background (not the modal content)
            if (event.target === this) {
                closeModal(); // Close the modal if the background is clicked
            }
        });

        // Close the dropdown menu when clicking outside
        document.addEventListener("click", function(event) {
            document.querySelectorAll(".relative .absolute").forEach(div => {
                if (!div.contains(event.target) && !event.target.closest(".relative")) {
                    div.classList.add("hidden");
                }
            });
        });
    </script>
@endsection
