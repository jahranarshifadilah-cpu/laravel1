<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mycontroller; // controller harus di import / di panggil dulu
use App\Http\Controllers\RelasiController;
use App\Http\Controllers\DosenController;



Route::get('/', function () {
    return view('welcome');
});

// basic
Route::get('about', function(){
    return '<h1> Hallo </h1>'.
    '<br> selamat datang di perputakaan digital';
});

// basic
Route::get('perkenalan', function () {
    return '<h1> Hallo </h1>' .
        '<br> perkenalkan nama saya jahran saya sekolah di smk assalam' .
        '<br> saya kelas xirpl3 hobi saya mancing';
});

Route::get('buku', function () {
    return view('buku');

});

Route::get('menu', function () {
    $data = [
        ['nama_makanan'=>'bala-bala','harga'=>1000,'jumlah'=>10],
        ['nama_makanan'=>'gehu pedas','harga'=>2000,'jumlah'=> 15],
        ['nama_makanan'=>'cireng isi tikus','harga'=>2500,'jumlah'=> 5],
];
$resto = "Resto MPL - Makanan Penuh Lemak";
// compact fungsinya untuk mengirim collection data (array)
// yang ada di variabel ke dalam sebuah view
return view('menu',compact('data','resto'));

});

// route parameter (nilai)
Route::get('books/{judul}',function($a){
          return 'judul buku : '.$a;

});

// Route::get('post/{title}/{category}', function ($a,$b ) {
//     // compact assosiatif
//     return view('post',['judul' =>$a, 'cat' =>$b]);

// });

// Route optional parameter
//ditandai dengan tanda tanya ?
Route::get('profile/{nama?}',function($a = "guest"){ 
   return 'halo nama saya ' .$a;
});

Route::get('order/{item?}', function($a = "Nasi"){
    return view('order',compact('a'));
});

// soal dari pa candra
// no 1
Route::get('/no1', function () {
    $barang = [
        ['nama' => 'Buku', 'harga' => 15000, 'qty' => 2],
        ['nama' => 'Pensil', 'harga' => 3000, 'qty' => 5],
        ['nama' => 'Penggaris', 'harga' => 7000, 'qty' => 1],
    ];

    return view('no1', compact('barang'));
});


// no 2
Route::get('/no2/{nama}/{mapel}/{nilai}', function ($nama, $mapel, $nilai) {
    return view('no2', compact('nama', 'mapel', 'nilai'));
});

// no 3
Route::get('/no3/{nama?}/{nilai?}', function ($nama = 'Guest', $nilai = 0) {
    return view('no3', compact('nama', 'nilai'));
});

// no 4
Route::get('/no4', function () {
    $siswa = [
        ['nama' => 'Andi', 'nilai' => 85],
        ['nama' => 'Budi', 'nilai' => 70],
        ['nama' => 'Citra', 'nilai' => 95],
    ];

    return view('no4', compact('siswa'));  
});

// test model 
Route::get('test-model',function(){
    // menampilkan semua data dari model post
    $data = App\Models\Post::all();
    return $data;
});

Route::get('create-data',function(){
    // membuat data baru melalui model 
    $data = App\Models\Post::create([
        'title' =>'laravel pusing',
        'content' =>'lorem ipsum'
    ]);
    return $data;
});

Route::get('show-data/{id}',function($id){
  // menampilkan data berdasarkan parameter id
  $data = App\Models\Post::find($id);
  return $data;
});

Route::get('edit-data/{id}', function($id){
     // mengeupdate data berdasarkan id
     $data     =App\Models\Post::find($id);
     $data->title= "membangun project dengan laravel";
     $data->content = "Lorem Ipsum";
     $data->save();
     return $data;
});

Route::get('delete-data/{id}', function($id){
    // menghapus data berdasarkan parameter id
    $data = App\Models\Post::find($id);
    $data->delete();
    // di kembalikan ke halaman test model
    return redirect('test-model');
});

Route::get('search/{cari}', function ($query){
    // mencari data berdasarkan title yang mirip seperti (like) ......
    $data = App\Models\Post::where('title','like', '%' . $query . '%')->get();
    return $data;
});

// pemanggilan url mengunakan controller
Route::get('greetings',[Mycontroller::class,'hello']);
Route::get('student',[Mycontroller::class,'siswa']);

use App\Http\Controllers\Postcontroller;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// post
Route::get('post', [PostController::class, 'index'])->name('post.index');

// tambah data post
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post',[PostController::class, 'store'])->name('post.store');

// edit data post
Route::get('post/{id}/edit',[PostController::class, 'edit'])->name('post.edit');
Route::put('post/{id}',[PostController::class, 'update'])->name('post.update');

// show data
Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');

// tugas 
Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');

// biodata tugas
use App\Http\Controllers\BiodataController;

Route::resource('biodata', BiodataController::class);


// hapus data
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.delete');


// relasi

Route::get('/one-to-one', [RelasiController::class, 'oneToOne']);
Route::get('/one-to-many', [RelasiController::class, 'oneToMany']);
Route::get('/many-to-many', [RelasiController::class, 'manyToMany']);
Route::get('eloquent', [RelasiController::class, 'eloquent']);

// dosen2
Route::resource('dosen', DosenController::class);


use App\Http\Controllers\HobiController;

Route::resource('hobi', HobiController::class);


// CRUD One To Many
Route::resource('mahasiswa', App\Http\Controllers\Mahasiswacontroller::class);
Route::resource('wali', App\Http\Controllers\WaliController::class);

// CRUD pelanggan

    Route::get('transaksi/search', [ App\Http\Controllers\TransaksiController::class, 'search'])->name('transaksi.search');
    Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
    Route::resource('produk', App\Http\Controllers\ProdukController::class);
    Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
    Route::resource('pembayaran', App\Http\Controllers\PembayaranController::class);




