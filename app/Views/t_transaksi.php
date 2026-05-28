<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Penjualan</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_simpant')?>" method="post">

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Barang <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" required="required">
              <option>Pilih Barang</option>
              <?php foreach ($okta as $gas){ ?>
                <option value="<?= $gas->id_product; ?>"><?= $gas->nama_product; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Jumlah <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="jumlah" name="jumlah" required="required" placeholder="Jumlah" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Harga Barang <span class="required">*</span>
          </label>
         <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="harga" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="harga" required="required">
              <option>Pilih Harga</option>
              <?php foreach ($okta as $gas){ ?>
                <option value="<?= $gas->harga_product; ?>"><?= $gas->harga_product; ?></option>
              <?php } ?>
            </select>
          </div>
       <!--  <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Harga <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="harga" name="harga" placeholder="Harga" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div> -->
        <!-- <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">ID Bill <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="bill" name="bill" placeholder="ID Bill" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div> -->
        
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
          <a href="<?= base_url('/Home/product')?>" class="btn btn-primary">
              <i class="fa fa-arrow-left"></i> Kembali
            </a>
          <button id="send" type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>