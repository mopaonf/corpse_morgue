@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Form Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Immediate Need Assistance</h2>
            <p class="mt-2 text-gray-600">We're here to help you during this difficult time</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Progress Steps - Same as before -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <!-- Progress steps content remains the same -->
            </div>

            <div class="p-8">
                @if(session('success'))
                    <!-- Success message styling remains the same -->
                @endif

                <form action="{{ route('immediate-need.store') }}" method="POST" class="space-y-12">
                    @csrf
                    
                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-xl font-semibold text-gray-900">Contact Information</h3>
                            <p class="mt-1 text-sm text-gray-500">Please provide your contact details so we can assist you better.</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">I am planning for my</label>
                                <select name="planning_for" class="form-select block w-full h-12 px-4 rounded-lg border-2 border-gray-200 bg-white shadow-sm hover:border-gray-300 focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-20 transition-all duration-200">
                                    <option value="">Select relationship</option>
                                    <option value="spouse">Spouse</option>
                                    <option value="parent">Parent</option>
                                    <option value="child">Child</option>
                                    <option value="sibling">Sibling</option>
                                    <option value="friend">Friend</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Your Name</label>
                                <input type="text" name="your_name" placeholder="Enter your full name" class="form-input block w-full h-12 px-4 rounded-lg border-2 border-gray-200 bg-white shadow-sm hover:border-gray-300 focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-20 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Your Email</label>
                                <input type="email" name="your_email" placeholder="your.email@example.com" class="form-input block w-full h-12 px-4 rounded-lg border-2 border-gray-200 bg-white shadow-sm hover:border-gray-300 focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-20 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Your Phone</label>
                                <input type="tel" name="your_phone" placeholder="(123) 456-7890" class="form-input block w-full h-12 px-4 rounded-lg border-2 border-gray-200 bg-white shadow-sm hover:border-gray-300 focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-20 transition-all duration-200">
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="space-y-8">
                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-xl font-semibold text-gray-900">Personal Information</h3>
                            <p class="mt-1 text-sm text-gray-500">Information about your loved one.</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="first_name" class="form-input block w-full h-12 px-4 rounded-lg border-2 border-gray-200 bg-white shadow-sm hover:border-gray-300 focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-20 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="last_name" class="form-input block w-full h-12 px-4 rounded-lg border-2 border-gray-200 bg-white shadow-sm hover:border-gray-300 focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-20 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Date of Death</label>
                                <input type="date" name="date_of_death" class="form-input block w-full h-12 px-4 rounded-lg border-2 border-gray-200 bg-white shadow-sm hover:border-gray-300 focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-20 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Gender</label>
                                <select name="gender" class="form-select block w-full h-12 px-4 rounded-lg border-2 border-gray-200 bg-white shadow-sm hover:border-gray-300 focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-20 transition-all duration-200">
                                    <option value="">Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Service Preferences -->
                    <div class="space-y-8">
                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-xl font-semibold text-gray-900">Service Preferences</h3>
                            <p class="mt-1 text-sm text-gray-500">Select your preferred service options.</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Final Disposition</label>
                                <select name="final_disposition" class="form-select block w-full h-12 px-4 rounded-lg border-2 border-gray-200 bg-white shadow-sm hover:border-gray-300 focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-20 transition-all duration-200">
                                    <option value="">Select option</option>
                                    <option value="burial">Burial</option>
                                    <option value="cremation">Cremation</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Visitation</label>
                                <select name="visitation" class="form-select block w-full h-12 px-4 rounded-lg border-2 border-gray-200 bg-white shadow-sm hover:border-gray-300 focus:border-[#463020] focus:ring focus:ring-[#463020] focus:ring-opacity-20 transition-all duration-200">
                                    <option value="">Select option</option>
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-8 py-3 border border-transparent rounded-lg shadow-sm text-white bg-[#463020] hover:bg-[#5c4132] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#463020] transition-all duration-200">
                                Submit Request
                                <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection