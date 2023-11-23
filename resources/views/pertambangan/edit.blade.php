@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Pertambangan'])
    <div class="container-fluid py-4">
        <form action="{{ route('pertambangan.update', $pertambangan->id) }}" method="post">
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
                                        <label id="user_id" for="example-text-input" class="form-control-label">Nama Minyak</label>
                                        {{-- <select id="user_id" name="user_id" class="form-select" aria-label="Default select example">
                                            <option value="{{ $pertambangan->user_id }}" selected disabled>{{ $pertambangan->user->nama_lengkap }}</option>
                                        </select> --}}
                                        <input id="user_id" class="form-control" type="text" value="{{ $pertambangan->user->nama_lengkap }}" disabled>
                                        <input name="user_id" class="form-control" type="hidden" value="{{ $pertambangan->user_id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="status" for="example-text-input" class="form-control-label">Jenis Minyak</label>
                                        <select id="status" name="status" class="form-select" aria-label="Default select example">
                                            <option value="{{ $pertambangan->status == 'sehat'? 'sehat':'sakit' }}" selected>{{ $pertambangan->status == 'sehat'? 'Sehat':'Sakit' }}</option>
                                            <option value="{{ $pertambangan->status == 'sehat'? 'sakit':'sehat' }}">{{ $pertambangan->status == 'sehat'? 'Sakit':'Sehat' }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="keterangan" class="form-control-label">Lokasi</label>
                                        <input id="keterangan" name="keterangan" class="form-control" type="text" value="{{ $pertambangan->keterangan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="keterangan" class="form-control-label">Volume</label>
                                        <input id="keterangan" name="keterangan" class="form-control" type="text" value="{{ $pertambangan->keterangan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="keterangan" class="form-control-label">Keterangan</label>
                                        <input id="keterangan" name="keterangan" class="form-control" type="text" value="{{ $pertambangan->keterangan }}">
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