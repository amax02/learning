<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    function index()
    {
        $materis = Materi::all();

        return view('materis.index', compact(['materis']));
    }

    function create()
    {
        return view('materis.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'slug' => 'required',
            'text' => 'required',
            'gambar' => 'required',
            'kategori' => 'required',

        ]);
        Materi::create([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'text' => $request->text,
            'gambar' => $request->gambar,
            'kategori' => $request->kategori,

        ]);

        return redirect('materis')->with('success', 'Data materi berhasil ditambahkan.');
    }

    function edit($id)
    {
        $materi = Materi::find($id);
        return view('materis.edit', compact(['materi']));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'slug' => 'required',
            'text' => 'required',
            'gambar' => 'required|max:2048',
            'kategori' => 'required',

        ]);
        $materi = Materi::find($id);

        

        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Simpan file di storage/app/public
        $res = $file->storeAs('public', $filename);
        if(!$res){
        return redirect('materis')->with('failed', 'Gagal upload gambar.');

        }


        $materi->update([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'text' => $request->text,
            'gambar' => $filename,
            'kategori' => $request->kategori,


        


        ]);
        return redirect('materis')->with('success', 'Data materi berhasil diubah.');
    }

    function destroy($id)
    {
        $materi = Materi::find($id);
        $materi->delete();
        return redirect('materis')->with('success', 'Data materi berhasil dihapus.');
    }
}
