<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi SPPD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .details {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
        $rows = $this->db->get_where("m_pencairan",array('id_agenda'=>@$_REQUEST['id_agenda']))->row_array();
    ?>

    <div class="container">
        <div class="header">
            <div class="title">KWITANSI SPPD</div>
            <div class="info">Nomor: 001/SPD/2023</div>
        </div>

        <div class="details">
            <div>Telah terima dari: <strong>Nama Penerima</strong></div>
            <div>Uang sejumlah: <strong>Rp <?php echo number_format($rows['dana']); ?></strong></div>
            <div>Untuk keperluan: <strong>Perjalanan Dinas</strong></div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Uraian</th>
                    <th>Jumlah (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Biaya Transportasi</td>
                    <td>500,000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Akomodasi</td>
                    <td>300,000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Makan</td>
                    <td>200,000</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            Total: <strong>Rp 1.000.000,00</strong>
        </div>

        <div>Tanda tangan: ____________________________</div>
        <div>Tanggal: 12 Desember 2023</div>
    </div>

</body>
</html>
