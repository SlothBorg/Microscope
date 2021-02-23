@extends('layouts.centered')

@section('content')
    <div class="w-1/4 bg-white shadow-md rounded">
        <form method="POST" action="{{ route('register') }}" class="px-8 pt-6 pb-8">
            @csrf

            <div class="mb-4">
                <label class="label" for="username">Username</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="username"  placeholder="Username" required>
                <small class="text-xs text-gray-600 mt-1">Your name will show up to other players when playing a game. You can use a nickname if you want.</small>

                @if ($errors->has('username'))
                    <small class="mt-1 text-xs text-red-400">{{ $errors->first('username') }}</small>
                @endif
            </div>

            <div class="mb-4">
                <label class="label" for="email">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" name="email" placeholder="Email" required>

                @if ($errors->has('email'))
                    <small class="mt-1 text-xs text-red-400">{{ $errors->first('email') }}</small>
                @endif
            </div>

            <div class="mb-4">
                <label class="label" for="password">Password</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password" name="password" required>
                <small class="text-xs text-gray-600 mt-1">Passwords must be atleast 8 characters long</small>

                @if ($errors->has('password'))
                    <small class="mt-1 text-xs text-red-400">{{ $errors->first('password') }}</small>
                @endif
            </div>

            <div class="mb-4">
                <label class="label" for="password_confirmation">Confirm Password</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="w-full button-dark">Register</button>
            <a href="{{ route('login') }}" class="mt-2 text-sm text-indigo-700 text-center block">Already have an account?</a>
        </form>
    </div>
@endsection
