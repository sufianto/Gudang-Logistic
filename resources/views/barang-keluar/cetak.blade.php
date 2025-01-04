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
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Quantity</th>
                <th>Destination</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cetak as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->kode_barang }}</td>
                    <td>{{ $row->quantity }}</td>
                    <td>{{ $row->destination }}</td>
                    <td>{{ $row->tanggal_keluar }}</td>
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