<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post_Tag;

class TagPostController extends Controller
{
    public function index()
    {
    	$data = Post_Tag::all();

    	return view('pivot-tabel.tag_post', compact('data'));
    }
}
