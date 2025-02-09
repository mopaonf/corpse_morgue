@extends('layouts.app')

@section('content')
<div class="w-full mt-36 max-w-md mx-auto">
    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg px-6 py-6">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Admin Login</h1>
        </div>

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-4">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg" required autofocus>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                @if ($errors->any())
                    <div class="bg-red-50 text-red-500 p-3 rounded-lg">
                        {{ $errors->first() }}
                    </div>
                @endif

                <button type="submit" class="w-full bg-[#463020] hover:bg-[#75533a] text-white py-2 px-4 rounded-lg">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
