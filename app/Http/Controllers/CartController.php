<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $quantity = (int) $request->input('quantity', 1);

        if ($quantity < 1) {
            return redirect()->back()->with('error', 'Invalid quantity.');
        }

        if ($product->stock < $quantity) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $newQuantity = $cart[$product->id]['quantity'] + $quantity;

            if ($newQuantity > $product->stock) {
                return redirect()->back()->with('error', 'Cannot add more than available stock.');
            }

            $cart[$product->id]['quantity'] = $newQuantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request, Product $product)
    {
        $quantity = (int) $request->input('quantity', 1);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            if ($quantity <= 0) {
                unset($cart[$product->id]);
            } else {
                $cart[$product->id]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully.');
    }
}