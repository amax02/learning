<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function index()
    {
        $videos = Video::all();

        return view('videos.index', compact(['videos']));
    }

    function create()
    {
        return view('videos.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5',
            'link' => 'required',

        ]);
        Video::create([
            'judul' => $request->judul,
            'link' => $request->link,

        ]);

        return redirect('videos')->with('success', 'Data video berhasil ditambahkan.');
    }

    function edit($id)
    {
        $video = Video::find($id);
        return view('videos.edit', compact(['video']));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required',

        ]);
        $video = Video::find($id);
        $video->update([
            'judul' => $request->judul,
            'link' => $request->link,


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
