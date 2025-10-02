<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mycontroller extends Controller
{
  public function hello(){
    $nama = "jahran";
    $umur = 16;
    return view('hello',compact('nama','umur'));
  }

  public function siswa(){
    $data =[
        ['nama'=>'jahran','kelas'=>'xirpl3'],
        ['nama'=>'lintang','kelas'=>'xirpl3'],
        ['nama'=>'iqbal','kelas'=>'xirpl3'],
    ];
     return view('siswa', compact('data'));
  }
}
