@extends('layouts.app')

@section('content')

    <div class="bg-pink-200 p-6 rounded-3xl shadow-lg w-[500px]">
        <h2 class="text-center text-lg font-semibold text-gray-800 mb-4">
            Create New To Do
        </h2>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('todolist.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        class="w-full p-2 mt-1 rounded-lg focus:ring focus:ring-blue-300"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea 
                        name="description" 
                        class="w-full p-2 mt-1 rounded-lg focus:ring focus:ring-blue-300" 
                        rows="3"
                        required>
                    </textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection