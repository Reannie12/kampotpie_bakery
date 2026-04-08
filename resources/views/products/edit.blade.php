@extends('layouts.admin')

@section('content')
<section class="max-w-4xl mx-auto px-2 sm:px-4 py-6">
    <div class="mb-8 flex items-center justify-between gap-4">
        <div>
            <h1 class="font-display text-4xl text-[#4e2f24]">Edit Product</h1>
            <p class="mt-2 text-[#7c5c52]">Update your bakery menu item.</p>
        </div>
        <a href="{{ route('products.index') }}" class="rounded-full border border-[#d9b7a6] px-5 py-3 text-sm font-semibold text-[#6b4f4f] hover:bg-[#fff1e8] transition">Back to Menu</a>
    </div>

    <div class="rounded-[2rem] bg-white p-8 shadow-sm border border-[#eadfd6]">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid gap-6 md:grid-cols-[140px_1fr] items-start">
                <div>
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-32 w-32 rounded-2xl object-cover shadow border border-[#eadfd6]" onerror="this.src='{{ asset('image/logokampotpie.jpg') }}'">
                </div>
                <div class="space-y-6">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Product Name</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 text-[#4b2e2b] bg-white focus:border-[#e5987c] focus:outline-none">
                        @error('name')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Price</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 text-[#4b2e2b] bg-white focus:border-[#e5987c] focus:outline-none">
                            @error('price')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Stock</label>
                            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 text-[#4b2e2b] bg-white focus:border-[#e5987c] focus:outline-none">
                            @error('stock')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Category</label>
                        <select name="category_id" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 text-[#4b2e2b] bg-white focus:border-[#e5987c] focus:outline-none">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Description</label>
                        <textarea name="description" rows="5" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 text-[#4b2e2b] bg-white focus:border-[#e5987c] focus:outline-none">{{ old('description', $product->description) }}</textarea>
                        @error('description')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Replace Image</label>
                        <input type="file" name="image" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 text-[#4b2e2b] bg-white">
                        @error('image')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap gap-4">
                <button type="submit" class="rounded-full bg-[#5a3825] px-6 py-3 text-sm font-semibold text-white hover:bg-[#462b1d] transition">Update Product</button>
                <a href="{{ route('products.index') }}" class="rounded-full border border-[#d9b7a6] px-6 py-3 text-sm font-semibold text-[#6b4f4f] hover:bg-[#fff1e8] transition">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection
