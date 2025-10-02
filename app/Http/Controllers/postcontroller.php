<?php
namespace App\Http\Controllers;

use App\Models\Post;
// import model post

class postcontroller extends Controller
{
   // daftar post
   public function index()
   {
    // menampilkan semua data dari model post
    $post = Post::all();
    return view('post.index', compact('post'));
   }
}

