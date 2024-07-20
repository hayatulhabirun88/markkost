<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-container img {
            margin-right: 20px;
        }

        .header {
            text-align: left;
        }

        .header h2 {
            margin: 0;
        }

        .header p {
            margin: 0;
            font-size: 18px;
            color: #555;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 12px;
        }

        thead {
            background-color: #d722c2;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #ddd;
        }

        .table-container {
            overflow-x: auto;
        }

        /* Additional styles for table with ID table_header */
        #table_header {
            border: none;
        }

        #table_header td {
            border: none;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <table id="table_header">
        <tr>
            <td style="width: 60px;"><img style="width: 50px;" src="{{ asset('/') }}logorumah.png" alt="Logo"></td>
            <td>
                <strong style="font-size: 20;">markkost.my.id</strong> <br>Kota Baubau
            </td>
        </tr>
    </table>
    <hr>
    <h1>Laporan Transaksi</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No Booking</th>
                    <th>Nama Penyewa</th>
                    <th>Nama Pemilik</th>
                    <th>Tanggal Kirim</th>
                    <th>Tanggal Terima</th>
                    <th>Status Pembayaran</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @if (auth()->user()->level == 'admin')
                    @foreach ($transaksi as $trans)
                        <tr>
                            <td>BK-{{ $trans->booking->id }}</td>
                            <td>{{ @$trans->booking->user->name }}</td>
                            <td>{{ @$trans->booking->datakost->user->name }}</td>
                            <td>{{ @$trans->tgl_kirim }}</td>
                            <td>{{ @$trans->tgl_terima }}</td>
                            <td>{{ @$trans->status_pembayaran }}</td>
                            <td>{{ @$trans->total }}</td>
                        </tr>
                    @endforeach
                @else
                    @foreach ($transaksi as $trans)
                        @if ($trans->booking->datakost->user->id == auth()->user()->id)
                            <tr>
                                <td>BK-{{ $trans->booking->id }}</td>
                                <td>{{ @$trans->booking->user->name }}</td>
                                <td>{{ @$trans->booking->datakost->user->name }}</td>
                                <td>{{ @$trans->tgl_kirim }}</td>
                                <td>{{ @$trans->tgl_terima }}</td>
                                <td>{{ @$trans->status_pembayaran }}</td>
                                <td>{{ number_format($trans->total, 2, ',', '.') }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
</body>

<script>
    function printOnLoad() {
        window.print();
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        printOnLoad();
    });
</script>

</html>
