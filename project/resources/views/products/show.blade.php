@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="md:flex">
                <!-- Product Image -->
                <div class="md:w-1/2">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover">
                </div>

                <!-- Product Details -->
                <div class="p-8 md:w-1/2">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                    <p class="text-[#463020] text-2xl font-bold mt-4">${{ number_format($product->price, 2) }}</p>
                    <div class="mt-4 space-y-6">
                        <p class="text-gray-600">{{ $product->description }}</p>
                        <div class="flex items-center">
                            <span class="text-gray-700 font-medium">Category:</span>
                            <span class="ml-2 text-gray-600">{{ ucfirst($product->category) }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-700 font-medium">Availability:</span>
                            <span class="ml-2 {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <button class="mt-8 w-full bg-[#463020] text-white px-6 py-3 rounded-lg hover:bg-[#5c4132] transition-colors duration-200">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Related Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset($related->image) }}" alt="{{ $related->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $related->name }}</h3>
                        <p class="text-[#463020] font-bold mt-2">${{ number_format($related->price, 2) }}</p>
                        <a href="{{ route('products.show', $related) }}" class="mt-4 inline-block bg-[#463020] text-white px-4 py-2 rounded-lg hover:bg-[#5c4132]">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
