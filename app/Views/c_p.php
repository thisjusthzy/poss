<div align="center">
<img src="<?= FCPATH . 'images/cop-sph.jpeg' ?>" width="80%" height="25%">
<table width="90%" border="1" id="datatable-buttons" class="table table-striped table-bordered" style="margin: 0 auto; text-align: center;">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kode product</th>
            <th>Jumlah</th>
            <th>Harga</th>
          </tr>
        </thead>


        <tbody>
          <?php
          $no=1;
          foreach ($okta as $gas){
            ?>
            <tr>
              <th><?php echo $no++ ?></th>
              <td><?php echo $gas->nama_product?></td>
              <td><?php echo $gas->kode_product?></td>
              <td><?php echo $gas->jumlah?></td>
              <td><?php echo $gas->harga?></td>
             
            </tr>
          <?php }?>
        </tbody>
      </table>
</div>
      <script>
        window.print();
      </script>