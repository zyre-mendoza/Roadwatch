@extends('layouts.tailwind-layout')

@section('content')
<body class="bg-white-200  font-sans text-gray-700">
    <div class=" h-screen container mx-auto p-8 flex">
        <div class="max-w-md w-full mx-auto">
            <div class="bg-white rounded-lg overflow-hidden shadow-2xl">
            <h1 class="text-4xl md:text-left pt-7 pl-7 pr-7 font-extrabold">Welcome! Please login to your account.</h1>
                <div class="p-8">
                    <form method="POST" class="" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-600 ">{{ __('E-Mail Address') }}</label>

                            <input type="text" name="email" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                
                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-600">{{ __('Password') }}</label>

                            <input type="password" name="password" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <button class="w-full p-3 mt-4 bg-indigo-600 text-white rounded shadow" type="submit"> {{ __('Login') }}</button>
                    </form>
                </div>
                
                <div class="flex justify-between p-8 text-sm border-t border-gray-300 bg-gray-100">
                    <a href="{{ route('register') }}" class="font-medium text-indigo-500">Create account</a>

                    <a href="#" class="text-gray-600">Forgot password?</a>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
