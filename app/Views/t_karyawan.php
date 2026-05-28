<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-user-plus" style="color:#4dd9ac;margin-right:8px;"></i> Tambah Karyawan</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form class="form-horizontal form-label-left" novalidate action="<?= base_url('Home/aksi_simpank')?>" method="post">

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP <span class="required">*</span></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="NIP" name="NIP" required="required" placeholder="Nomor Induk Pegawai" class="form-control">
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Username <span class="required">*</span></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="username" name="username" required="required" placeholder="Username untuk login" class="form-control">
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="password" id="password" name="password" required="required" placeholder="Buat password" class="form-control">
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap <span class="required">*</span></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="nama" name="nama" required="required" placeholder="Nama lengkap karyawan" class="form-control">
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin <span class="required">*</span></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <select name="Jenis_kelamin" required="required" class="form-control">
              <option value="">-- Pilih --</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="alamat" name="alamat" required="required" placeholder="Alamat karyawan" class="form-control">
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-9 col-md-offset-3">
            <a href="<?= base_url('/Home/karyawan')?>" class="btn btn-primary">
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