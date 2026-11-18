<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request): \Illuminate\View\View
    {
        // 1. Tangkap input 'q' dari form (default string kosong)
        $q = $request->input('q', '');

        // Data dummy produk yang disesuaikan dengan kebutuhan tampilan kartu (wireframe)
        $produk = [
            [
                'id' => 1, 
                'nama' => 'Paket Nasi Liwet Komplit', 
                'kategori' => 'Paket Harian', 
                'harga' => 38000, 
                'stok' => 12,
                'deskripsi' => 'Nasi gurih kelapa dengan lauk ayam ungkep rempah serundeng, tahu tempe bacem, telur pindang, lalapan kencur, serta sambal terasi matang.'
            ],
            [
                'id' => 2, 
                'nama' => 'Paket Beef Bulgogi Bento', 
                'kategori' => 'Paket Kustom', 
                'harga' => 48000, 
                'stok' => 5,
                'deskripsi' => 'Daging sapi US slice bumbu autentik manis gurih, disajikan dalam bento box premium dengan gyoza ayam dan salad saus wijen.'
            ],
            [
                'id' => 3, 
                'nama' => 'Paket Prasmanan Nusantara Heritage', 
                'kategori' => 'Prasmanan', 
                'harga' => 75000, 
                'stok' => 0,
                'deskripsi' => 'Lengkap 7 menu utama: Rendang Daging Dapur Modern, Ayam Bakar Taliwang, Ikan Asam Manis, Sop Buntut, Puding Lumut, & setup chafing dish gratis.'
            ],
            [
                'id' => 4, 
                'nama' => 'Paket Ayam Geprek Keju Lumer', 
                'kategori' => 'Paket Harian', 
                'harga' => 32000, 
                'stok' => 0,
                'deskripsi' => 'Ayam fillet krispi renyah dengan ulekan cabai rawit pedas level 1-5, diselimuti keju mozarella leleh panggang api gas torch.'
            ],
            [
                'id' => 5, 
                'nama' => 'Sup Iga Rempah Istimewa', 
                'kategori' => 'Paket Kustom', 
                'harga' => 55000, 
                'stok' => 8,
                'deskripsi' => 'Iga sapi Australia empuk yang direbus selama 4 jam dengan kapulaga, cengkih, dan pala wangi. Dilengkapi kentang, wortel, dan emping renyah.'
            ],
            [
                'id' => 6, 
                'nama' => 'Paket Sehat Salad Wrap & Cold Pressed Juice', 
                'kategori' => 'Paket Harian', 
                'harga' => 42000, 
                'stok' => 15,
                'deskripsi' => 'Tortilla gandum panggang isi dada ayam sous-vide, kale hidroponik, alpukat mentega, plus 250ml jus apel, seledri, dan nanas tanpa gula.'
            ],
        ];

        // 2. Lakukan filter pencarian jika variabel $q diisi oleh pengguna
        if (!empty($q)) {
            $produk = array_filter($produk, function ($item) use ($q) {
                // Mencari nama produk atau kategori yang mengandung kata kunci $q (tidak case-sensitive)
                return stripos($item['nama'], $q) !== false || stripos($item['kategori'], $q) !== false;
            });
        }

        // 3. Kirim data produk yang sudah difilter dan nilai $q ke view
        return view('katalog.index', compact('produk', 'q'));
    }
}