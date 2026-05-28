<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-download" style="color:#4dd9ac;margin-right:8px;"></i> Tambah Barang Masuk</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form class="form-horizontal form-label-left" novalidate action="<?= base_url('Home/aksi_simpanbm')?>" method="post">

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang <span class="required">*</span></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <select class="form-control" name="name" required="required">
              <option value="">-- Pilih Barang --</option>
              <?php foreach ($okta as $key) { ?>
              <option value="<?= $key->id_product ?>"><?= $key->nama_product ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Masuk <span class="required">*</span></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="number" id="Jumlah" name="Jumlah" placeholder="Masukkan jumlah..." required="required" class="form-control" min="1">
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Beli <span class="required">*</span></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div style="position:relative;">
              <span style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#6b7a99;font-size:12px;font-weight:600;">Rp</span>
              <input type="number" id="Harga" name="Harga" placeholder="0" required="required"
                class="form-control" style="padding-left:30px !important;" min="0">
            </div>
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Supplier <span class="required">*</span></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name="nama_supplier" placeholder="Nama supplier..." required="required" class="form-control">
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-9 col-md-offset-3">
            <a href="<?= base_url('/Home/bm')?>" class="btn btn-primary">
              <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button id="send" type="submit" class="btn btn-success" style="margin-left:8px;">
              <i class="fa fa-save"></i> Simpan
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>