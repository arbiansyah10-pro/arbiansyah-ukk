<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Mengambil semua data pesanan dari yang paling baru
        $orders = Order::with('details')->latest()->get();
        return view('reports.index', compact('orders'));
    }

    public function print()
    {
        // Data khusus untuk dicetak
        $orders = Order::with('details')->latest()->get();
        return view('reports.print', compact('orders'));
    }
}