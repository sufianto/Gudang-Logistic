<style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ccc;
    }

    table tr td {
        padding: 6px;
        font-weight: normal;
        border: 1px solid #ccc;
    }

    table th {
        border: 1px solid #ccc;
    }
</style>
<table>
    <tr>
        <td align="left">
            Perihal : {{ $judul }} <br>
            Tanggal Awal: {{ $tanggalAwal }} s/d Tanggal Akhir: {{ $tanggalAkhir }}
        </td>
    </tr>
</table>
<p></p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Stok</th>
            <th>Tanggal Masuk</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cetak as $key => $barang)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->tanggal_masuk }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    window.onload = function() {
        printStruk();
    }

    function printStruk() {
        window.print();
    }
</script>