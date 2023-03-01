<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cetak Saran</title>
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
        align: center;
        position: relative;
        width: 95%;
        border: 1px solid #543535;
    }

    .form table.static .thead{
        background: #bbb;
    }
</style>
<body>
    <div class="form">
        <p>Cetak Saran</p>
        <table class="static" rules="all" border="1px" align="center">
            <tr class="thead">
                <td>No</td>
                <td>Pengirim</td>
                <td>Saran</td>
                <td>Tanggal</td>
            </tr>
            @foreach ($saran as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->sender }}</td>
                <td>{{ $s->saran }}</td>
                <td>{{ $s->created_at }}</td>
            </tr>
            @endforeach

        </table>
    </div>

    {{-- <script type="text/javascript">
    window.print();
    </script> --}}
</body>
</html>