<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Ganti Profil</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
         <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    	<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?= base_url('/home/aksi_ganti_profil')?>">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto Profil Baru 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-contrsol col-md-3 col-xs-12" type="file" name="foto">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama Karyawan<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" required="required" placeholder="Nama" value="<?= $karkar->nama ?>">
          </div>
        </div>
        <div class="item form-group">
        	<label class="control-label col-md-3 col-sm-3 col-xs-12" >Jenis Kelamin <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="jk" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
              <option value="<?= $karkar->JK?>">Pilih</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" >NIK <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nik" name="nik" placeholder="NIK" required="required" class="form-control col-md-7 col-xs-12" value="<?= $karkar->NIK?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Username<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="username" name="username" placeholder="Username" required="required" class="form-control col-md-7 col-xs-12" value="<?= $use->username?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <button id="send" type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>


      
    </div>
  </div>
</div>
