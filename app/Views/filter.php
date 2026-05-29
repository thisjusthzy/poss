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
  <div class="x_panel" style="border-radius:12px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid #eef0f5;">
    <div class="x_title">
      <h2><i class="fa <?= $icon ?>" style="color:#4dd9ac;margin-right:8px;"></i> <?= $title ?></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content" style="padding: 24px !important;">
      
      <form class="form-horizontal form-label-left" method="post">
        
        <div style="background:#f4f6fb; border-radius:12px; padding: 24px; border:1px solid #eef0f5; margin-bottom: 24px;">
          <p style="font-size:12px; font-weight:700; color:#6b7a99; text-transform:uppercase; letter-spacing:1px; margin-bottom: 18px;">
            <i class="fa fa-calendar-check-o" style="margin-right:6px; color:#4dd9ac;"></i> Filter Rentang Tanggal
          </p>
          
          <div class="item form-group" style="margin-bottom: 20px !important;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: 600; color: #3d4a60; padding-top: 8px;">
              Tanggal Awal
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input name="awal" required="required" type="date" class="form-control" style="border-radius: 8px;">
            </div>
          </div>
          
          <div class="item form-group" style="margin-bottom: 10px !important;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: 600; color: #3d4a60; padding-top: 8px;">
              Tanggal Akhir
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="date" name="akhir" required="required" class="form-control" style="border-radius: 8px;">
            </div>
          </div>
        </div>

        <div class="form-group" style="margin-bottom: 0;">
          <div class="col-md-12 text-center" style="display: flex; justify-content: center; gap: 12px; flex-wrap: wrap; margin-top: 10px;">
            <button type="submit" class="btn btn-primary" formaction="<?= $url_lihat ?>" style="padding: 10px 22px !important; font-size: 13px !important; display: inline-flex; align-items: center; gap: 8px; border-radius: 8px !important;">
              <i class="fa fa-search"></i> Tampilkan Data
            </button>
            <button type="submit" class="btn btn-danger" formaction="<?= $url_pdf ?>" formtarget="_blank" style="padding: 10px 22px !important; font-size: 13px !important; display: inline-flex; align-items: center; gap: 8px; border-radius: 8px !important;">
              <i class="fa fa-file-pdf-o"></i> Download PDF
            </button>
            <button type="submit" class="btn btn-success" formaction="<?= $url_excel ?>" style="padding: 10px 22px !important; font-size: 13px !important; display: inline-flex; align-items: center; gap: 8px; border-radius: 8px !important;">
              <i class="fa fa-file-excel-o"></i> Download Excel
            </button>
          </div>
        </div>

      </form>

    </div>
  </div>
</div>