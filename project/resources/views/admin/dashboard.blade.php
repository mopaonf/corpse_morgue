@extends('admin.layouts.app')

@section('title', 'Mortuary Management Dashboard')

@section('content')
<div class="py-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Welcome Banner -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm mb-6 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome back, {{ Auth::guard('admin')->user()->name }}</h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Here's what's happening today</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    New Entry
                </button>
            </div>
        </div>
    </div>
    
    <div class="h-px bg-gray-200 dark:bg-gray-700 my-6"></div>
    
    <!-- Stats Grid -->
    <div class="mb-8">
        <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Statistics Overview</h2>
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Obituaries Stats -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg transition duration-300 hover:shadow-md">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total Obituaries</dt>
                                <dd class="text-2xl font-semibold text-gray-900 dark:text-white">{{ number_format($obituariesCount) }}</dd>
                                <dd class="text-sm text-green-600 dark:text-green-400 mt-1">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                        </svg>
                                        +{{ $obituariesGrowth }}% from last month
                                    </span>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Funerals Stats -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg transition duration-300 hover:shadow-md">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Active Funerals</dt>
                                <dd class="text-2xl font-semibold text-gray-900 dark:text-white">{{ number_format($funeralsCount) }}</dd>
                                <dd class="text-sm text-purple-600 dark:text-purple-400 mt-1">{{ $upcomingFunerals }} scheduled this week</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointments Stats -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg transition duration-300 hover:shadow-md">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Pending Appointments</dt>
                                <dd class="text-2xl font-semibold text-gray-900 dark:text-white">{{ number_format($appointmentsCount) }}</dd>
                                <dd class="text-sm text-green-600 dark:text-green-400 mt-1">{{ $todayAppointments }} today</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue Stats -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg transition duration-300 hover:shadow-md">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Monthly Revenue</dt>
                                <dd class="text-2xl font-semibold text-gray-900 dark:text-white">FCFA {{ number_format($monthlyRevenue) }}</dd>
                                <dd class="text-sm text-yellow-600 dark:text-yellow-400 mt-1">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                        </svg>
                                        +{{ $revenueGrowth }}% from last month
                                    </span>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-px bg-gray-200 dark:bg-gray-700 my-6"></div>

    <!-- Recent Activities & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Activities -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Recent Activities</h3>
                    <div class="space-y-4">
                        @forelse($recentActivities as $activity)
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                @switch($activity->activity_type ?? 'default')
                                    @case('obituary_created')
                                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 dark:bg-blue-900">
                                            <svg class="h-4 w-4 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </span>
                                        @break
                                    @case('funeral_scheduled')
                                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-purple-100 dark:bg-purple-900">
                                            <svg class="h-4 w-4 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </span>
                                        @break
                                    @default
                                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-100 dark:bg-gray-900">
                                            <svg class="h-4 w-4 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </span>
                                @endswitch
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $activity->description ?? 'Activity details not available' }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $activity->created_at ? $activity->created_at->diffForHumans() : 'Time not available' }} 
                                    @if(isset($activity->user_name))
                                        by {{ $activity->user_name }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500 dark:text-gray-400 text-sm">No recent activities</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Quick Actions</h3>
                    <div class="space-y-4">
                        <a href="{{ route('admin.obituaries.create') }}" class="block w-full text-left px-4 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                            Add New Obituary
                        </a>
                        <a href="{{ route('admin.funerals.create') }}" class="block w-full text-left px-4 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                            Schedule Funeral Service
                        </a>
                        <a href="{{ route('admin.appointments.create') }}" class="block w-full text-left px-4 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                            Create Appointment
                        </a>
                        <a href="{{ route('admin.reports.generate') }}" class="block w-full text-left px-4 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                            Generate Report
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
