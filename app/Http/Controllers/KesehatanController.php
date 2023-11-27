<?php

namespace App\Http\Controllers;

use App\Models\Kesehatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KesehatanController extends Controller
{
    public function index() {
        $response = Http::get('http://microservice-user.test/api/users');

        return view('kesehatan.index', [
            'kesehatans'=>Kesehatan::all()->sortByDesc('created_at'),
        ]);
    }

    public function create() {
        $users = User::all(['id', 'nama_lengkap']);
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

        Kesehatan::create($attributes);

        return redirect('kesehatan');
    }

    public function edit(Kesehatan $kesehatan) {
        return view('kesehatan.edit', [
            'kesehatan'=>$kesehatan,
        ]);
    }

    public function update(Request $request, Kesehatan $kesehatan) {

        $kesehatan->status = $request->status;
        $kesehatan->keterangan = $request->keterangan;
        $kesehatan->save();

        return redirect('kesehatan');
    }

    public function destroy(Kesehatan $kesehatan) {
        $kesehatan->delete();
        return redirect('kesehatan');
    }
}
