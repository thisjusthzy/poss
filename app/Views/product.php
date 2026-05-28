<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-tag" style="color:#4dd9ac;margin-right:8px;"></i> Daftar Barang</h2>
      <div class="pull-right" style="margin-top:-4px;">
        <a href="<?= base_url('/Home/tambah_p/')?>" class="btn btn-success">
          <i class="fa fa-plus"></i> Tambah Barang
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
            <th>Kode Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th style="text-align:center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($okta as $key) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><strong><?php echo $key->nama_product ?></strong></td>
            <td>
              <span style="background:#f3f4f6;color:#4b5563;padding:3px 8px;border-radius:6px;font-size:11px;font-family:monospace;">
                <?php echo $key->kode_product ?>
              </span>
            </td>
            <td>
              <span style="color:#2eb88a;font-weight:600;">
                Rp <?php echo number_format($key->harga_product, 0, ',', '.') ?>
              </span>
            </td>
            <td>
              <?php
                $stok = $key->stok_product;
                $color = $stok > 10 ? '#2eb88a' : ($stok > 0 ? '#f59e0b' : '#f5365c');
                $bg = $stok > 10 ? '#e8f5f1' : ($stok > 0 ? '#fef3c7' : '#fee2e2');
              ?>
              <span style="background:<?= $bg ?>;color:<?= $color ?>;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;">
                <?php echo $stok ?> unit
              </span>
            </td>
            <td style="text-align:center;">
              <a href="<?= base_url('/Home/edit_p/'.$key->id_product)?>" class="btn btn-info btn-sm">
                <i class="fa fa-edit"></i>
              </a>
              <a href="<?= base_url('/Home/clear_p/'.$key->id_product)?>" class="btn btn-danger btn-sm"
                 onclick="return confirm('Yakin hapus barang ini?')">
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