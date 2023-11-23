<?php

namespace App\Http\Controllers;

use App\Models\Pertambangan;
use App\Models\User;
use Illuminate\Http\Request;

class PertambanganController extends Controller
{
    public function index() {
        return view('pertambangan.index', [
            'pertambangans'=>Pertambangan::all()->sortByDesc('created_at'),
        ]);
    }

    public function create() {
        $users = User::all(['id', 'nama_lengkap']);
        return view('pertambangan.create',[
            'users'=>$users,
        ]);
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'nama'=>'required',
            'jenis_minyak'=>'required',
            'lokasi'=>'required',
            'volume'=>'required'
        ]);        

        Pertambangan::create($attributes);

        return redirect('pertambangan');
    }

    public function edit(Pertambangan $pertambangan) {
        return view('pertambangan.edit', [
            'pertambangan'=>$pertambangan,
        ]);
    }

    public function update(Request $request, Pertambangan $pertambangan) {

        $pertambangan->nama = $request->nama;
        $pertambangan->jenis_minyak = $request->jenis_minyak;
        $pertambangan->lokasi = $request->lokasi;
        $pertambangan->volume = $request->volume;
        $pertambangan->save();

        return redirect('pertambangan');
    }

    public function destroy(Pertambangan $pertambangan) {
        $pertambangan->delete();
        return redirect('pertambangan');
    }
}
