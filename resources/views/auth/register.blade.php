@extends('layouts.tailwind-layout')

@section('content')
<body class="bg-white-200  font-sans text-gray-700">
    <div class=" h-screen container mx-auto p-8 flex">
        <div class="max-w-md w-full mx-auto">
            <div class="bg-white rounded-lg overflow-hidden shadow-2xl">
            <h1 class="text-4xl md:text-left pt-7 pl-7 pr-7 font-extrabold">Create an Account.</h1>
                <div class="p-8">
                    <form method="POST" class="" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-600 ">{{ __('Name') }}</label>

                            <input type="text" name="name" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
                            @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                    <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-600 ">{{ __('E-Mail Address') }}</label>

                            <input type="text" name="email" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  required>
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
                        
                        <div class="mb-5">
                            <label for="password-confirm" class="block mb-2 text-sm font-medium text-gray-600">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" name="password_confirmation" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none" required>
                        </div>

                        <button class="w-full p-3 mt-4 bg-indigo-600 text-white rounded shadow" type="submit"> {{ __('Register') }}</button>
                    </form>
                </div>

                
           
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br>
</body>
@endsection
