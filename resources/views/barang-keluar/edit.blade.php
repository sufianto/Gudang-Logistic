{{-- @extends('backend.v_layouts.app')

@section('content')
<h1>Edit Barang Keluar</h1>
<form action="{{ route('barang-keluar.update', $barangKeluar->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Kode Barang</label>
        <input type="text" name="kode_barang" value="{{ $barangKeluar->kode_barang }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" value="{{ $barangKeluar->quantity }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>destination</label>
        <input type="text" name="destination" value="{{ $barangKeluar->destination }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_keluar" value="{{ $barangKeluar->tanggal_keluar }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection --}}

@extends('backend.v_layouts.app')
@section('content')
    <!-- contentAwal -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('barang-keluar.update', $barangKeluar->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title"> Edit Barang Keluar </h4>
                            {{-- <div class="row"> --}}
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                         <input type="text" name="kode_barang" value="{{ $barangKeluar->kode_barang }}" class="form-control @error('kode_barang') is-invalid @enderror" placeholder="Masukkan kode_barang" >
                                        @error('kode_barang')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" value="{{ $barangKeluar->quantity }}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Masukkan quantity">
                                        @error('quantity')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>destination</label>
                                        <input type="text" name="destination" value="{{ $barangKeluar->destination }}" class="form-control 
                                        @error('destination') is-invalid @enderror"
                                            placeholder="Masukkan Nomor destination">
                                        @error('destination')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <input type="date" name="tanggal_keluar" value="{{ $barangKeluar->tanggal_keluar }}" class="form-control 
                                        @error('tanggal_keluar') is-invalid @enderror"
                                            placeholder="Masukkan Nomor tanggal_keluar">
                                        @error('tanggal_keluar')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Perbaharui</button>
                                <a href="{{ route('barang-keluar.daftar') }}">
                                    <button type="button" class="btn btn-secondary">Kembali</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- contentAkhir -->
@endsection

