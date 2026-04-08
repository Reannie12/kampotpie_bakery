@extends('layouts.admin')

@section('content')
<section class="max-w-4xl mx-auto px-2 sm:px-4 py-6">
    <div class="mb-8">
        <h1 class="font-display text-4xl text-[#4e2f24]">Add New Product</h1>
        <p class="mt-2 text-[#7c5c52]">Create a new bakery item for your menu.</p>
    </div>

    <div class="rounded-[2rem] bg-white p-8 shadow-sm border border-[#eadfd6]">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Product Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 focus:border-[#e5987c] focus:outline-none">
                @error('name')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 focus:border-[#e5987c] focus:outline-none">
                    @error('price')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 focus:border-[#e5987c] focus:outline-none">
                    @error('stock')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Category</label>
                <select name="category_id" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 focus:border-[#e5987c] focus:outline-none">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Description</label>
                <textarea name="description" rows="5" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3 focus:border-[#e5987c] focus:outline-none">{{ old('description') }}</textarea>
                @error('description')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-[#6b4f4f]">Product Image</label>
                <input type="file" name="image" class="w-full rounded-2xl border border-[#ead9cd] px-4 py-3">
                <p class="mt-2 text-sm text-[#8a6c63]">If you do not upload an image, the menu will use a matching bakery image automatically.</p>
                @error('image')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div class="flex flex-wrap gap-4">
                <button type="submit" class="rounded-full bg-[#5a3825] px-6 py-3 text-sm font-semibold text-white hover:bg-[#462b1d] transition">Save Product</button>
                <a href="{{ route('products.index') }}" class="rounded-full border border-[#d9b7a6] px-6 py-3 text-sm font-semibold text-[#6b4f4f] hover:bg-[#fff1e8] transition">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection
