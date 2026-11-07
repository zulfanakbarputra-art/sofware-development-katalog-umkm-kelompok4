<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'size_id' => ['required', 'integer'],
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $product = Product::with('sizes')->findOrFail($data['product_id']);
        $size = $product->sizes->find($data['size_id']);

        if (! $size || ! $product->canBeOrdered()) {
            return redirect(route('home').'#produk')
                ->with('error', 'Pesanan tidak bisa diproses. Pastikan produk tersedia, lalu coba lagi.');
        }

        $message = "Halo, saya ingin memesan:\n"
            ."Produk: {$product->name}\n"
            ."Ukuran: {$size->size}\n"
            ."Jumlah: {$data['quantity']}\n\n"
            .'Terima kasih.';

        return redirect()->away(Setting::current()->whatsappUrl($message));
    }
}
