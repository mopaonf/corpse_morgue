@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <!-- Hero Section -->
    <div class="relative bg-[#463020] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-serif mb-4">Funeral Services</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Choose the perfect farewell for your loved one with our comprehensive funeral services.
                </p>
            </div>
        </div>
    </div>

    <!-- Service Types -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Burial Services -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:scale-105">
                <div class="h-64 overflow-hidden">
                    <img src="{{ asset('images/burial-service.jpg') }}" alt="Burial Service" class="w-full h-full object-cover">
                </div>
                <div class="p-8">
                    <h2 class="text-2xl font-serif text-[#463020] mb-4">Burial Services</h2>
                    <p class="text-gray-600 mb-6">Traditional burial services with dignified ceremonies and eternal resting places.</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Traditional In-Ground Burial
                        </li>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Mausoleum Entombment
                        </li>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Family Estate Options
                        </li>
                    </ul>
                    <a href="{{ route('services.burial') }}" class="inline-block bg-[#463020] text-white px-6 py-3 rounded-lg hover:bg-[#5c4132] transition-colors duration-200">
                        Learn More About Burial Services
                    </a>
                </div>
            </div>

            <!-- Cremation Services -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:scale-105">
                <div class="h-64 overflow-hidden">
                    <img src="{{ asset('images/cremation-service.jpg') }}" alt="Cremation Service" class="w-full h-full object-cover">
                </div>
                <div class="p-8">
                    <h2 class="text-2xl font-serif text-[#463020] mb-4">Cremation Services</h2>
                    <p class="text-gray-600 mb-6">Modern cremation options with flexible memorial possibilities.</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Traditional Cremation
                        </li>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Memorial Services
                        </li>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-[#463020] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Scattering Services
                        </li>
                    </ul>
                    <a href="{{ route('services.cremation') }}" class="inline-block bg-[#463020] text-white px-6 py-3 rounded-lg hover:bg-[#5c4132] transition-colors duration-200">
                        Learn More About Cremation Services
                    </a>
                </div>
            </div>
        </div>

        <!-- Additional Services Section -->
        <div class="mt-16">
            <h2 class="text-3xl font-serif text-center text-gray-900 mb-12">Additional Services</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Pre-Planning -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-[#463020] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pre-Planning Services</h3>
                    <p class="text-gray-600">Plan ahead to ensure your wishes are fulfilled and reduce the burden on your loved ones.</p>
                </div>

                <!-- Memorial Services -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-[#463020] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Memorial Services</h3>
                    <p class="text-gray-600">Personalized celebrations of life that honor your loved one's unique journey.</p>
                </div>

                <!-- Grief Support -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-[#463020] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Grief Support</h3>
                    <p class="text-gray-600">Comprehensive support services to help families through their journey of grief.</p>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="mt-16 text-center">
            <h2 class="text-3xl font-serif text-gray-900 mb-4">Need Assistance?</h2>
            <p class="text-gray-600 mb-8">Our compassionate team is here to help you 24/7</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('contact') }}" class="bg-[#463020] text-white px-8 py-3 rounded-lg hover:bg-[#5c4132] transition-colors duration-200">
                    Contact Us
                </a>
                <a href="tel:1234567890" class="border-2 border-[#463020] text-[#463020] px-8 py-3 rounded-lg hover:bg-[#463020] hover:text-white transition-colors duration-200">
                    Call Now
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
