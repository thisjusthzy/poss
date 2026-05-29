<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel" style="border-radius:12px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid #eef0f5;">
    <div class="x_title">
      <h2><i class="fa fa-user" style="color:#4dd9ac;margin-right:8px;"></i> Profil / Edit Karyawan</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content" style="padding: 24px 20px;">

      <form class="form-horizontal form-label-left" novalidate action="<?= base_url('Home/aksi_editk')?>" method="post">

        <input type="hidden" name="id" value="<?php echo $okta->id_user ?>">

        <div class="item form-group" style="margin-bottom: 16px;">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">NIP / NIK <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="number" id="NIP" name="NIP" required="required" class="form-control" style="border-radius:8px;" value="<?= esc($yu->NIP) ?>">
          </div>
        </div>

        <div class="item form-group" style="margin-bottom: 16px;">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Nama Lengkap <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nama" name="nama" required="required" class="form-control" style="border-radius:8px;" value="<?= esc($yu->NAMA) ?>">
          </div>
        </div>

        <div class="item form-group" style="margin-bottom: 16px;">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Username <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="username" name="username" required="required" class="form-control" style="border-radius:8px;" value="<?= esc($okta->username) ?>">
          </div>
        </div>

        <div class="item form-group" style="margin-bottom: 16px;">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Jenis Kelamin <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="Jenis_kelamin" name="Jenis_kelamin" required="required" class="form-control" style="border-radius:8px;">
              <option value="">-- Pilih Jenis Kelamin --</option>
              <option value="L" <?= ($yu->Jenis_kelamin == 'L') ? 'selected' : '' ?>>Laki-laki</option>
              <option value="P" <?= ($yu->Jenis_kelamin == 'P') ? 'selected' : '' ?>>Perempuan</option>
            </select>
          </div>
        </div>

        <div class="item form-group" style="margin-bottom: 24px;">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600;">Alamat <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea id="alamat" name="alamat" required="required" class="form-control" style="border-radius:8px; min-height: 80px; resize: vertical;"><?= esc($yu->alamat) ?></textarea>
          </div>
        </div>
       
        <div class="ln_solid" style="border-top: 1px solid #eef0f5; margin-top: 24px; margin-bottom: 24px;"></div>
        
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="<?= base_url('/Home/karyawan') ?>" class="btn btn-primary" style="border-radius: 8px; padding: 6px 16px;">Batal</a>
            <button id="send" type="submit" class="btn btn-success" style="border-radius: 8px; padding: 6px 16px;">Simpan Perubahan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>