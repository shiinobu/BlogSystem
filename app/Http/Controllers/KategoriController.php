<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();

        return view('kategoris.index', compact('data'));
    }

    public function create()
    {
        return view('kategoris.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        	'name'	=> 'required|string',
        	'slug'	=> 'required|string',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'image';
        $file->move($tujuan_upload,$nama_file);

        $data = new Kategori();
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->image = $nama_file;
        $data->save();
 
        return redirect('Kategori')->with('success', 'Data Sukses Dibuat.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Kategori::findOrFail($id);

        return view('kategoris.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required|string',
            'slug'  => 'required|string',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = Kategori::findOrFail($id);

        if($request->file('image') == "") {
            $data->name = $data->name;
            $data->slug = $data->slug;
            $data->image = $data->image;
            $data->save();
        } else {
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'image';
            $file->move($tujuan_upload,$nama_file);

            $data->name = $request->name;
            $data->slug = $request->slug;
            $data->image = $nama_file;
            $data->save();
        }
        
        return redirect('Kategori')->with('success', 'Data Sukses Diedit.');
    }

    public function destroy($id)
    {
        $data = Kategori::findOrFail($id);
        $data->delete();

        return redirect('Kategori')->with('success', 'Data Sukses Dihapus.');
    }
}
