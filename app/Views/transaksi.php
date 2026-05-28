<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-shopping-cart" style="color:#4dd9ac;margin-right:8px;"></i> Transaksi Penjualan</h2>
      <div class="pull-right" style="margin-top:-4px;">
        <a href="<?= base_url('/home/t_transaksi/')?>" class="btn btn-success">
          <i class="fa fa-plus"></i> Tambah Transaksi
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
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <?php if(session()->get('level') != 2): ?>
            <th style="text-align:center;">Aksi</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($okta as $key) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><strong><?php echo $key->nama_product?></strong></td>
            <td>
              <span style="background:#e8f5f1;color:#2eb88a;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:600;">
                <?php echo $key->jumlah?> unit
              </span>
            </td>
            <td style="color:#6b7a99;">
              Rp <?php echo number_format($key->harga, 0, ',', '.') ?>
            </td>
            <td style="color:#1a2234;font-weight:600;">
              Rp <?php echo number_format($key->jumlah * $key->harga, 0, ',', '.') ?>
            </td>
            <?php if(session()->get('level') != 2): ?>
            <td style="text-align:center;">
              <a href="<?= base_url('/Home/clear_t/'.$key->id_transaksi)?>" class="btn btn-danger btn-sm"
                 onclick="return confirm('Yakin hapus transaksi ini?')">
                <i class="fa fa-trash"></i>
              </a>
            </td>
            <?php endif; ?>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>