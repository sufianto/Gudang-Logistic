{{-- @extends('backend.v_layouts.app')

@section('content')
    <h1>Pencatatan Barang Masuk</h1>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('barang-masuk.simpan') }}" method="POST">

        @csrf
        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <select name="kode_barang" class="form-control" required>
                <option value="" disabled selected>Pilih Kode Barang</option>
                @foreach ($stokBarangs as $stok)
                    <option value="{{ $stok->kode_barang }}">{{ $stok->kode_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
        <label>Kode Barang</label>
        <input type="text" name="kode_barang" class="form-control" required>
    </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Origin</label>
            <input type="text" name="origin" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" required>
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
                    <form class="form-horizontal" action="{{ route('barang-masuk.simpan') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title"> Pencatatan Barang Masuk </h4>

                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <select name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror">

                                          @foreach ($stokBarangs as $stok)
                                          <option value="{{ $stok->kode_barang }}">{{ $stok->kode_barang }}</option>
                                      @endforeach
                                        </select>
                                        @error('kode_barang')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" 
                                            class="form-control @error('quantity') is-invalid @enderror"
                                            placeholder="Masukkan quantity">
                                        @error('quantity')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Origin</label>
                                        <input type="text" name="origin" 
                                            class="form-control @error('origin') is-invalid @enderror"
                                            placeholder="Masukkan origin">
                                        @error('origin')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" name="tanggal_masuk" 
                                            class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                            placeholder="Masukkan tanggal_masuk">
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
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('barang-masuk.daftar')  }}">
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


