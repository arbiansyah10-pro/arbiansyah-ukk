<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $menu->name,
                "quantity" => 1,
                "price" => $menu->price,
                "image" => $menu->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Menu berhasil ditambahkan ke keranjang!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Menu dihapus dari keranjang!');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'delivery' => 'required|string',
            'payment' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $cart = session()->get('cart', []);
        
        if(empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang masih kosong!');
        }

        // 1. Hitung total harga
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // 2. Simpan ke tabel orders
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'delivery_method' => $request->delivery,
            'payment_method' => $request->payment,
            'notes' => $request->notes,
            'total_price' => $total
        ]);

        // 3. Susun Pesan WA & Simpan ke tabel order_details
        $pesan = "Halo *Penyetan Pwedespoll*, saya *{$request->customer_name}* mau pesen makanan nih:\n\n";

        foreach($cart as $id => $item) {
            $subtotal = $item['price'] * $item['quantity'];
            
            OrderDetail::create([
                'order_id' => $order->id,
                'menu_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $subtotal
            ]);
            
            $pesan .= "- {$item['name']} ({$item['quantity']}x) = Rp " . number_format($subtotal, 0, ',', '.') . "\n";
        }

        $pesan .= "\n*Total Belanja:* Rp " . number_format($total, 0, ',', '.') . "\n";
        $pesan .= "---------------------------\n";
        $pesan .= "*Pengiriman:* {$request->delivery}\n";
        $pesan .= "*Pembayaran:* {$request->payment}\n";
        $pesan .= "*Catatan Request:* " . ($request->notes ? $request->notes : "Tidak ada") . "\n";
        $pesan .= "---------------------------\n";
        $pesan .= "Mohon segera disiapkan ya, terima kasih!";

        // 4. Kosongkan keranjang setelah checkout
        session()->forget('cart');

        // 5. Alihkan ke WhatsApp
        $waNumber = "6281324850055"; // GANTI DENGAN NOMOR WA TANTE KAMU
        $waLink = "https://wa.me/" . $waNumber . "?text=" . urlencode($pesan);

        return redirect()->away($waLink);
    }
}