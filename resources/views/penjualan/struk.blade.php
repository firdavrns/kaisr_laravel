<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>
</head>

<body>
    @php
        $total = 0;
    @endphp
    <h1 style="text-align: center">Struk Penjualan (Nomor Nota: {{ $nomor_nota }})</h1>
    <a href="{{ route('penjualan.index') }}" style="text-align: center; display: block">kembali ke penjualan</a>
    <table border="1" align="center">
        <thead>
            <tr>
                <td>No</td>
                <td>Produk</td>
                <td>Harga</td>
                <td>Jumlah</td>
                <td>Subtotal</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_struk as $item)
                @php
                    $total += (float) $item->subtotal;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->harga_produk }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total</td>
                <td>{{ $total }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
