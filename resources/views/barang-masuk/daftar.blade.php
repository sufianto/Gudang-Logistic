{{-- @extends('backend.v_layouts.app')

@section('content')
<h1>Daftar Barang Masuk</h1>
<a href="{{ route('barang-masuk.form') }}" class="btn btn-primary">Tambah Barang Masuk</a>
<table class="table">
    <thead>
        <tr>
            <th>Kode Barang</th>
            <th>Quantity</th>
            <th>Origin</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barangMasuk as $barang)
        <tr>
            <td>{{ $barang->kode_barang }}</td>
            <td>{{ $barang->quantity }}</td>
            <td>{{ $barang->origin }}</td>
            <td>{{ $barang->tanggal_masuk }}</td>
            <td>
                <a href="{{ route('barang-masuk.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('barang-masuk.delete', $barang->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection --}}




@extends('backend.v_layouts.app')
@section('content')
    <!-- contentAwal -->
    <div class="row">
        <div class="col-12">
            <a href="{{ route('barang-masuk.form') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Barang Masuk</a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Daftar Barang Masu</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Barang</th>
                                    <th>Quantity</th>
                                    <th>Origin</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangMasuk as $barang)
                                    <tr>
                                        <td>{{ $barang->id }}</td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->quantity }}</td>
                                        <td>{{ $barang->origin }}</td>
                                        <td>{{ $barang->tanggal_masuk }}</td>
                                        <td>
                                            <a href="{{ route('barang-masuk.edit', $barang->id) }}"
                                                class="btn btn-cyan btn-sm"><i
                                                class="far fa-edit"></i> Edit</a>
                                            <form action="{{ route('barang-masuk.delete', $barang->id) }}" method="POST"
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
