<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
{
    //MEMBUAT QUERY UNTUK MENGAMBIL DATA PRODUK YANG DIURUTKAN BERDASARKAN TGL TERBARU
    //DAN DI-LOAD 10 DATA PER PAGENYA
    $products = Product::orderBy('created_at', 'DESC')->paginate(10);
    //LOAD VIEW INDEX.BLADE.PHP DAN PASSING DATA DARI VARIABLE PRODUCTS
    return view('ecommerce.index', compact('products'));
}

}
