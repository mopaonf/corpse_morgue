@extends('admin.layouts.app')

@section('title', 'User Details')
@section('header', 'User Details')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">User Information</h2>
            <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                Back to Users
            </a>
        </div>

        <div class="space-y-6">
            <div class="flex items-center">
                <div class="h-20 w-20 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                    <span class="text-2xl font-medium text-blue-800 dark:text-blue-200">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </span>
                </div>
                <div class="ml-6">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h3>
                    <p class="text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Account Status</h4>
                    <div class="flex items-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->email_verified_at ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                            {{ $user->email_verified_at ? 'Verified' : 'Pending Verification' }}
                        </span>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Member Since</h4>
                    <p class="text-gray-900 dark:text-white">{{ $user->created_at->format('F d, Y') }}</p>
                </div>
            </div>

            @if(!$user->email_verified_at)
            <div class="mt-6">
                <button onclick="verifyUser({{ $user->id }})" 
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                    Verify User
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    function verifyUser(userId) {
        if(confirm('Are you sure you want to verify this user?')) {
            fetch(`/admin/users/${userId}/verify`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(() => window.location.reload());
        }
    }
</script>
@endpush
@endsection
