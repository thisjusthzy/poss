<?php
if (!function_exists('format_indo')) {
    function format_indo($date) {
        if (!$date) return '-';
        $months = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $timestamp = strtotime($date);
        $d = date('d', $timestamp);
        $m = $months[(int)date('m', $timestamp)];
        $y = date('Y', $timestamp);
        return "$d $m $y";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Laporan Barang Masuk</title>
  <style>
    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      font-size: 11px;
      color: #333;
      margin: 0;
      padding: 0;
      line-height: 1.4;
    }
    .header-container {
      text-align: center;
      margin-bottom: 15px;
    }
    .header-image {
      width: 100%;
      max-height: 100px;
      object-fit: contain;
    }
    .title-section {
      text-align: center;
      margin-bottom: 20px;
      border-top: 2px solid #1a2234;
      padding-top: 15px;
    }
    .title-section h2 {
      margin: 0 0 5px 0;
      font-size: 18px;
      color: #1a2234;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-weight: 700;
    }
    .title-section p {
      margin: 0;
      font-size: 11px;
      color: #555;
    }
    .data-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    .data-table th {
      background-color: #1a2234;
      color: #ffffff;
      font-weight: bold;
      padding: 8px 6px;
      font-size: 10px;
      text-transform: uppercase;
      border: 1px solid #1a2234;
    }
    .data-table td {
      padding: 7px 6px;
      border: 1px solid #e2e8f0;
      font-size: 10px;
    }
    .data-table tr:nth-child(even) {
      background-color: #f8fafc;
    }
    .text-center {
      text-align: center;
    }
    .text-left {
      text-align: left;
    }
    .text-right {
      text-align: right;
    }
    .font-bold {
      font-weight: bold;
    }
    .total-row {
      background-color: #f1f5f9 !important;
      font-weight: bold;
    }
    .total-row td {
      border-top: 1.5px solid #1a2234;
      border-bottom: 2px double #1a2234;
      font-weight: bold;
    }
    .signature-container {
      margin-top: 35px;
      width: 100%;
      page-break-inside: avoid;
    }
    .signature-table {
      width: 100%;
      border-collapse: collapse;
      border: none;
    }
    .signature-table td {
      border: none;
      padding: 0;
    }
  </style>
</head>
<body>

  <div class="title-section">
    <h2>Laporan Barang Masuk</h2>
    <p>Periode Laporan: <?= format_indo($awal) ?> s/d <?= format_indo($akhir) ?></p>
  </div>

  <table class="data-table">
    <thead>
      <tr>
        <th style="width: 5%;">No</th>
        <th class="text-left" style="width: 45%;">Nama Barang</th>
        <th style="width: 15%;">Jumlah Masuk</th>
        <th class="text-right" style="width: 15%;">Harga Beli</th>
        <th class="text-left" style="width: 20%;">Nama Supplier</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $total_jumlah = 0;
      foreach ($okta as $gas) {
          $total_jumlah += $gas->jumlah_productmasuk;
      ?>
        <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td class="text-left"><?= esc($gas->nama_product) ?></td>
          <td class="text-center"><?= $gas->jumlah_productmasuk ?></td>
          <td class="text-right">Rp <?= number_format($gas->harga, 0, ',', '.') ?></td>
          <td class="text-left"><?= esc($gas->nama_supplier) ?></td>
        </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr class="total-row">
        <td colspan="2" class="text-right">Total Barang Masuk:</td>
        <td class="text-center"><?= $total_jumlah ?></td>
        <td colspan="2"></td>
      </tr>
    </tfoot>
  </table>

  <div class="signature-container">
    <table class="signature-table">
      <tr>
        <td style="width: 65%;"></td>
        <td style="width: 35%; text-align: center;">
          <p style="margin: 0 0 50px 0; font-size: 11px;">Batam, <?= format_indo(date('Y-m-d')) ?><br>Mengetahui,</p>
          <p style="text-decoration: underline; font-weight: bold; margin: 0 0 2px 0; font-size: 11px;"><?= esc(session()->get('username') ?? 'Kasir') ?></p>
          <p style="margin: 0; font-size: 9px; color: #777; text-transform: uppercase; letter-spacing: 0.5px;">Petugas Kasir / Admin</p>
        </td>
      </tr>
    </table>
  </div>

</body>
</html>