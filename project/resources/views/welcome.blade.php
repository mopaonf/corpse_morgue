<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow-lg fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-20">
                    <!-- Logo Section - Left -->
                    <div class="flex-shrink-0 flex items-center mr-12">
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                            <span class="text-[#463020] text-4xl font-serif">Corpse</span>
                        </h1>
                    </div>
                    
                    <!-- Center Navigation with equal spacing -->
                    <div class="flex-1 flex items-center justify-center">
                        <div class="flex space-x-6"> <!-- Reduced space between items -->
                            <a href="/obituaries" class="nav-item whitespace-nowrap">Obituaries</a>
                            
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

                            <!-- Plan Ahead Dropdown -->
                            <div class="relative group">
                                <button class="nav-item whitespace-nowrap h-20 flex items-center">
                                    Plan Ahead
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div class="absolute left-0 w-48 top-20 bg-white border border-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pre-Planning</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pre-Arrangements</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cost Planning</a>
                                </div>
                            </div>

                            <!-- Resources Dropdown -->
                            <div class="relative group">
                                <button class="nav-item whitespace-nowrap h-20 flex items-center">
                                    Resources
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div class="absolute left-0 w-48 top-20 bg-white border border-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Grief Support</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">FAQs</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Legal Resources</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Auth Buttons - Right -->
                    <div class="flex-shrink-0 flex items-center ml-12">
                        @if (Route::has('login'))
                            <div class="flex items-center space-x-4">
                                @auth
                                    {{-- <a href="{{ url('/dashboard') }}" class="nav-item">Dashboard</a> --}}
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

        <!-- Hero Section with Slider -->
        <div class="relative overflow-hidden min-h-screen pt-20">
            <div class="absolute inset-0">
                <!-- Slider container -->
                <div class="relative h-full" x-data="imageSlider">
                    <!-- Slides -->
                    <div class="relative h-full">
                        <div class="absolute inset-0 transition-opacity duration-1000" :class="{'opacity-0': activeSlide !== 0, 'opacity-100': activeSlide === 0}">
                            <img src="{{ asset('images/welcomePic1.jpg') }}" class="w-full h-full object-cover filter brightness-50" alt="Welcome Image 1">
                        </div>
                        <div class="absolute inset-0 transition-opacity duration-1000" :class="{'opacity-0': activeSlide !== 1, 'opacity-100': activeSlide === 1}">
                            <img src="{{ asset('images/welcomePic4.webp') }}" class="w-full h-full object-cover filter brightness-50" alt="Welcome Image 2">
                        </div>
                        <div class="absolute inset-0 transition-opacity duration-1000" :class="{'opacity-0': activeSlide !== 2, 'opacity-100': activeSlide === 2}">
                            <img src="{{ asset('images/welcomePic1.jpg') }}" class="w-full h-full object-cover filter brightness-50" alt="Welcome Image 3">
                        </div>
                    </div>

                    <!-- Slider controls -->
                    <button @click="previousSlide" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/30 text-white p-2 rounded-full hover:bg-black/50 transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button @click="nextSlide" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/30 text-white p-2 rounded-full hover:bg-black/50 transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <!-- Slider indicators -->
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                        <button @click="activeSlide = 0" :class="{'bg-white': activeSlide === 0, 'bg-white/50': activeSlide !== 0}" class="w-2 h-2 rounded-full transition-colors duration-200"></button>
                        <button @click="activeSlide = 1" :class="{'bg-white': activeSlide === 1, 'bg-white/50': activeSlide !== 1}" class="w-2 h-2 rounded-full transition-colors duration-200"></button>
                        <button @click="activeSlide = 2" :class="{'bg-white': activeSlide === 2, 'bg-white/50': activeSlide !== 2}" class="w-2 h-2 rounded-full transition-colors duration-200"></button>
                    </div>
                </div>
            </div>

            <!-- Hero content -->
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative min-h-[calc(100vh-5rem)] flex items-center">
                    <div class="text-center w-full">
                        <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                            <span class="block">Welcome to</span>
                            <span class="text-[#8B7355] font-serif">Corpse</span>
                        </h1>
                        <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-200 leading-relaxed">
                            Providing compassionate and professional mortuary services. Manage obituaries, funerals, and appointments with ease.
                        </p>
                        <div class="mt-10 flex justify-center gap-6">
                            <a href="{{ route('register') }}" class="px-8 py-4 bg-[#463020] text-white rounded-lg font-medium hover:bg-[#5c4132] transition-colors duration-200 shadow-md hover:shadow-xl">
                                Get Started
                            </a>
                            <a href="#features" class="px-8 py-4 bg-white text-[#463020] rounded-lg font-medium hover:bg-gray-50 transition-colors duration-200 shadow-md hover:shadow-xl">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Obituaries Section -->
        <!-- Recent Obituaries Section -->
