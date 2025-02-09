@extends('admin.layouts.app')

@section('title', 'Manage Obituaries')
@section('header', 'Obituaries Management')

@section('content')
<div class="container mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Manage Obituaries</h1>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
        <table class="min-w-full divide-y divide-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Name</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Submitted By</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Status</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Date</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($obituaries as $obituary)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="px-6 py-4 text-gray-900 font-medium">{{ $obituary->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $obituary->user->name }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full 
                            {{ $obituary->status === 'approved' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $obituary->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $obituary->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ ucfirst($obituary->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $obituary->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.obituaries.show', $obituary) }}" class="text-blue-600 hover:text-blue-900 font-medium transition duration-200">
                            Review
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $obituaries->links() }}
    </div>
</div>
@endsection
