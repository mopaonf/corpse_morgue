@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-12">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 border-b pb-4">Create New Obituary</h1>

        <form action="{{ route('obituaries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="mt-2 block w-full rounded-lg border border-gray-400 shadow-md focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-50 p-3">
                    @error('name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Photo</label>
                    <input type="file" name="image" class="mt-2 block w-full border border-gray-400 rounded-lg p-2 text-gray-700 shadow-md">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Date of Birth</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="mt-2 block w-full rounded-lg border border-gray-400 shadow-md focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-50 p-3">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Date of Death</label>
                    <input type="date" name="date_of_death" value="{{ old('date_of_death') }}" class="mt-2 block w-full rounded-lg border border-gray-400 shadow-md focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-50 p-3">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Biography</label>
                <textarea name="biography" rows="5" class="mt-2 block w-full rounded-lg border border-gray-400 shadow-md focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-50 p-3">{{ old('biography') }}</textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="button" onclick="window.history.back()" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100 transition ease-in-out">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2.5 bg-[#463020] hover:bg-[#75533a] text-white rounded-lg text-sm font-medium shadow-md transition ease-in-out">
                    Create Obituary
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
