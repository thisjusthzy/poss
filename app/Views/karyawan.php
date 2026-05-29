<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-users" style="color:#4dd9ac;margin-right:8px;"></i> Daftar Karyawan</h2>
      <div class="pull-right" style="margin-top:-4px;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addKaryawanModal" style="border-radius: 8px;">
          <i class="fa fa-plus"></i> Tambah Karyawan
        </button>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Username</th>
            <th>Nama Karyawan</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th style="text-align:center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($okta as $key) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $key->NIP?></td>
            <td>
              <span style="background:#e8f5f1;color:#2eb88a;padding:3px 8px;border-radius:20px;font-size:11px;font-weight:600;">
                <?php echo $key->username?>
              </span>
            </td>
            <td><strong><?php echo $key->NAMA?></strong></td>
            <td>
              <?php if($key->Jenis_kelamin == 'L'): ?>
                <span style="background:#e8f0fe;color:#3b82f6;padding:3px 8px;border-radius:20px;font-size:11px;font-weight:600;">
                  <i class="fa fa-male"></i> Laki-laki
                </span>
              <?php else: ?>
                <span style="background:#fce4ec;color:#e91e63;padding:3px 8px;border-radius:20px;font-size:11px;font-weight:600;">
                  <i class="fa fa-female"></i> Perempuan
                </span>
              <?php endif; ?>
            </td>
            <td><?php echo $key->alamat?></td>
            <td style="text-align:center;">
              <a href="<?= base_url('/Home/edit_k/'.$key->id_user)?>" class="btn btn-info btn-sm">
                <i class="fa fa-edit"></i>
              </a>
              <a href="<?= base_url('/Home/clear_k/'.$key->id_user)?>" class="btn btn-danger btn-sm"
                 onclick="return confirm('Yakin hapus karyawan ini?')">
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

<!-- Modal Tambah Karyawan -->
<div class="modal fade" id="addKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="addKaryawanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:12px; overflow:hidden; border:none; box-shadow: 0 8px 30px rgba(0,0,0,0.15);">
      <div class="modal-header" style="background:#1a2234; color:#fff; padding:18px 20px; border-bottom: none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:0.8;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addKaryawanModalLabel" style="font-weight:600; display:flex; align-items:center; gap:8px; margin:0;">
          <i class="fa fa-user-plus" style="color:#4dd9ac;"></i> Tambah Karyawan
        </h4>
      </div>
      <form class="form-horizontal form-label-left" novalidate action="<?= base_url('Home/aksi_simpank')?>" method="post">
        <div class="modal-body" style="padding:24px 20px;">
          
          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600; text-align:left;">NIP <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="NIP" name="NIP" required="required" placeholder="Nomor Induk Pegawai" class="form-control" style="border-radius:8px;">
            </div>
          </div>

          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600; text-align:left;">Username <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="username" name="username" required="required" placeholder="Username untuk login" class="form-control" style="border-radius:8px;">
            </div>
          </div>

          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600; text-align:left;">Password <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="password" id="password" name="password" required="required" placeholder="Buat password" class="form-control" style="border-radius:8px;">
            </div>
          </div>

          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600; text-align:left;">Nama Lengkap <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="nama" name="nama" required="required" placeholder="Nama lengkap karyawan" class="form-control" style="border-radius:8px;">
            </div>
          </div>

          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600; text-align:left;">Jenis Kelamin <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <select name="Jenis_kelamin" required="required" class="form-control" style="border-radius:8px;">
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>

          <div class="form-group" style="margin-bottom: 16px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight:600; text-align:left;">Alamat <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="alamat" name="alamat" required="required" placeholder="Alamat karyawan" class="form-control" style="border-radius:8px;">
            </div>
          </div>

        </div>
        <div class="modal-footer" style="background:#f9fafc; border-top:1px solid #eef0f5; padding:15px 20px;">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:8px; border:1px solid #dcdfe6;">Batal</button>
          <button id="send" type="submit" class="btn btn-success" style="border-radius:8px; padding:6px 20px; font-weight:600; background:#2eb88a; border-color:#2eb88a;">
            <i class="fa fa-save"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>