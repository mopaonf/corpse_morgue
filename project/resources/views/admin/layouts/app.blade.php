<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Mortuary Management</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="hidden md:flex md:w-64 md:flex-col border-r border-gray-200 dark:border-gray-700">
            <div class="flex flex-col flex-grow pt-5 bg-white dark:bg-gray-800 overflow-hidden">
                <div class="flex items-center flex-shrink-0 px-4">
                    <span class="text-lg font-semibold text-gray-800 dark:text-white">Mortuary Admin</span>
                </div>
                <div class="justify-around py-3 mt-3 flex flex-col">
                    <div class="px-3 mb-2">
                        <div class="h-px bg-gray-200 dark:bg-gray-700"></div>
                    </div>
                    <nav class="flex-1 space-y-0.5 flex flex-col px-1">
                        <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) 
                            bg-gray-100 dark:bg-gray-700 text-blue-600 dark:text-blue-400
                        @else
                            hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-blue-400
                        @endif 
                        group flex items-center px-2 py-1.5 text-sm font-medium rounded-md text-gray-900 dark:text-gray-300 transition-all duration-150 ease-in-out">
                            <svg class="mr-2 h-4 w-4 transition-colors duration-150 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Dashboard
                        </a>
                        <div class="px-2 py-2">
                            <div class="h-px bg-gray-200 dark:bg-gray-700"></div>
                        </div>
                        <a href="{{ route('admin.obituaries.index') }}" class="@if(request()->routeIs('admin.obituaries.*')) 
                            bg-gray-100 dark:bg-gray-700 text-blue-600 dark:text-blue-400
                        @else
                            hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-blue-400
                        @endif 
                        group flex items-center px-2 py-1.5 text-sm font-medium rounded-md text-gray-900 dark:text-gray-300 transition-all duration-150 ease-in-out">
                            <svg class="mr-2 h-4 w-4 transition-colors duration-150 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Obituaries
                        </a>
                        <div class="px-2 py-2">
                            <div class="h-px bg-gray-200 dark:bg-gray-700"></div>
                        </div>
                        <a href="{{ route('admin.funerals.index') }}" class="@if(request()->routeIs('admin.funerals*')) 
                            bg-gray-100 dark:bg-gray-700 text-blue-600 dark:text-blue-400
                        @else
                            hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-blue-400
                        @endif 
                        group flex items-center px-2 py-1.5 text-sm font-medium rounded-md text-gray-900 dark:text-gray-300 transition-all duration-150 ease-in-out">
                            <svg class="mr-2 h-4 w-4 transition-colors duration-150 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Funerals
                        </a>
                        <div class="px-2 py-2">
                            <div class="h-px bg-gray-200 dark:bg-gray-700"></div>
                        </div>
                        <a href="{{ route('admin.appointments.index') }}" class="@if(request()->routeIs('admin.appointments*')) 
                            bg-gray-100 dark:bg-gray-700 text-blue-600 dark:text-blue-400
                        @else
                            hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-blue-400
                        @endif 
                        group flex items-center px-2 py-1.5 text-sm font-medium rounded-md text-gray-900 dark:text-gray-300 transition-all duration-150 ease-in-out">
                            <svg class="mr-2 h-4 w-4 transition-colors duration-150 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Appointments
                        </a>

                        <div class="px-2 py-2">
                            <div class="h-px bg-gray-200 dark:bg-gray-700"></div>
                        </div>

                        <a href="{{ route('admin.users.index') }}" class="@if(request()->routeIs('admin.users*')) 
                            bg-gray-100 dark:bg-gray-700 text-blue-600 dark:text-blue-400
                        @else
                            hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-blue-400
                        @endif 
                        group flex items-center px-2 py-1.5 text-sm font-medium rounded-md text-gray-900 dark:text-gray-300 transition-all duration-150 ease-in-out">
                            <svg class="mr-2 h-4 w-4 transition-colors duration-150 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            Users
                        </a>
                    </nav>                           
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 dark:border-gray-700 p-4">
                    <div class="flex items-center">
                        <div>
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ Auth::guard('admin')->user()->name }}</p>
                            <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-xs text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 relative">
            <div class="absolute inset-0 bg-gray-100 dark:bg-gray-900" style="clip-path: inset(0)">
                <div class="absolute h-full w-px left-0 bg-gradient-to-b from-gray-200 via-gray-200 to-transparent dark:from-gray-700 dark:via-gray-700"></div>
            </div>
            <div class="relative py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">@yield('header')</h1>
                        @yield('actions')
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
