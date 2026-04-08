@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-[#1f2937]">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-[#1f2937] text-white rounded-lg hover:bg-[#111827]">
            + Add Category
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow p-6">
        @if($categories->count())
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3">ID</th>
                        <th class="text-left py-3">Name</th>
                        <th class="text-left py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr class="border-b">
                            <td class="py-3">{{ $category->id }}</td>
                            <td class="py-3">{{ $category->name }}</td>
                            <td class="py-3 flex gap-2">
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                   class="px-3 py-1 bg-yellow-400 text-white rounded">
                                    Edit
                                </a>

                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-500 text-white rounded"
                                            onclick="return confirm('Delete this category?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">No categories found.</p>
        @endif
    </div>
</div>
@endsection