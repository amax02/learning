<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Video;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index(Request $request)
    {
       
        $id = $request->id ?? null;
        $materis = Materi::orderBy('kategori','asc')->get()->toArray(); //untuk list materi
        $kategori = Materi::select('kategori')->groupBy('kategori')->orderBy('kategori', 'asc')->get()->toArray();
        $data = [];
        $temp = '';
        foreach($materis as $k => $v){
            if($k == 0){
                $temp = $v['kategori'];
                $data[$temp] = [];
            }else{
                if($temp != $v['kategori']){
                    $temp = $v['kategori'];
                    $data[$temp] = [];
                }
            }
            $data[$temp][] = $v;
        }
    
       

        

        return view('frontend/index', compact(['data', 'kategori']));
    }

    function course(Request $request)
    {
       
        $id = $request->id ?? null;
        if(!isset($id)) return redirect(url("frontend"));

        $videos = null; //untuk video materi yang diambil
        $detail = null; //untuk mengambil satu materi dari id
        if(isset($id)){
            $detail = Materi::find($id);
            if($detail){
                $videos = Video::where('id_materis', $detail->id)->get();
            }
        }
        

        return view('frontend.course', compact(['detail', 'videos']));
    }

}
