<?php

namespace App\Http\Controllers;

use App\Models\Kesehatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KesehatanController extends Controller
{
    public function index() {
        $kesehatan = Http::get('http://api.aibm.my.id/kesehatan')['data']['kesehatan'];
        for ($i=0; $i < count($kesehatan); $i++) { 
            $karyawan_nip = $kesehatan[$i]['karyawan_nip'];
            $kesehatan[$i]['nama_lengkap'] = Http::get("http://api.aibm.my.id/karyawan/$karyawan_nip")['data']['karyawan']['nama_lengkap'];
        }


        return view('kesehatan.index', [

            'kesehatans'=>$kesehatan,

            
        ]);
    }

    public function create() {
        // $users = User::all(['id', 'nama_lengkap']);
        $users = Http::get('http://api.aibm.my.id/karyawan')['data']['karyawan'];

        
        return view('kesehatan.create',[
            'users'=>$users,
        ]);
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'user_id'=>'required',
            'status'=>'required',
            'keterangan'=>'required',
        ]);        

        // Kesehatan::create($attributes);
        Http::post('http://api.aibm.my.id/kesehatan',[
            'karyawan_nip'=>$attributes['user_id'],
            'status_kesehatan'=>$attributes['status'],
            'keterangan'=>$attributes['keterangan'],
        ]);

        return redirect('kesehatan');
    }

    public function edit(String $kesehatan) {
        $response = Http::get("http://api.aibm.my.id/kesehatan/$kesehatan")['data']['kesehatan'];

        $karyawan_nip = $response['karyawan_nip'];
        $response['nama_lengkap'] = Http::get("http://api.aibm.my.id/karyawan/$karyawan_nip")['data']['karyawan']['nama_lengkap'];

        return view('kesehatan.edit', [
            'kesehatan'=>$response,
        ]);
    }

    public function update(String $kesehatan, Request $request) {

        // $kesehatan->status = $request->status;
        // $kesehatan->keterangan = $request->keterangan;
        // $kesehatan->save();

        $attributes = $request->validate([
            'status'=>'required',
            'keterangan'=>'required',
        ]); 

        Http::put("http://api.aibm.my.id/kesehatan/$kesehatan", [
            'status_kesehatan'=>$attributes['status'],
            'keterangan'=>$attributes['keterangan'],
        ]);

        return redirect('kesehatan');
    }

    public function destroy(String $kesehatan) {
        // $kesehatan->delete();

        Http::delete("http://api.aibm.my.id/kesehatan/$kesehatan");

        return redirect('kesehatan');
    }
}
