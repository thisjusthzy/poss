<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-arrow-circle-down" style="color:#4dd9ac;margin-right:8px;"></i> Barang Masuk</h2>
      <div class="pull-right" style="margin-top:-4px;">
        <a href="<?php echo base_url('/Home/ppm/')?>" class="btn btn-success">
          <i class="fa fa-plus"></i> Tambah Barang Masuk
        </a>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah Masuk</th>
            <th>Harga Beli</th>
            <th>Tanggal</th>
            <th style="text-align:center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($okta as $key) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><strong><?php echo $key->nama_product?></strong></td>
            <td>
              <span style="background:#e8f5f1;color:#2eb88a;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:600;">
                <?php echo $key->jumlah_productmasuk ?> unit
              </span>
            </td>
            <td style="color:#2eb88a;font-weight:600;">
              Rp <?php echo number_format($key->harga, 0, ',', '.') ?>
            </td>
            <td>
              <span style="color:#6b7a99;font-size:12px;">
                <i class="fa fa-calendar" style="margin-right:4px;"></i>
                <?php echo $key->tanggal?>
              </span>
            </td>
            <td style="text-align:center;">
              <a href="<?= base_url('/Home/clear_pm/'.$key->id_barangmasuk)?>" class="btn btn-danger btn-sm"
                 onclick="return confirm('Yakin hapus data ini?')">
                <i class="fa fa-trash"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>