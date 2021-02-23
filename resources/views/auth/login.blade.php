@extends('layouts.centered')

@section('content')
    <div class="w-1/4 bg-white shadow-md rounded">
        <form method="POST" action="{{ route('login') }}" class="px-8 pt-6 pb-8>
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">

                @if ($errors->has('email'))
                    <small class="mt-1 text-xs text-red-400">{{ $errors->first('email') }}</small>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                @if ($errors->has('password'))
                    <small class="mt-1 text-xs text-red-400">{{ $errors->first('password') }}</small>
                @endif

                <a href="{{ route('password.request') }}" class="mt-1 text-sm text-indigo-700 block">Forgot password?</a>
            </div>

            <div class="mb-4">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" class="text-sm text-gray-800">Stay logged in</label>
            </div>

            <button type="submit" class="w-full button-dark">Login</button>
            <a href="{{ route('register') }}" class="mt-2 text-sm text-indigo-700 text-center block">Create a new account</a>
        </form>
    </div>
@endsection
