{{-- @extends('backend.v_layouts.app')

@section('content')
<h1>Daftar Stok Barang</h1>
<a href="{{ route('stok-barang.form') }}" class="btn btn-primary mb-3">Tambah Stok Barang</a>
<table class="table mt-3">
    <tr>
        <th>ID</th>
        <th>Kode Barang</th>
        <th>Tanggal Masuk</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    @foreach ($stokBarang as $stok)
    <tr>
        <td>{{ $stok->id }}</td>
        <td>{{ $stok->kode_barang }}</td>
        <td>{{ $stok->tanggal_masuk }}</td>
        <td>{{ $stok->stok }}</td>
        <td>
            <a href="{{ route('stok-barang.edit', $stok->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('stok-barang.hapus', $stok->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
 --}}


@extends('backend.v_layouts.app')
@section('content')
    <!-- contentAwal -->
    <div class="row">
        <div class="col-12">
            <a href="{{ route('stok-barang.form') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Stok Barang</a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Stok Barang</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Barang</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stokBarang as $stok)
                                    <tr>
                                        <td>{{ $stok->id }}</td>
                                        <td>{{ $stok->kode_barang }}</td>
                                        <td>{{ $stok->tanggal_masuk }}</td>
                                        <td>{{ $stok->stok }}</td>
                                        <td>
                                            <a href="{{ route('stok-barang.edit', $stok->id) }}"
                                                class="btn btn-cyan btn-sm"><i
                                                        class="far fa-edit"></i> Edit</a>
                                            <form action="{{ route('stok-barang.hapus', $stok->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contentAkhir -->
@endsection
