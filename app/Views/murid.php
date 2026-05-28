<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>DATA SISWA</h2>
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
                
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIS</th>
                          <th>Nama Siswa</th>
                          <th>Jenis Kelamin</th>
                          <th>Act</th>
                         <a href="<?php echo base_url('/Home/let/')?>"> <button class="btn btn-success"><i class="fa fa-plus"></i></button></a>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $no=1;
                        foreach ($okta as $key) {
                      
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                     
                          <td><?php echo $key->NIS?></td>
                          <td><?php echo $key->nama?></td>
                          <td><?php echo $key->jenis_kelamin?></td>

                          <td>
                      
                         <a href="<?= base_url('/Home/clear_siswa/'.$key->id_siswa)?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                       </a>
                         </td>
                        </tr>
                       <?php
                     }
                     ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>