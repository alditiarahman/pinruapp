<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Pembatalan Peminjaman</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url; ?>/dist/img/logo-bawaslu.png">

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="<?= base_url ?>/dist/js/normalize.min.css">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="<?= base_url ?>/dist/css/paper.css">
    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */
        }
    </style>
    <style>
        body {
            font-family: Calibri, sans-serif;
        }

        .sheet {
            padding: 15mm;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 18px;
            text-decoration: underline;
            margin-top: 20px;
        }

        .table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            font: normal 13px Arial, sans-serif;
            width: 100%;
            margin-top: 20px;
        }

        .table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
        }

        .table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }
    </style>
</head>

<body class="A4 potrait">
    <section class="sheet">
        <!-- Header/Kop Surat -->
        <div class="header">
            <img src="<?= base_url ?>/dist/img/logo-bawaslu-kalsel.png" alt="Logo" style="width: 300px; height: auto;">
            <h2><b>Badan Pengawas Pemilihan Umum Provinsi Kalimantan Selatan</b></h2>
            <p>Jl. RE Martadinata No.3, Kertak Baru Ilir, Kec. Banjarmasin Tengah, Kota Banjarmasin, <br>Kalimantan Selatan 70231</p>
            <p>Telepon: (0511) 6726 437 | Email: set.kalsel@gmail.go.id</p>
        </div>

        <h1 style="text-align: center;">Laporan Pembatalan Peminjaman</h1>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th>ID Peminjaman</th>
                    <th>Petugas</th>
                    <th>Peminjam</th>
                    <th>Tanggal Pembatalan</th>
                    <th>Waktu Pembatalan</th>
                    <th>Alasan Pembatalan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['pembatalan'] as $row) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['id_peminjaman']; ?></td>
                        <td><?= $row['nama_petugas']; ?></td>
                        <td><?= $row['nama_peminjam']; ?></td>
                        <td><?= $row['tanggal_pembatalan']; ?></td>
                        <td><?= $row['waktu_pembatalan']; ?></td>
                        <td><?= $row['alasan_pembatalan']; ?></td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </section>
    <script type="text/javascript">
        window.print();
        //window.onafterprint = window.close;
    </script>
</body>

</html>