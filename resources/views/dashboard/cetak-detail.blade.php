<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laporan Penjualan</title>
</head>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 17px;
        position: relative;
        height:  90vh;
    }
    .form p.title{
        text-align: center;
        font-size: 20px;
        font-weight: 600;
    }
    .form p.total{
        font-weight: 600;
        text-align: right;
    }
    .form table.static{
        font-size: 30px;
        align: center;
        position: relative;
        width: 95%;
        padding-bottom:0.5rem; 
        border-bottom: 1px dashed #543535;
    }

    .form table.static tr.thead{
        background: #858585;
        font-weight: 700;
        border: 3px solid #543535;
    }

    .static tr td {
      font-size: 20px;
      font-weight: 400;
      text-align: center;
    }

    .static tr td p .bold{
      font-weight: 500;
    }

    footer{
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
    }
    footer p {
        text-align: center;
    }
</style>
<body>
    <div class="form">
        <p class="title">Detail Riwayat</p>
        <p>Tanggal : {{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</p>
        <p>Nama : {{ $data->user->name }}</p>
        <table class="static"  align="center">
            <tr class="thead" align="center" style="border-bottom:1px solid black;">
                <td>No</td>
                <td>Barang</td>
                 <td>Harga</td>
                 <td>Jumlah</td>
                 <td>Subtotal</td>
            </tr>
             {{-- @foreach ($data as $d) --}}
            @foreach ($data->history as $c)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $c->product->name }}</td>
            <td>{{ $c->product->harga }}</td>  
            <td>{{ $c->qty }}</td>
            <td>Rp.{{  number_format($c->qty * $c->product->harga) }}</td>      
            </tr>
            @endforeach 

            {{-- @endforeach --}}

        </table>
        <p class="total"> Total Harga: Rp.{{ number_format($data->total) }}</p>
    </div>

    <footer>
        <p align="center">Terimakasih telah berbelanja di kantin kami</p>
    </footer>
</body>
</html>