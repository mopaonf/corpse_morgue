@extends('layouts.app')

{{-- @section('show_navbar') --}}
{{-- @endsection --}}

@section('content')
<div class="w-full mt-36 max-w-md mx-auto">
    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg px-6 py-6 backdrop-blur-sm dark:bg-gray-800/50">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome Back</h1>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Please sign in to your account</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email Address</label>
                    <input type="email" name="email" class="w-full px-4 py-2 text-sm border rounded-lg" required autofocus />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 text-sm border rounded-lg" required />
                </div>

                @if (session('error'))
                    <div class="bg-red-50 dark:bg-red-900/50 text-red-500 dark:text-red-400 text-sm p-3 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <button type="submit" class="w-full bg-[#463020] hover:bg-[#75533a] text-white text-sm font-medium py-2 px-4 rounded-lg transition duration-200">
                    Sign In
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-[#463020] hover:text-[#75533a] font-medium">Create Account</a>
            </p>
        </div>
    </div>
</div>
@endsection
