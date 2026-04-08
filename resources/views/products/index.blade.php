@extends(auth()->check() && auth()->user()->isAdmin() ? 'layouts.admin' : 'layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-2 sm:px-4 py-8">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
        <div>
            <p class="uppercase tracking-[0.3em] text-sm text-[#c06c52] font-semibold">
                {{ auth()->check() && auth()->user()->isAdmin() ? 'Menu Management' : 'Order Online' }}
            </p>
            <h1 class="font-display text-4xl md:text-5xl text-[#4b2e2b] mt-3">Our Menu</h1>
            <p class="text-[#7a5c55] max-w-xl mt-3 text-base">
                {{ auth()->check() && auth()->user()->isAdmin() ? 'Add, update, and delete bakery items from here.' : 'Fresh bakery, coffee, and ice cream — ready to order.' }}
            </p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-xl bg-green-100 px-4 py-3 text-green-700 font-medium">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 rounded-xl bg-red-100 px-4 py-3 text-red-700 font-medium">
            {{ session('error') }}
        </div>
    @endif

    @if($products->count())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($products as $product)
                <div class="bg-white border border-[#eadfd6] rounded-2xl shadow-sm overflow-hidden">
                    <div class="flex items-center gap-4 p-4">
                        <div class="shrink-0">
                            <img
                                src="{{ $product->image_url }}"
                                alt="{{ $product->name }}"
                                class="w-28 h-28 rounded-xl object-cover"
                                onerror="this.src='{{ asset('image/logokampotpie.jpg') }}'">
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h2 class="text-xl font-bold text-[#4b2e2b] leading-tight">{{ $product->name }}</h2>
                                    @if($product->category)
                                        <p class="text-sm text-[#a67c6b] mt-1">{{ $product->category->name }}</p>
                                    @endif
                                </div>

                                <span class="text-lg font-bold text-[#c06c52] whitespace-nowrap">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </div>

                            <p class="text-sm text-[#6f554e] mt-2 line-clamp-2">
                                {{ $product->description ?? 'Fresh and delicious bakery item.' }}
                            </p>

                            <p class="text-xs font-semibold text-[#8a6c63] mt-2">
                                Stock: {{ $product->stock }}
                            </p>

                            <div class="mt-4 flex flex-wrap gap-2">
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="inline-flex items-center justify-center rounded-xl border border-[#d9c2b1] px-4 py-2 text-sm font-semibold text-[#4b2e2b] hover:bg-[#fff8f3] transition">
                                    View
                                </a>

                                @auth
                                    @if(auth()->user()->isAdmin())
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                           class="rounded-xl bg-[#fff2e9] px-4 py-2 text-sm font-semibold text-[#8b5e3c] hover:bg-[#ffe8d8] transition">
                                            Update
                                        </a>

                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="rounded-xl bg-red-500 px-4 py-2 text-sm font-semibold text-white hover:bg-red-600 transition">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                       class="rounded-xl bg-[#8b5e3c] px-4 py-2 text-sm font-semibold text-white hover:bg-[#71482c] transition">
                                        Login to Order
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="rounded-2xl bg-white px-8 py-16 text-center shadow-sm">
            <h2 class="text-2xl font-bold text-[#4b2e2b]">No products available yet</h2>
            <p class="text-[#7a5c55] mt-3">Please check back later.</p>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.products.create') }}"
                       class="inline-flex mt-6 rounded-full bg-[#8b5e3c] px-6 py-3 text-sm font-semibold text-white hover:bg-[#71482c] transition">
                        Add First Product
                    </a>
                @endif
            @endauth
        </div>
    @endif
</section>
@endsection