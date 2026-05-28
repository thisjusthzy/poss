<div align="center">
<img src="<?= FCPATH . 'images/cop-sph.jpeg' ?>" width="80%" height="25%">
<table width="80%" border="1" id="datatable-buttons" class="table table-striped table-bordered" style="margin: 0 auto; text-align: center;">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Nama Supplier</th>
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
              <td><?php echo $gas->jumlah_productmasuk?></td>
              <td><?php echo $gas->harga?></td>
              <td><?php echo $gas->nama_supplier?></td>
            
            </tr>

          <?php }?>
        </tbody>
      </table>
</div>
      <script>
        window.print();
      </script>