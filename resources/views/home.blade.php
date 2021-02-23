@extends('layouts.centered')

@section('content')
    <div class="w-1/3 bg-white shadow-md rounded">
        <div>
            <h1 class="text-3xl md:text-5xl font-bold tracking-wider text-gray-900 pb-6 text-center">
                Play <a href="http://www.lamemage.com/microscope/" rel="noreferrer noopener" alt="Microscope" class="underline">Microscope</a> online!
            </h1>
        </div>
        <div class="flex justify-center">
            <div class="w-2/3">
                <a href="{{ route('login') }}" class="float-left button-dark">Login</a>
                <a href="{{ route('register') }}" class="float-right button-light">Register</a>
            </div>
        </div>
    </div>
@endsection