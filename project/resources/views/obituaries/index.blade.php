@extends('layouts.app')

@section('title', 'Obituaries')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-900">Obituaries</h1>
        @auth
        <button onclick="window.location.href='{{ route('obituaries.create') }}'" class="bg-[#463020] hover:bg-[#75533a] text-white px-4 py-2 rounded-lg">
            New Obituary
        </button>
        @endauth
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($obituaries as $obituary)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($obituary->image_path)
                    <img src="{{ Storage::url($obituary->image_path) }}" alt="Obituary image" class="w-full h-48 object-cover">
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $obituary->name }}</h2>
                    <p class="text-gray-600 text-sm">
                        {{ $obituary->date_of_birth->format('M d, Y') }} - {{ $obituary->date_of_death->format('M d, Y') }}
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('obituaries.show', $obituary) }}" class="text-[#463020] hover:text-[#75533a]">
                            View Details →
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12 text-gray-500">
                No obituaries found.
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $obituaries->links() }}
    </div>
</div>
@endsection