<div class="py-24 bg-gray-50">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900">
                Recent Obituaries
            </h2>
            <div class="mt-4 h-1 w-24 bg-[#463020] mx-auto rounded-full"></div>
        </div>

        <div class="relative px-12" x-data="obituarySlider">
            <!-- Left Arrow -->
            <button @click="previousPage" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg hover:bg-gray-50 transition-colors duration-200 z-10 hover:scale-110">
                <svg class="w-6 h-6 text-[#463020]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <!-- Cards Grid -->
            <div class="relative px-12" x-data="obituarySlider">
                <div class="overflow-x-auto">
                    <div class="inline-flex space-x-8 pb-4">
                        <template x-for="(obituary, index) in currentPageObituaries" :key="index">
                            <div class="w-64 flex-shrink-0 bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                <div class="aspect-w-3 aspect-h-4">
                                    <img :src="obituary.image" :alt="obituary.name" class="w-full h-full object-cover">
                                </div>
                                <div class="p-4 text-center">
                                    <h3 class="text-lg font-semibold text-gray-900" x-text="obituary.name"></h3>
                                    <p class="text-sm text-gray-500" x-text="obituary.years"></p>
                                    <a href="#" class="mt-3 inline-block text-[#463020] hover:text-[#5c4132] text-sm font-medium">
                                        View Tribute →
                                    </a>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Right Arrow -->
            <button @click="nextPage" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg hover:bg-gray-50 transition-colors duration-200 z-10 hover:scale-110">
                <svg class="w-6 h-6 text-[#463020]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="#" class="inline-block px-8 py-3 bg-[#463020] text-white rounded-lg font-medium hover:bg-[#5c4132] transition-colors duration-200 shadow-md hover:shadow-xl">
                View All Obituaries
            </a>
        </div>
    </div>
</div>
        </div>

        <!-- Welcome Section -->
        <div class="py-24 bg-white">
            <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900">
                        Welcome to Our Funeral Home
                    </h2>
                    <div class="mt-4 h-1 w-24 bg-[#463020] mx-auto rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <!-- Left Column - Image -->
                    <div class="relative">
                        <img src="{{ asset('images/funeral-home.jpg') }}" alt="Funeral Home" class="w-full h-[500px] object-cover rounded-lg shadow-xl">
                        <div class="absolute -bottom-6 -right-6 bg-[#463020] text-white p-8 rounded-lg shadow-lg">
                            <p class="text-2xl font-bold">50+ Years</p>
                            <p class="text-sm">of Dedicated Service</p>
                        </div>
                    </div>

                    <!-- Right Column - Content -->
                    <div class="space-y-8">
                        <div class="prose prose-lg max-w-none">
                            <h3 class="text-2xl font-semibold text-gray-900 mb-4">Our Commitment to You</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                For over five decades, we have been providing compassionate and professional funeral services to our community. Our dedicated team understands that each life is unique and deserves to be celebrated in a meaningful way.
                            </p>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                We are here to guide you through every step of planning a memorial service that honors your loved one's legacy with dignity and respect.
                            </p>
                        </div>

                        <!-- Service Highlights -->
                        <div class="grid grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <div class="text-[#463020] mb-2">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900">Personalized Care</h4>
                                <p class="text-gray-600 mt-2">Tailored services that honor your loved one's unique life story</p>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <div class="text-[#463020] mb-2">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900">Professional Planning</h4>
                                <p class="text-gray-600 mt-2">Expert guidance through every step of the process</p>
                            </div>
                        </div>

                        <!-- CTA -->
                        <div class="flex gap-4 mt-8">
                            <a href="#" class="inline-block px-6 py-3 bg-[#463020] text-white rounded-lg font-medium hover:bg-[#5c4132] transition-colors duration-200 shadow-md hover:shadow-xl">
                                Learn More About Us
                            </a>
                            <a href="#" class="inline-block px-6 py-3 border-2 border-[#463020] text-[#463020] rounded-lg font-medium hover:bg-[#463020] hover:text-white transition-colors duration-200">
                                Contact Us Today
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section with improved styling -->
        <div id="features" class="py-24 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                        Our Services
                    </h2>
                    <p class="mt-4 text-xl text-gray-500 dark:text-gray-400">
                        Comprehensive and compassionate care
                    </p>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Feature cards with improved styling -->
                        <div class="group hover:scale-105 transition-transform duration-200">
                            <div class="flex flex-col items-center p-8 bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-200">
                                <div class="p-4 bg-[#463020] rounded-full text-white mb-6">
                                    <!-- Icon here -->
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Obituary Management</h3>
                                <p class="mt-2 text-center text-gray-500 dark:text-gray-400">
                                    Create and manage obituaries with ease.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="group hover:scale-105 transition-transform duration-200">
                            <div class="flex flex-col items-center p-8 bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-200">
                                <div class="p-4 bg-[#463020] rounded-full text-white mb-6">
                                    <!-- Icon here -->
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Funeral Planning</h3>
                                <p class="mt-2 text-center text-gray-500 dark:text-gray-400">
                                    Plan and organize funerals professionally.
                                </p>
                            </div>
                        </div>
                        <!-- Feature 3 -->
                        <div class="group hover:scale-105 transition-transform duration-200">
                            <div class="flex flex-col items-center p-8 bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-200">
                                <div class="p-4 bg-[#463020] rounded-full text-white mb-6">
                                    <!-- Icon here -->
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Appointment Scheduling</h3>
                                <p class="mt-2 text-center text-gray-500 dark:text-gray-400">
                                    Schedule and manage appointments efficiently.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer with improved styling -->
        <footer class="bg-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div>
                        <h3 class="text-xl font-bold mb-4">About Us</h3>
                        <p class="text-gray-400">Professional mortuary services with compassion and care.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition-colors duration-200">Services</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-200">Contact</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-200">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Contact Info</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li>Email: info@corpse.com</li>
                            <li>Phone: (123) 456-7890</li>
                            <li>Address: 123 Funeral St, City</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-12 pt-8 border-t border-gray-800 text-center text-gray-400">
                    <p>&copy; {{ date('Y') }} Corpse. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
