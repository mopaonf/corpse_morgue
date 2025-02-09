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

                            <a href="#" class="nav-item whitespace-nowrap">Immediate Need</a>
                            <a href="#" class="nav-item whitespace-nowrap">Online Showroom</a>

                            <!-- Plan a Funeral Dropdown -->
                            <div class="relative group">
                                <button class="nav-item whitespace-nowrap h-20 flex items-center">
                                    Plan a Funeral
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div class="absolute left-0 w-48 top-20 bg-white border border-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Funeral Services</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Burial Services</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Memorial Services</a>
                                </div>
                            </div>

                            <!-- Other dropdowns... -->
                        </div>
                    </div>

                    <!-- Auth Buttons - Right -->
                    <div class="flex-shrink-0 flex items-center ml-12">
                        @if (Route::has('login'))
                            <div class="flex items-center space-x-4">
                                @auth
                                    <form action="{{ route('logout') }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="nav-item">Logout</button>
                                    </form>
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
