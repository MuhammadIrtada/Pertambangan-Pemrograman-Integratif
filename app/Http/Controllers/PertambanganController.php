<?php

namespace App\Http\Controllers;

use App\Models\Pertambangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PertambanganController extends Controller
{
    public function index() {
        $pertamabangan = Http::get('http://api.aibm.my.id/storagetank')['data']['storagetank'];
        return view('pertambangan.index', [
            // 'pertambangans'=>Pertambangan::all()->sortByDesc('created_at'),
            'pertambangans'=>$pertamabangan,
        ]);
    }

    public function create() {
        return view('pertambangan.create');
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'nama'=>'required',
            'jenis_minyak'=>'required',
            'lokasi'=>'required',
            'volume'=>'required'
        ]);        

        // Pertambangan::create($attributes);
        Http::post('http://api.aibm.my.id/storagetank',[
            'nama'=>$attributes['nama'],
            'jenis_minyak'=>$attributes['jenis_minyak'],
            'lokasi'=>$attributes['lokasi'],
            'volume'=>$attributes['volume']        
        ]);

        return redirect('pertambangan');
    }

    public function edit(Request $request) {
        $pertambangan = Http::get("http://api.aibm.my.id/storagetank/$request->id")['data']['storagetank'][0];
        return view('pertambangan.edit', [
            'pertambangan'=>$pertambangan,
        ]);
    }

    public function update(String $pertambangan, Request $request) {

        // $pertambangan->nama = $request->nama;
        // $pertambangan->jenis_minyak = $request->jenis_minyak;
        // $pertambangan->lokasi = $request->lokasi;
        // $pertambangan->volume = $request->volume;
        // $pertambangan->save();

        $attributes = $request->validate([
            'nama'=>'required',
            'jenis_minyak'=>'required',
            'lokasi'=>'required',
            'volume'=>'required'
        ]);   

        Http::put("http://api.aibm.my.id/storagetank/$pertambangan", [
            'nama'=>$attributes['nama'],
            'jenis_minyak'=>$attributes['jenis_minyak'],
            'lokasi'=>$attributes['lokasi'],
            'volume'=>$attributes['volume']  
        ]);

        return redirect('pertambangan');
    }

    public function destroy(String $pertambangan) {
        // $pertambangan->delete();

        Http::delete("http://api.aibm.my.id/storagetank/$pertambangan");
        return redirect('pertambangan');
    }
}
