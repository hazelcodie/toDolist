<!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
@extends('layouts.app')

@section('content')
    <div>
        <h2 class="text-lg font-bold text-gray-900">Edit Note</h2>
        <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ $note->title }}"
                        class="w-full p-2 mt-1 rounded-lg focus:ring focus:ring-blue-300" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" class="w-full p-2 mt-1 rounded-lg focus:ring focus:ring-blue-300" rows="3" required>{{ $note->description }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
