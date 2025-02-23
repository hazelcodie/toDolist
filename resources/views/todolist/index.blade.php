    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
 @extends('layouts.app')  

 @section('content')
   
    <div class="relative bg-pink-200 p-6 rounded-2xl shadow-lg w-80 text-center">
        <!-- Character Icon -->
        <img src="{{ asset('images/welcomeimage.png') }}" alt="Character"
            class="absolute -top-10 left-1 w-20 h-20">

        <!-- Buttons -->
        <div class="space-y-4 mt-4">
            <button class="w-full bg-purple-500 text-white py-2 rounded-lg shadow-md font-medium transition-all hover:bg-purple-600 font-mono">
            {{-- <a href="{{ route('todolist.todo') }}"></a> --}}
            To-do</button>
            <button class="w-full bg-purple-500 text-white py-2 rounded-lg shadow-md font-medium transition-all hover:bg-purple-600 font-mono">
            {{-- <a href="{{ route('todolist.goals') }}"></a> --}}
            My goals</button>
            <button class="w-full bg-purple-500 text-white py-2 rounded-lg shadow-md font-medium transition-all hover:bg-purple-600 font-mono">
            {{-- <a href="{{ route('todolist.notes') }}"></a> --}}
            Notes</button>
        </div>
    </div>
@endsection