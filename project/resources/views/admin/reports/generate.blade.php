
@extends('admin.layouts.app')

@section('title', 'Generate Reports')
@section('header', 'Reports Generation')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow rounded-lg">
    <div class="p-6">
        <form action="{{ route('admin.reports.download') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Report Type</label>
                    <select name="report_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="obituaries">Obituaries Report</option>
                        <option value="funerals">Funerals Report</option>
                        <option value="appointments">Appointments Report</option>
                        <option value="financial">Financial Report</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date Range</label>
                    <select name="date_range" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="today">Today</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                        <option value="year">This Year</option>
                        <option value="custom">Custom Range</option>
                    </select>
                </div>

                <div class="sm:col-span-2 custom-date-range hidden">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                            <input type="date" name="start_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                            <input type="date" name="end_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Format</label>
                    <div class="mt-2 space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="format" value="pdf" class="form-radio" checked>
                            <span class="ml-2">PDF</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="format" value="excel" class="form-radio">
                            <span class="ml-2">Excel</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="format" value="csv" class="form-radio">
                            <span class="ml-2">CSV</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700">
                    Generate Report
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.querySelector('select[name="date_range"]').addEventListener('change', function() {
    const customDateRange = document.querySelector('.custom-date-range');
    if (this.value === 'custom') {
        customDateRange.classList.remove('hidden');
    } else {
        customDateRange.classList.add('hidden');
    }
});
</script>
@endpush
@endsection