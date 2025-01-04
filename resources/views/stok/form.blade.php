{{-- @extends('backend.v_layouts.app')

@section('content')
<h1>Tambah Stok Barang</h1>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


<form action="{{ route('stok-barang.simpan') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="kode_barang">Kode Barang</label>
        <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ old('kode_barang') }}" required>
        @error('kode_barang')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}" required min="0">
        @error('stok')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="tanggal_masuk">Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk') }}" required>
        @error('tanggal_masuk')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection --}}



@Extends('backend.v_Layouts.App')
@section('content')
    <!-- contentAwal -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('stok-barang.simpan') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title"> Tambah Stok Barang </h4>

                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input type="text" name="kode_barang" 
                                            class="form-control @error('kode_barang') is-invalid @enderror"
                                            placeholder="Masukkan kode_barang">
                                        @error('kode_barang')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" name="stok" 
                                            class="form-control @error('stok') is-invalid @enderror"
                                            placeholder="Masukkan stok">
                                        @error('stok')
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
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('stok-barang.daftar')  }}">
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

