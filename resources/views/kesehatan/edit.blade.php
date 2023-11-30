@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kesehatan'])
    <div class="container-fluid py-4">
        <form action="{{ route('kesehatan.update', $kesehatan['id_kesehatan']) }}" method="post">
            @csrf
            @method('patch')
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
                                        <label id="user_id" for="example-text-input" class="form-control-label">Nama Karyawan</label>
                                        <input id="user_id" class="form-control" type="text" value="{{ $kesehatan['nama_lengkap'] }}" disabled>
                                        <input name="user_id" class="form-control" type="hidden" value="{{ $kesehatan['id_kesehatan'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="status" for="example-text-input" class="form-control-label">Status Kesehatan</label>
                                        <select id="status" name="status" class="form-select" aria-label="Default select example">
                                            <option value="{{ $kesehatan['status_kesehatan'] == 'Sehat'? 'Sehat':'Sakit' }}" selected>{{ $kesehatan['status_kesehatan'] == 'Sehat'? 'Sehat':'Sakit' }}</option>
                                            <option value="{{ $kesehatan['status_kesehatan'] == 'Sehat'? 'Sakit':'Sehat' }}">{{ $kesehatan['status_kesehatan'] == 'Sehat'? 'Sakit':'Sehat' }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="keterangan" class="form-control-label">Keterangan</label>
                                        <input id="keterangan" name="keterangan" class="form-control" type="text" value="{{ $kesehatan['keterangan'] }}">
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
