@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Pertambangan'])
    <div class="container-fluid py-4">
        <form action="{{ route('pertambangan.update', $pertambangan['id_tangki_penyimpanan']) }}" method="post">
            @csrf
            @method('patch')
            <div class="row">
                <div class="">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Form Penambahan Stock Minyak</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <input id="nama" name="nama" class="form-control" type="text" value="{{ $pertambangan['nama'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jenis_minyak" class="form-control-label">Jenis Minyak</label>
                                        <input id="jenis_minyak" name="jenis_minyak" class="form-control" type="text" value="{{ $pertambangan['jenis_minyak'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lokasi" class="form-control-label">Lokasi</label>
                                        <input id="lokasi" name="lokasi" class="form-control" type="text" value="{{ $pertambangan['lokasi'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="volume" class="form-control-label">Volume</label>
                                        <input id="volume" name="volume" class="form-control" type="text" value="{{ $pertambangan['volume'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-gradient-warning">Update</button>
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
