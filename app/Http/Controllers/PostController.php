<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Kategori;
use App\Tag;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();

        return view('posts.index', compact('data'));
    }

    public function create()
    {   
        $data = new Post();

        return view('posts.create', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|string',
            'slug'        => 'required|string',
            'image'       => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'body'        => 'required|string',
            'view_count'  => 'required|integer',
        ]);

        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'image';
        $file->move($tujuan_upload,$nama_file);

        $data = new Post();
        $data->title = $request->title;
        $data->slug = $request->slug;
        $data->image = $nama_file;
        $data->body = $request->body;
        $data->view_count = $request->view_count;
        $data->save();

        $kategori = Kategori::find([1,2]);
        $data->kategori()->attach($kategori);

        $tag = Tag::find([1,3]);
        $data->tag()->attach($tag);
 
        return redirect('Post')->with('success', 'Data Sukses Dibuat.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Post::findOrFail($id);

        return view('posts.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'       => 'required|string',
            'slug'        => 'required|string',
            'image'       => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'body'        => 'required|string',
            'view_count'  => 'required|integer',
        ]);

        $data = Post::findOrFail($id);

        if($request->file('image') == "") {
            $data->image = $data->image;
            $data->title = $request->title;
            $data->slug = $request->slug;
            $data->body = $request->body;
            $data->view_count = $request->view_count;
            $data->save();
        } else {
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'image';
            $file->move($tujuan_upload,$nama_file);

            $data->title = $request->title;
            $data->slug = $request->slug;
            $data->image = $nama_file;
            $data->body = $request->body;
            $data->view_count = $request->view_count;
            $data->save();
        }

        $kategori = Kategori::find(2);
        $data->kategori()->sync($kategori);

        $tag = Tag::find(3);
        $data->tag()->sync($tag);
        
        return redirect('Post')->with('success', 'Data Sukses Diedit.');
    }

    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        $data->delete();

        return redirect('Post')->with('success', 'Data Sukses Dihapus.');
    }
}
