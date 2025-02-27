@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-purple-300 p-6">
    <div class="relative w-full max-w-lg">
        {{-- Speech Bubble --}}
        <div class="relative flex items-start space-x-2">
            <img src="{{ asset('images/homeimage.png') }}" alt="Character" class="w-20 h-20 relative -top-2">
            <div class="bg-white text-gray-800 p-4 rounded-lg shadow  text-center border border-solid ">
                You go, get that lists done!
            </div>
        </div>
        {{-- Task List Area --}}
        <div class="bg-purple-200 rounded-2xl p-6 shadow-lg w-[400px] h-[400px] relative">
            <div class="min-h-[200px]">
                {{-- Tasks will be displayed here --}}
            </div>
            <a href="{{ route('todolist.create') }}" class="absolute bottom-4 right-4">
            <button class="mt-4 px-4 py-2 bg-white text-gray-800 rounded-md shadow transition duration-300 hover:bg-purple-300 hover:shadow-lg">
                Add new task
            </button>
            </a>
        </div>
    </div>
</div>
@endsection