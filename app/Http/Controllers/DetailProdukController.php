<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetailProdukController extends Controller
{

    public function show(Product $product)
{
    // Ambil data produk beserta relasinya
    $product->load('images');

    // Ambil data kota dari API Raja Ongkir
    $response = Http::withHeaders([
        'key' => '0bd4dffff59c37f1f5d63c3ae751ba2d'
    ])->get('https://api.rajaongkir.com/starter/city');

    
    $cities = $response['rajaongkir']['results'];

    // Kirim data ke view
    return view('produk.detailProduk', [
        'product' => $product,
        'cities' => $cities,
        'ongkir' => ''
    ]);
}

public function cekOngkir(Request $request, Product $product) {

    // Ambil data produk beserta relasinya
    $product->load('images');

    $response = Http::withHeaders([
        'key' => '0bd4dffff59c37f1f5d63c3ae751ba2d'
    ])->get('https://api.rajaongkir.com/starter/city');

    $responseCost = Http::withHeaders([
        'key' => '0bd4dffff59c37f1f5d63c3ae751ba2d'
    ])->post('https://api.rajaongkir.com/starter/cost', [
        'origin' => $request->origin,
        'destination' => $request->destination,
        'weight' => $request->weight,
        'courier' => $request->courier,
    ]);

    $cities = $response['rajaongkir']['results'];
    $ongkir = $responseCost['rajaongkir'];

    // Kirim data ke view
    return view('produk.detailProduk', [
        'product' => $product,
        'cities' => $cities,
        'ongkir' => $ongkir
    ]);

}

    // public function index()
    // {
    //     // Ambil data dari API Raja Ongkir
    //     $response = Http::withHeaders([
    //         'key' => '0bd4dffff59c37f1f5d63c3ae751ba2d'
    //     ])->get('https://api.rajaongkir.com/starter/city');

    
    //     // Ekstrak hasilnya
    //     $cities = $response['rajaongkir']['results'];

    
    //     // Kirim data ke view detailproduk.blade
    //     return view('produk.detailProduk', ['cities' => $cities]);
    // }
    



    // public function show(Product $product){
    //     $product->load('images');

    //     return view('produk.detailProduk', ['product' => $product]);
    // }
}
