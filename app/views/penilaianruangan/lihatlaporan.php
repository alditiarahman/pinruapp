<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Penilaian Ruangan</title>

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
        <!-- Header/Kop Surat -->
        <div class="header">
            <!-- Logo -->
            <img src="<?= base_url ?>/dist/img/logo-bawaslu.png" alt="Logo" style="width: 90px; height: auto; float: left; margin-right: 30px;">
            <!-- Informasi Organisasi -->
            <div style="float: left;">
                <h2 style="margin: 0; font-size: 18px;"><b>Badan Pengawas Pemilihan Umum Provinsi Kalimantan Selatan</b></h2>
                <p style="margin: 5px 0;">Jl. RE Martadinata No.3, Kertak Baru Ilir, Kec. Banjarmasin Tengah,</p>
                <p style="margin: 5px 0;">Kota Banjarmasin, Kalimantan Selatan 70231</p>
                <p style="margin: 5px 0;">Telepon: (0511) 6726 437 | Email: set.kalsel@gmail.go.id</p>
            </div>
            <!-- Clearfix untuk mengatasi float -->
            <div style="clear: both;"></div>
            <br>
            <hr style="border-top: 3px solid black; margin-top: 10px; margin-bottom: 10px;">
        </div>

        <h1 style="text-align: center;">LAPORAN PENILAIAN</h1>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama Ruangan</th>
                    <th>Peminjam</th>
                    <th>Kebersihan</th>
                    <th>Kondisi Fasilitas</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['penilaian_ruangan'] as $row) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['nama_ruangan']; ?></td>
                        <td><?= $row['nama_peminjam']; ?></td>
                        <td><?= $row['kebersihan']; ?></td>
                        <td><?= $row['kondisi_fasilitas']; ?></td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
        <div style="margin-top: 20px;">
            <div style="float: right; width: 25%;">
                <p>
                    Banjarmasin,
                    <br>Mengetahui
                </p>
                <br>
                <br>
                <p>
                    <b><u>Aries Mardiono, M.Sos</u></b>
                </p>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        window.print();
        //window.onafterprint = window.close;
    </script>
</body>

</html>