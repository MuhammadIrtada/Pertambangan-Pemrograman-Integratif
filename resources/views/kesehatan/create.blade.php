@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kesehatan'])
    <div class="container-fluid py-4">
        <form action="{{ route('kesehatan.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Form Pemeriksaan Kesehatan</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="karyawan_id" for="example-text-input" class="form-control-label">Nama Karyawan</label>
                                        <select id="user_id" name="user_id" class="form-select" aria-label="Default select example">
                                            <option selected>Pilih Karyawan</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user['nip'] }}">{{ $user['nama_lengkap'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="status" for="example-text-input" class="form-control-label">Status Kesehatan</label>
                                        <select id="status" name="status" class="form-select" aria-label="Default select example">
                                            <option selected>Pilih Status Kesehatan</option>
                                            <option value="sehat">Sehat</option>
                                            <option value="sakit">Sakit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="keterangan" class="form-control-label">Keterangan</label>
                                        <input id="keterangan" name="keterangan" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-gradient-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
