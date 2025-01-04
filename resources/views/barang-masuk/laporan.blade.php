@extends('backend.v_layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('barang-masuk.cetak') }}" method="post" target="_blank">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">{{ $judul }}</h4>
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" value="{{ old('tanggal_awal') }}" class="form-control @error('tanggal_awal') is-invalid @enderror">
                            @error('tanggal_awal')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" class="form-control @error('tanggal_akhir') is-invalid @enderror">
                            @error('tanggal_akhir')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection