<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function index()
    {
        $videos = Video::join('materis', 'materis.id', '=', 'videos.id_materis')->select('videos.id','link', 'materis.judul')->get();

        return view('videos.index', compact(['videos']));
    }

    function create()
    {
        $materis = Materi::all();
        return view('videos.create', compact('materis'));
    }

    function store(Request $request)
    {
        $request->validate([
            'link' => 'required',
            'id_materis' => 'required',

        ]);
        Video::create([
            'judul' => $request->judul ?? '',
            'link' => $request->link,
            'id_materis' => $request->id_materis,

        ]);

        return redirect('videos')->with('success', 'Data video berhasil ditambahkan.');
    }

    function edit($id)
    {
        $materis = Materi::all();
        $video = Video::find($id);
        return view('videos.edit', compact(['video', 'materis']));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'link' => 'required',
            'id_materis' => 'required',

        ]);
        $video = Video::find($id);
        $video->update([
            'judul' => $request->judul ?? '',
            'link' => $request->link,
            'id_materis' => $request->id_materis,


        ]);
        return redirect('videos')->with('success', 'Data video berhasil diubah.');
    }

    function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect('videos')->with('success', 'Data video berhasil dihapus.');
    }
}
