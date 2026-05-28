<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-users" style="color:#4dd9ac;margin-right:8px;"></i> Daftar Karyawan</h2>
      <div class="pull-right" style="margin-top:-4px;">
        <a href="<?php echo base_url('/Home/tk/')?>" class="btn btn-success">
          <i class="fa fa-plus"></i> Tambah Karyawan
        </a>
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
              <a href="<?= base_url('/Home/edit_k/'.$key->id_karyawan)?>" class="btn btn-info btn-sm">
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