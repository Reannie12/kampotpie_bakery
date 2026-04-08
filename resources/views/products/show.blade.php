@extends(auth()->check() && auth()->user()->isAdmin() ? 'layouts.admin' : 'layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-14">
    <div class="mb-8">
        <a href="{{ route('products.index') }}" class="text-sm font-semibold text-[#c06c52] hover:underline">
            ← Back to Menu
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 rounded-lg bg-red-100 px-4 py-3 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid gap-10 lg:grid-cols-2">
        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm border border-[#eadfd6]">
            <img
                src="{{ $product->image_url }}"
                alt="{{ $product->name }}"
                class="w-full h-full object-cover min-h-[420px]"
                onerror="this.src='{{ asset('image/logokampotpie.jpg') }}'">
        </div>

        <div class="flex flex-col justify-center">
            @if($product->category)
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-[#c06c52]">
                    {{ $product->category->name }}
                </p>
            @endif

            <h1 class="mt-3 font-display text-5xl text-[#4b2e2b]">
                {{ $product->name }}
            </h1>

            <p class="mt-4 text-lg text-[#6f554e]">
                {{ $product->description ?? 'Fresh and delicious bakery item.' }}
            </p>

            <div class="mt-6 space-y-2">
                <p class="text-3xl font-bold text-[#c06c52]">
                    ${{ number_format($product->price, 2) }}
                </p>
                <p class="text-sm font-semibold text-[#8a6c63]">
                    Stock: {{ $product->stock }}
                </p>
            </div>

            <div class="mt-8">
                @auth
                    @if(auth()->user()->isAdmin())
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                               class="rounded-xl bg-[#fff2e9] px-5 py-3 text-sm font-semibold text-[#8b5e3c] hover:bg-[#ffe8d8] transition">
                                Update
                            </a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="rounded-xl bg-red-500 px-5 py-3 text-sm font-semibold text-white hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @else
                        @if($product->stock > 0)
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="space-y-4">
                                @csrf

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-[#4b2e2b]">
                                        Quantity
                                    </label>
                                    <input type="number"
                                           name="quantity"
                                           value="1"
                                           min="1"
                                           max="{{ $product->stock }}"
                                           class="w-28 rounded-xl border border-[#d9c2b1] bg-[#fffaf5] px-4 py-3 text-base font-semibold text-[#4b2e2b] focus:outline-none focus:ring-2 focus:ring-[#d9c2b1]">
                                </div>

                                <button type="submit"
                                        class="rounded-xl bg-[#f4d9c6] px-6 py-3 text-sm font-semibold text-[#4b2e2b] hover:bg-[#eac7ad] transition">
                                    Add to Cart
                                </button>
                            </form>
                        @else
                            <button disabled
                                    class="rounded-xl bg-gray-200 px-6 py-3 text-sm font-semibold text-gray-500 cursor-not-allowed">
                                Out of Stock
                            </button>
                        @endif
                    @endif
                @else
                <a href="{{ route('login') }}"
                class="inline-flex items-center justify-center rounded-xl border border-[#d9c2b1] bg-[#fff8f3] px-6 py-3 text-sm font-semibold text-[#4b2e2b] hover:bg-[#f4e3d7] transition">
                    Login to Order
                </a>
                @endauth
            </div>
        </div>
    </div>
</section>
@endsection