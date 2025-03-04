@extends('layouts.app')

@section('content')
        <div class="bg-pink-200 rounded-2xl shadow-lg text-center w-full sm:max-w-md mt-6 px-6 py-6">
            <p class="font-mono text-xl font-medium">
             Hello pretty, <br>
             ready to be productive?
            </p>
            <img src="{{ asset('images/welcomeimage.png') }}" alt="characterone" class="w-24 mx-auto mt-5 mb-1 animate-bounce">
            <a href="{{ route('home') }}" class="bg-purple-500 text-white px-10 py-2 rounded-lg shadow-md font-medium transition-all hover:bg-purple-600 font-mono">
                Definitely!
            </a>
        </div>
@endsection
