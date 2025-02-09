<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Corpse Management')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow-lg fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-20">
                    <!-- Logo Section - Left -->
                    <div class="flex-shrink-0 flex items-center mr-12">
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                            <a href="/" class="text-[#463020] text-4xl font-serif">Corpse</a>
                        </h1>
                    </div>
                    
                    <!-- Center Navigation with equal spacing -->
                    <div class="flex-1 flex items-center justify-center">
                        <div class="flex space-x-6">
                            <a href="{{ route('obituaries.index') }}" class="nav-item whitespace-nowrap">Obituaries</a>
                            
                            <!-- Who We Are Dropdown -->
                            <div class="relative group">
                                <button class="nav-item whitespace-nowrap h-20 flex items-center">
                                    Who We Are
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div class="absolute left-0 w-48 top-20 bg-white border border-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Our History</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Our Team</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Testimonials</a>
                                </div>
                            </div>

                            <a href="/immediate-need" class="nav-item whitespace-nowrap">Immediate Need</a>
                            <a href="/products" class="nav-item whitespace-nowrap">Online Showroom</a>
                            <a href="/services/funeral" class="nav-item whitespace-nowrap">Funeral Services</a>

                            
                            <!-- Other dropdowns... -->
                        </div>
                    </div>

                    <!-- Auth Buttons - Right -->
                    <div class="flex-shrink-0 flex items-center ml-12">
                        @if (Route::has('login'))
                            <div class="flex items-center space-x-4">
                                @auth
                                    <div class="relative" x-data="{ open: false }">
                                        <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                                            <div class="w-10 h-10 rounded-full bg-[#463020] flex items-center justify-center">
                                                @if(Auth::user()->profile_photo)
                                                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
                                                         alt="{{ Auth::user()->name }}" 
                                                         class="w-full h-full rounded-full object-cover">
                                                @else
                                                    <span class="text-white text-lg font-semibold">
                                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                                    </span>
                                                @endif
                                            </div>
                                            <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>

                                        <!-- Dropdown Menu -->
                                        <div x-show="open" 
                                             @click.away="open = false"
                                             x-transition:enter="transition ease-out duration-100"
                                             x-transition:enter-start="transform opacity-0 scale-95"
                                             x-transition:enter-end="transform opacity-100 scale-100"
                                             x-transition:leave="transition ease-in duration-75"
                                             x-transition:leave-start="transform opacity-100 scale-100"
                                             x-transition:leave-end="transform opacity-0 scale-95"
                                             class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-lg shadow-xl">
                                            
                                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                My Profile
                                            </a>

                                            <a href="{{ route('obituaries.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                                </svg>
                                                My Obituaries
                                            </a>

                                            <div class="border-t border-gray-100 my-1"></div>

                                            <form action="{{ route('logout') }}" method="POST" class="block">
                                                @csrf
                                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                                    </svg>
                                                    Sign Out
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}" class="nav-item">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn-primary">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="pt-20"> <!-- Add padding top to account for fixed navbar -->
            @yield('content')
        </div>
    </div>
</body>
</html>
