<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $data = Tag::all();

        return view('tags.index', compact('data'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|string',
            'slug'  => 'required|string',
        ]);

        $data = new Tag();
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->save();
 
        return redirect('Tag')->with('success', 'Data Sukses Dibuat.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Tag::findOrFail($id);

        return view('tags.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required|string',
            'slug'  => 'required|string',
        ]);

        $data = Tag::findOrFail($id);
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->save();
 
        return redirect('Tag')->with('success', 'Data Sukses Diedit.');
    }

    public function destroy($id)
    {
        $data = Tag::findOrFail($id);
        $data->delete();

        return redirect('Tag')->with('success', 'Data Sukses Dihapus.');
    }
}
