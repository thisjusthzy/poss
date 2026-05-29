<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-money" style="color:#4dd9ac;margin-right:8px;"></i> Atur Harga Barang</h2>
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
            <th>Harga Beli (Default)</th>
            <th>Harga Jual (Default)</th>
            <th style="text-align:center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($okta as $key) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><strong><?php echo esc($key->nama_product) ?></strong></td>
            <td>
              <span style="background:#f3f4f6;color:#4b5563;padding:3px 8px;border-radius:6px;font-size:11px;font-family:monospace;">
                <?php echo esc($key->kode_product) ?>
              </span>
            </td>
            <td>
              <span style="color:#3498db;font-weight:600;">
                Rp <?php echo number_format($key->harga_beli, 0, ',', '.') ?>
              </span>
            </td>
            <td>
              <span style="color:#2eb88a;font-weight:600;">
                Rp <?php echo number_format($key->harga_product, 0, ',', '.') ?>
              </span>
            </td>
            <td style="text-align:center;">
              <button class="btn btn-info btn-sm btn-edit-harga" 
                      data-id="<?= $key->id_product ?>" 
                      data-nama="<?= esc($key->nama_product) ?>"
                      data-beli="<?= $key->harga_beli ?>"
                      data-jual="<?= $key->harga_product ?>"
                      data-toggle="modal" 
                      data-target="#editHargaModal">
                <i class="fa fa-money"></i> Atur Harga
              </button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Edit Harga -->
<div class="modal fade" id="editHargaModal" tabindex="-1" role="dialog" aria-labelledby="editHargaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:12px; overflow:hidden;">
      <div class="modal-header" style="background:#1a2234; color:#fff; padding:15px 20px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:0.8;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editHargaModalLabel" style="font-weight:600; display:flex; align-items:center; gap:8px;">
          <i class="fa fa-edit" style="color:#4dd9ac;"></i> Atur Harga Barang
        </h4>
      </div>
      <form class="form-horizontal form-label-left" action="<?= base_url('Home/aksi_edit_harga')?>" method="post">
        <input type="hidden" name="id_product" id="modal_id_product">
        <div class="modal-body" style="padding:24px 20px;">
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Nama Barang</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="modal_nama_product" class="form-control" style="border-radius:8px;" readonly disabled>
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
                <input type="number" id="modal_harga_jual" name="harga_jual" placeholder="0" required="required" class="form-control" style="padding-left:30px !important; border-radius:8px;" min="0">
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer" style="background:#f9fafc; border-top:1px solid #eef0f5; padding:15px 20px;">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Wait for jQuery / Bootstrap modal components to bind (event delegation or regular trigger)
    $(document).on('click', '.btn-edit-harga', function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var beli = $(this).data('beli');
        var jual = $(this).data('jual');
        
        $('#modal_id_product').val(id);
        $('#modal_nama_product').val(nama);
        $('#modal_harga_beli').val(beli);
        $('#modal_harga_jual').val(jual);
    });
});
</script>
