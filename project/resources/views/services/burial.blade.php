@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <!-- Hero Section -->
    <div class="relative bg-[#463020] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-serif mb-4">Burial Services</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Traditional and dignified burial services tailored to honor your loved ones.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Main Content -->
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content Area -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Traditional Burial Section -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-80 overflow-hidden">
                        <img src="{{ asset('images/traditional-burial.jpg') }}" alt="Traditional Burial" class="w-full h-full object-cover">
                    </div>
                    <div class="p-8">
                        <h2 class="text-2xl font-serif text-[#463020] mb-4">Traditional Burial Services</h2>
                        <p class="text-gray-600 mb-6">
                            Our traditional burial services provide a dignified way to honor your loved one's memory. We offer comprehensive arrangements including:
                        </p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Casket Selection
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Cemetery Arrangements
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Graveside Services
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Mausoleum Section -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-80 overflow-hidden">
                        <img src="{{ asset('images/mausoleum.jpg') }}" alt="Mausoleum" class="w-full h-full object-cover">
                    </div>
                    <div class="p-8">
                        <h2 class="text-2xl font-serif text-[#463020] mb-4">Mausoleum Entombment</h2>
                        <p class="text-gray-600 mb-6">
                            A mausoleum offers a clean, dry, and ventilated above-ground option that provides a dignified resting place.
                        </p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Private Family Mausoleums
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Community Mausoleums
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Memorial Plaques
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Quick Contact -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-serif text-[#463020] mb-4">Need Immediate Assistance?</h3>
                    <p class="text-gray-600 mb-6">Our team is available 24/7 to help you with your burial service needs.</p>
                    <div class="space-y-4">
                        <a href="tel:1234567890" class="flex items-center text-[#463020] hover:text-[#5c4132]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            (123) 456-7890
                        </a>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('contact') }}" class="block w-full bg-[#463020] text-white text-center px-6 py-3 rounded-lg hover:bg-[#5c4132] transition-colors duration-200">
                            Contact Us
                        </a>
                    </div>
                </div>

                <!-- Download Guide -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-serif text-[#463020] mb-4">Free Burial Planning Guide</h3>
                    <p class="text-gray-600 mb-6">Download our comprehensive guide to help you understand and plan burial services.</p>
                    <a href="#" class="block w-full bg-gray-100 text-[#463020] text-center px-6 py-3 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                        Download Guide (PDF)
                    </a>
                </div>

                <!-- Pre-Planning CTA -->
                <div class="bg-[#463020] rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-xl font-serif mb-4">Plan Ahead</h3>
                    <p class="text-gray-200 mb-6">Take the time to plan your burial arrangements in advance and ensure your wishes are fulfilled.</p>
                    <a href="#" class="block w-full bg-white text-[#463020] text-center px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        Start Pre-Planning
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
