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
    }
    .form p{
        text-align: center;
        font-size: 20px;
        font-weight: 600;
    }

    .form table.static{
        font-size: 17px;
        align: center;
        position: relative;
        width: 95%;
        border: 1px solid #543535;
    }

    .form table.static .thead{
        background: #bbb;
    }

    .static tr td p {
      font-size: 13px;
      font-weight: 400;
      text-align: left;
    }

    .static tr td p .bold{
      /* font-size: 13px; */
      font-weight: 500;
      /* text-align: left; */
    }
</style>
<body>
    <div class="form">
        <p>Laporan Penjualan</p>
        <table class="static" rules="all" border="1px" align="center">
            <tr class="thead" align="center">
                <td>No</td>
                <td>Waktu Pembelian</td>
                 <td>Email pembeli</td>
                 <td>Total Harga</td>
                 <td>Detail</td>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $d->created_at }}</td>
                <td>{{ $d->email }}</td>
                <td>Rp.{{ number_format($d->total) }}</td>
                <td>@foreach ($d->history as $c)
                    <p>Produk: <span class="bold">{{ $c->product->name }}</span> | Harga:  <span class="bold">Rp. {{ number_format($c->product->harga) }}</span>  | Qty: <span class="bold">{{ $c->qty }}</span> | Subtotal: <span class="bold">{{ number_format($c->qty * $c->product->harga) }}</span></p>
                @endforeach</td>
            </tr>
            @endforeach

        </table>
    </div>

    {{-- <script type="text/javascript">
    window.print();
    </script> --}}
</body>
</html>