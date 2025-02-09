@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if(auth()->id() === $obituary->user_id)
        <div class="bg-gray-100 border-l-4 border-gray-800 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    @if($obituary->status === 'pending')
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd"/>
                        </svg>
                    @elseif($obituary->status === 'approved')
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    @else
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    @endif
                </div>
                <div class="ml-3">
                    <p class="text-sm text-gray-700">
                        Status: <span class="font-medium">{{ ucfirst($obituary->status) }}</span>
                        @if($obituary->status === 'pending')
                            (Awaiting approval)
                        @endif
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="w-full h-96 relative bg-gray-100">
            @if($obituary->image_path)
                <img 
                    src="{{ asset('storage/' . $obituary->image_path) }}" 
                    alt="{{ $obituary->name }}" 
                    class="w-full h-full object-contain"
                >
            @else
                <div class="flex items-center justify-center h-full">
                    <span class="text-gray-400">No image available</span>
                </div>
            @endif
        </div>
        
        <div class="p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $obituary->name }}</h1>
            
            <div class="flex items-center text-gray-500 text-sm mb-6">
                <span>{{ $obituary->date_of_birth->format('F j, Y') }} - {{ $obituary->date_of_death->format('F j, Y') }}</span>
            </div>

            <div class="prose max-w-none">
                {!! nl2br(e($obituary->biography)) !!}
            </div>

            @if(auth()->id() === $obituary->user_id)
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('obituaries.edit', $obituary) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        Edit
                    </a>
                    <form action="{{ route('obituaries.destroy', $obituary) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this obituary?')" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
