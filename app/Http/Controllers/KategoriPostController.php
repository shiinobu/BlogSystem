<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori_Post;

class KategoriPostController extends Controller
{
    public function index()
    {
    	$data = Kategori_Post::all();

    	return view('pivot-tabel.kategori_post', compact('data'));
    }
}
