@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Featured Products -->
        @if(isset($featuredProducts) && $featuredProducts->count() > 0)
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6">Featured Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                        <p class="text-[#463020] font-bold mt-2">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product) }}" class="mt-4 inline-block bg-[#463020] text-white px-4 py-2 rounded-lg hover:bg-[#5c4132]">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Categories Sidebar -->
            <div class="w-full md:w-64 flex-shrink-0">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Categories</h3>
                    <ul class="space-y-2">
                        @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('products.category', $cat) }}" 
                               class="text-gray-600 hover:text-[#463020] {{ isset($category) && $category == $cat ? 'text-[#463020] font-semibold' : '' }}">
                                {{ ucfirst($cat) }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mt-2">{{ Str::limit($product->description, 100) }}</p>
                            <p class="text-[#463020] font-bold mt-2">${{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('products.show', $product) }}" class="mt-4 inline-block bg-[#463020] text-white px-4 py-2 rounded-lg hover:bg-[#5c4132]">
                                View Details
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
