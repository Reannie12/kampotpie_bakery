@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold text-[#1f2937] mb-6">Edit Category</h1>

    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="w-full rounded-lg border-gray-300" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-[#1f2937] text-white rounded-lg hover:bg-[#111827]">
                    Update
                </button>
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection