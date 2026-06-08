<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-tag" style="color:#4dd9ac;margin-right:8px;"></i> Daftar Barang</h2>
      <div class="pull-right" style="margin-top:-4px;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
          <i class="fa fa-plus"></i> Tambah Barang
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
              <button type="button" class="btn btn-info btn-sm btn-edit-product" 
                      data-id="<?= $key->id_product ?>" 
                      data-name="<?= esc($key->nama_product) ?>"
                      data-stok="<?= $key->stok_product ?>"
                      data-kode="<?= esc($key->kode_product) ?>"
                      data-harga_beli="<?= $key->harga_beli ?>"
                      data-harga="<?= $key->harga_product ?>"
                      data-toggle="modal" 
                      data-target="#editProductModal">
                <i class="fa fa-edit"></i>
              </button>
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

<!-- Modal Tambah Barang -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:12px; overflow:hidden;">
      <div class="modal-header" style="background:#1a2234; color:#fff; padding:15px 20px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:0.8;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addModalLabel" style="font-weight:600; display:flex; align-items:center; gap:8px;">
          <i class="fa fa-plus-circle" style="color:#4dd9ac;"></i> Tambah Barang
        </h4>
      </div>
      <form class="form-horizontal form-label-left" novalidate action="<?= base_url('home/aksi_simpanp')?>" method="post">
        <div class="modal-body" style="padding:24px 20px;">
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Nama Barang <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input id="name" name="name" placeholder="Nama barang..." required="required" type="text" class="form-control" style="border-radius:8px;">
            </div>
          </div>
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Kode Barang <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="kode" name="kode" required="required" placeholder="Kode unik barang..." class="form-control" style="border-radius:8px;">
            </div>
          </div>
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Harga Beli <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div style="position:relative;">
                <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#6b7a99; font-size:12px; font-weight:600;">Rp</span>
                <input type="number" id="harga_beli" name="harga_beli" placeholder="0" required="required" class="form-control" style="padding-left:30px !important; border-radius:8px;" min="0">
              </div>
            </div>
          </div>
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Harga Jual <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div style="position:relative;">
                <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#6b7a99; font-size:12px; font-weight:600;">Rp</span>
                <input type="number" id="harga" name="harga" placeholder="0" required="required" class="form-control" style="padding-left:30px !important; border-radius:8px;" min="0">
              </div>
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

<!-- Modal Edit Barang -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:12px; overflow:hidden;">
      <div class="modal-header" style="background:#1a2234; color:#fff; padding:15px 20px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:0.8;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editProductModalLabel" style="font-weight:600; display:flex; align-items:center; gap:8px;">
          <i class="fa fa-edit" style="color:#4dd9ac;"></i> Edit Barang
        </h4>
      </div>
      <form class="form-horizontal form-label-left" novalidate action="<?= base_url('Home/aksi_editp')?>" method="post">
        <input type="hidden" name="id" id="modal_id_product">
        <div class="modal-body" style="padding:24px 20px;">
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Nama Barang <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input id="modal_name" name="name" placeholder="Nama barang..." required="required" type="text" class="form-control" style="border-radius:8px;">
            </div>
          </div>
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Stok Barang <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="number" id="modal_stok" name="Jumlah" placeholder="0" required="required" class="form-control" style="border-radius:8px;" min="0">
            </div>
          </div>

          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Kode Barang <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="modal_kode" name="kode" required="required" placeholder="Kode unik barang..." class="form-control" style="border-radius:8px;">
            </div>
          </div>
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Harga Beli <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div style="position:relative;">
                <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#6b7a99; font-size:12px; font-weight:600;">Rp</span>
                <input type="number" id="modal_harga_beli" name="harga_beli" placeholder="0" required="required" class="form-control" style="padding-left:30px !important; border-radius:8px;" min="0">
              </div>
            </div>
          </div>
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Harga Jual <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div style="position:relative;">
                <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#6b7a99; font-size:12px; font-weight:600;">Rp</span>
                <input type="number" id="modal_harga" name="Harga" placeholder="0" required="required" class="form-control" style="padding-left:30px !important; border-radius:8px;" min="0">
              </div>
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
    $(document).on('click', '.btn-edit-product', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var stok = $(this).data('stok');
        var kode = $(this).data('kode');
        var harga_beli = $(this).data('harga_beli');
        var harga = $(this).data('harga');
        
        $('#modal_id_product').val(id);
        $('#modal_name').val(name);
        $('#modal_stok').val(stok);
        $('#modal_kode').val(kode);
        $('#modal_harga_beli').val(harga_beli);
        $('#modal_harga').val(harga);
    });
});
</script>