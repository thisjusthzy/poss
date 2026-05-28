<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Karyawan</h2>
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
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate action="<?= base_url('Home/aksi_editk')?>"method="post">

                      <input type="hidden" name="id" value="<?php echo $okta->id_user?>" >
                      <!-- <input type="hidden" name="id2" value="<?php echo $yu->id_kw?>" > -->

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">NIP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="NIP" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="NIP"required="required" value="<?= $yu->NIP?>">
                          </input>
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="username" name="username" required="required" value="<?= $okta->username?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nama Karyawan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="nama" name="nama" required="required" value="<?= $yu->NAMA?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Jenis Kelamin<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="Jenis_kelamin" name="Jenis_kelamin" required="required" value="<?= $yu->Jenis_kelamin?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="alamat" name="alamat" data-validate-linked="email" required="required" value="<?= $yu->alamat?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
                      </div>
                    
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <a href="<?= base_url('/Home/edit_k/'.$okta->id_karyawan)?>"><button id="send" type="submit" class="btn btn-success">Submit</button></a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>