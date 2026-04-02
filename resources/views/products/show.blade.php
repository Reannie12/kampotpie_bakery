@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $product->name }}</h1>

    <div class="row">
        <div class="col-md-6">
            {{-- Show product image or fallback --}}
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" 
                     class="img-fluid rounded mb-3" 
                     alt="{{ $product->name }}">
            @else
                <img src="{{ asset('images/placeholder.png') }}" 
                     class="img-fluid rounded mb-3" 
                     alt="No image available">
            @endif
        </div>

        <div class="col-md-6">
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Description:</strong> {{ $product->description ?? 'No description available.' }}</p>
            <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>

            <div class="mt-3">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>
    </div>
</div>
@endsection
