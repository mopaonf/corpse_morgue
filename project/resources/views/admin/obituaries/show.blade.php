@extends('admin.layouts.app')

@section('title', 'Review Obituary')
@section('header', 'Review Obituary')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Status Banner -->
        <div class="bg-gray-50 border-b px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <span class="px-3 py-1 rounded-full text-sm 
                        @if($obituary->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($obituary->status === 'approved') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($obituary->status) }}
                    </span>
                    @if($obituary->approved_at)
                        <span class="ml-3 text-sm text-gray-500">
                            Approved on {{ $obituary->approved_at->format('M d, Y H:i') }}
                        </span>
                    @endif
                </div>
                <div class="flex space-x-3">
                    <form action="{{ route('admin.obituaries.update-status', $obituary) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="approved">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                            Approve
                        </button>
                    </form>
                    <form action="{{ route('admin.obituaries.update-status', $obituary) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                            Reject
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Image -->
        <div class="w-full h-96 bg-gray-100">
            @if($obituary->image_path)
                <img src="{{ asset('storage/' . $obituary->image_path) }}" 
                     alt="{{ $obituary->name }}" 
                     class="w-full h-full object-contain">
            @else
                <div class="flex items-center justify-center h-full">
                    <span class="text-gray-400">No image provided</span>
                </div>
            @endif
        </div>

        <!-- Details -->
        <div class="p-6">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">{{ $obituary->name }}</h1>
                <p class="text-gray-600">
                    {{ $obituary->date_of_birth->format('F j, Y') }} - 
                    {{ $obituary->date_of_death->format('F j, Y') }}
                </p>
            </div>

            <div class="prose max-w-none mb-6">
                {!! nl2br(e($obituary->biography)) !!}
            </div>

            <!-- Submission Details -->
            <div class="mt-8 pt-6 border-t">
                <h3 class="text-lg font-semibold mb-4">Submission Details</h3>
                <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Submitted by</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $obituary->user->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Submitted on</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $obituary->created_at->format('M d, Y H:i') }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Admin Notes -->
            <div class="mt-8">
                <form action="{{ route('admin.obituaries.update-notes', $obituary) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="admin_notes" class="block text-sm font-medium text-gray-700">Admin Notes</label>
                        <textarea id="admin_notes" name="admin_notes" rows="4" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $obituary->admin_notes }}</textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Save Notes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
