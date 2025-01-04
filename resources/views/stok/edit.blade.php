{{-- @extends('backend.v_layouts.app')

@section('content')
    <h1>Edit Stok Barang</h1>
    <form action="{{ route('stok-barang.update', $stokBarang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="form-control"
                value="{{ old('kode_barang', $stokBarang->kode_barang) }}" required>
            @error('kode_barang')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control"
                value="{{ old('stok', $stokBarang->stok) }}" required min="0">
            @error('stok')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
        <label for="tanggal_masuk">Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $stokBarang->tanggal_masuk) }}" required>
        @error('tanggal_masuk')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
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
                    <form action="{{ route('stok-barang.update', $stokBarang->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title"> Edit Stok Barang </h4>
                            {{-- <div class="row"> --}}
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" name="kode_barang" id="kode_barang"
                                    value="{{ old('kode_barang', $stokBarang->kode_barang) }}"
                                    class="form-control @error('kode_barang') is-invalid @enderror"
                                    placeholder="Masukkan kode_barang" >
                                @error('kode_barang')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="stok" value="{{ old('stok', $stokBarang->stok) }}"
                                    class="form-control @error('stok') is-invalid @enderror"
                                    placeholder="Masukkan stok">
                                @error('stok
                                    stok')
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
                    <a href="{{ route('stok-barang.daftar') }}">
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
