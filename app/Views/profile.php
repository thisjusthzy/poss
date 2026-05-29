<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
  <div class="x_panel" style="border-radius:16px; box-shadow: 0 10px 30px rgba(0,0,0,0.07); border: 1px solid #eef0f5; overflow: hidden; background: #fff; margin-top: 20px;">
    
    <div style="background: linear-gradient(135deg, #1a2234 0%, #2c3b59 100%); padding: 40px 30px; text-align: center; color: #fff; position: relative;">
      <!-- Profile Header Visual -->
      <div style="width: 100px; height: 100px; border-radius: 50%; background: #e8f5f1; border: 4px solid rgba(255,255,255,0.25); margin: 0 auto 15px auto; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
        <i class="fa fa-user" style="font-size: 50px; color: #1a2234;"></i>
      </div>
      <h3 style="margin: 0; font-weight: 700; font-size: 22px; letter-spacing: 0.5px;"><?= esc($yu->NAMA ?? 'Kasir / Pengguna') ?></h3>
      
      <?php
        $lvl = session()->get('level');
        $level_label = $lvl == 1 ? 'Administrator' : ($lvl == 4 ? 'Manager' : 'Staff Kasir');
        $level_color = $lvl == 1 ? '#f5365c' : ($lvl == 4 ? '#3b82f6' : '#2eb88a');
        $level_bg = $lvl == 1 ? '#fee2e2' : ($lvl == 4 ? '#dbeafe' : '#e8f5f1');
      ?>
      <span style="display: inline-block; background: <?= $level_bg ?>; color: <?= $level_color ?>; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-top: 10px; letter-spacing: 0.5px;">
        <?= $level_label ?>
      </span>
    </div>
    
    <div class="x_content" style="padding: 40px 50px 30px 50px !important;">
      
      <div class="row">
        <!-- Left details column -->
        <div class="col-md-6 col-sm-12" style="margin-bottom: 24px;">
          <div style="margin-bottom: 20px;">
            <label style="font-size: 11px; text-transform: uppercase; color: #a0aec0; letter-spacing: 1px; font-weight: bold; display: block; margin-bottom: 6px;">NIP / NIK</label>
            <span style="font-size: 15px; font-weight: 600; color: #2d3748; display: block; background: #f8fafc; padding: 10px 14px; border-radius: 8px; border: 1px solid #edf2f7;">
              <i class="fa fa-id-card-o" style="color: #6b7a99; margin-right: 8px;"></i>
              <?= esc($yu->NIP ?? '-') ?>
            </span>
          </div>
          
          <div style="margin-bottom: 20px;">
            <label style="font-size: 11px; text-transform: uppercase; color: #a0aec0; letter-spacing: 1px; font-weight: bold; display: block; margin-bottom: 6px;">Username</label>
            <span style="font-size: 15px; font-weight: 600; color: #2d3748; display: block; background: #f8fafc; padding: 10px 14px; border-radius: 8px; border: 1px solid #edf2f7;">
              <i class="fa fa-at" style="color: #6b7a99; margin-right: 8px;"></i>
              <?= esc($okta->username ?? '-') ?>
            </span>
          </div>
        </div>

        <!-- Right details column -->
        <div class="col-md-6 col-sm-12" style="margin-bottom: 24px;">
          <div style="margin-bottom: 20px;">
            <label style="font-size: 11px; text-transform: uppercase; color: #a0aec0; letter-spacing: 1px; font-weight: bold; display: block; margin-bottom: 6px;">Jenis Kelamin</label>
            <span style="font-size: 15px; font-weight: 600; color: #2d3748; display: block; background: #f8fafc; padding: 10px 14px; border-radius: 8px; border: 1px solid #edf2f7;">
              <i class="fa fa-transgender" style="color: #6b7a99; margin-right: 8px;"></i>
              <?= (isset($yu->Jenis_kelamin) && $yu->Jenis_kelamin == 'L') ? 'Laki-laki' : ((isset($yu->Jenis_kelamin) && $yu->Jenis_kelamin == 'P') ? 'Perempuan' : '-') ?>
            </span>
          </div>
          
          <div style="margin-bottom: 20px;">
            <label style="font-size: 11px; text-transform: uppercase; color: #a0aec0; letter-spacing: 1px; font-weight: bold; display: block; margin-bottom: 6px;">Alamat Tempat Tinggal</label>
            <span style="font-size: 15px; font-weight: 600; color: #2d3748; display: block; background: #f8fafc; padding: 10px 14px; border-radius: 8px; border: 1px solid #edf2f7; min-height: 44px;">
              <i class="fa fa-map-marker" style="color: #6b7a99; margin-right: 8px;"></i>
              <?= esc($yu->alamat ?? '-') ?>
            </span>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
