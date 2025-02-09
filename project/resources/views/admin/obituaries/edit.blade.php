@extends('admin.layouts.app')

@section('title', 'Edit Obituary')
@section('header', 'Edit Obituary')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
    <form action="{{ route('admin.obituaries.update', $obituary) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="name" value="{{ old('name', $obituary->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date of Birth</label>
                <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $obituary->date_of_birth) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date of Death</label>
                <input type="date" name="date_of_death" value="{{ old('date_of_death', $obituary->date_of_death) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Biography</label>
                <textarea name="biography" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('biography', $obituary->biography) }}</textarea>
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.obituaries.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md text-sm font-medium">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
