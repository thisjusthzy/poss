<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-arrow-circle-down" style="color:#4dd9ac;margin-right:8px;"></i> Barang Masuk</h2>
      <div class="pull-right" style="margin-top:-4px;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
          <i class="fa fa-plus"></i> Tambah Barang Masuk
        </button>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert" style="border-radius: 8px;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <i class="fa fa-check-circle" style="margin-right: 6px;"></i> <?= session()->getFlashdata('success') ?>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert" style="border-radius: 8px;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <i class="fa fa-exclamation-triangle" style="margin-right: 6px;"></i> <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <table id="datatable-buttons" class="table table-striped table-bordered" style="width: 100%;">
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

<!-- Modal Tambah Barang Masuk -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:12px; overflow:hidden;">
      <div class="modal-header" style="background:#1a2234; color:#fff; padding:15px 20px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:0.8;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addModalLabel" style="font-weight:600; display:flex; align-items:center; gap:8px;">
          <i class="fa fa-download" style="color:#4dd9ac;"></i> Tambah Barang Masuk
        </h4>
      </div>
      <form class="form-horizontal form-label-left" novalidate action="<?= base_url('Home/aksi_simpanbm')?>" method="post">
        <div class="modal-body" style="padding:24px 20px;">
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Nama Barang <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <select class="form-control" id="product_select" name="name" required="required" style="border-radius:8px;">
                <option value="">-- Pilih Barang --</option>
                <?php if(!empty($products)): foreach ($products as $key) { ?>
                <option value="<?= $key->id_product ?>" data-harga-beli="<?= $key->harga_beli ?? 0 ?>"><?= esc($key->nama_product) ?></option>
                <?php } endif; ?>
              </select>
            </div>
          </div>
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Jumlah Masuk <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="number" id="Jumlah" name="Jumlah" placeholder="Masukkan jumlah..." required="required" class="form-control" min="1" style="border-radius:8px;">
            </div>
          </div>
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Harga Beli <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div style="position:relative;">
                <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#6b7a99; font-size:12px; font-weight:600;">Rp</span>
                <input type="number" id="Harga" name="Harga" placeholder="0" required="required" class="form-control" style="padding-left:30px !important; border-radius:8px;" min="0">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Nama Supplier <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" name="nama_supplier" placeholder="Nama supplier..." required="required" class="form-control" style="border-radius:8px;">
            </div>
          </div>

        </div>
        <div class="modal-footer" style="background:#f9fafc; border-top:1px solid #eef0f5; padding:15px 20px;">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
          <button id="send" type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var productSelect = document.getElementById('product_select');
    if (productSelect) {
        productSelect.addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var hargaBeli = selectedOption.getAttribute('data-harga-beli');
            var hargaField = document.getElementById('Harga');
            if (hargaField) {
                hargaField.value = hargaBeli ? hargaBeli : '';
            }
        });
    }
});
</script>