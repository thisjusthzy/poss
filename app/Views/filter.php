<?php
$title = 'Laporan';
$icon  = 'fa-chart-bar';
if ($kunci == 'view_b') {
    $title = 'Laporan Barang'; $icon = 'fa-tag';
    $url_excel = base_url('home/excel_b');
    $url_pdf   = base_url('home/pdf_b');
    $url_lihat = base_url('home/cari_b');
} else if ($kunci == 'view_bm') {
    $title = 'Laporan Barang Masuk'; $icon = 'fa-arrow-circle-down';
    $url_excel = base_url('home/excel_bm');
    $url_pdf   = base_url('home/pdf_bm');
    $url_lihat = base_url('home/cari_bm');
} else {
    $title = 'Laporan Penjualan'; $icon = 'fa-shopping-cart';
    $url_excel = base_url('home/excel_p');
    $url_pdf   = base_url('home/pdf_p');
    $url_lihat = base_url('home/cari_p');
}
?>

<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa <?= $icon ?>" style="color:#4dd9ac;margin-right:8px;"></i> <?= $title ?></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <!-- Section: Lihat -->
      <div style="background:#f4f6fb;border-radius:10px;padding:18px 20px;margin-bottom:16px;border:1px solid #eef0f5;">
        <p style="font-size:12px;font-weight:700;color:#6b7a99;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px;">
          <i class="fa fa-search" style="margin-right:6px;color:#4dd9ac;"></i> Tampilkan Data
        </p>
        <form class="form-horizontal form-label-left" action="<?= $url_lihat ?>" method="post">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Awal</label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input name="awal" required="required" type="date" class="form-control">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Akhir</label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="date" name="akhir" required="required" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i> Lihat Laporan
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Section: PDF -->
      <div style="background:#f4f6fb;border-radius:10px;padding:18px 20px;margin-bottom:16px;border:1px solid #eef0f5;">
        <p style="font-size:12px;font-weight:700;color:#6b7a99;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px;">
          <i class="fa fa-file-pdf-o" style="margin-right:6px;color:#f5365c;"></i> Download PDF
        </p>
        <form class="form-horizontal form-label-left" action="<?= $url_pdf ?>" method="post">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Awal</label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input name="awal" required="required" type="date" class="form-control">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Akhir</label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="date" name="akhir" required="required" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
              <button type="submit" class="btn btn-danger">
                <i class="fa fa-file-pdf-o"></i> Download PDF
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Section: Excel -->
      <div style="background:#f4f6fb;border-radius:10px;padding:18px 20px;border:1px solid #eef0f5;">
        <p style="font-size:12px;font-weight:700;color:#6b7a99;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px;">
          <i class="fa fa-file-excel-o" style="margin-right:6px;color:#2eb88a;"></i> Download Excel
        </p>
        <form class="form-horizontal form-label-left" action="<?= $url_excel ?>" method="post">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Awal</label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input name="awal" required="required" type="date" class="form-control">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Akhir</label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="date" name="akhir" required="required" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-file-excel-o"></i> Download Excel
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>