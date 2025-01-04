{{-- @extends('backend.v_layouts.app')

@section('content')
<h1>Edit Barang Masuk</h1>
<form action="{{ route('barang-masuk.update', $barangMasuk->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Kode Barang</label>
        <input type="text" name="kode_barang" value="{{ $barangMasuk->kode_barang }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" value="{{ $barangMasuk->quantity }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Origin</label>
        <input type="text" name="origin" value="{{ $barangMasuk->origin }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" value="{{ $barangMasuk->tanggal_masuk }}" class="form-control" required>
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
                    <form action="{{ route('barang-masuk.update', $barangMasuk->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title"> Edit Barang Masuk </h4>
                            {{-- <div class="row"> --}}
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                         <input type="text" name="kode_barang" value="{{ $barangMasuk->kode_barang }}" class="form-control @error('kode_barang') is-invalid @enderror" placeholder="Masukkan kode_barang" >
                                        @error('kode_barang')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" value="{{ $barangMasuk->quantity }}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Masukkan quantity">
                                        @error('quantity')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Origin</label>
                                        <input type="text" name="origin" value="{{ $barangMasuk->origin }}" class="form-control 
                                        @error('origin') is-invalid @enderror"
                                            placeholder="Masukkan Nomor origin">
                                        @error('origin')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" name="tanggal_masuk" value="{{ $barangMasuk->tanggal_masuk }}" class="form-control 
                                        @error('tanggal_masuk') is-invalid @enderror"
                                            placeholder="Masukkan Nomor tanggal_masuk">
                                        @error('tanggal_masuk')
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
                                <a href="{{ route('barang-masuk.daftar') }}">
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