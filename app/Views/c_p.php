<div align="center">
<img src="<?= FCPATH . 'images/cop-sph.jpeg' ?>" width="80%" height="25%">
<table width="90%" border="1" id="datatable-buttons" class="table table-striped table-bordered" style="margin: 20px auto; text-align: center; border-collapse: collapse;">
        <thead>
          <tr style="background: #f4f6fb;">
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kode Produk</th>
            <th>Jumlah</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Keuntungan</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $no = 1;
          $total_jumlah = 0;
          $total_keuntungan = 0;
          foreach ($okta as $gas){
              $harga_beli = $gas->harga_beli ?? 0;
              $harga_jual = $gas->harga;
              $jumlah = $gas->jumlah;
              $profit = ($harga_jual - $harga_beli) * $jumlah;
              
              $total_jumlah += $jumlah;
              $total_keuntungan += $profit;
          ?>
            <tr>
              <th><?php echo $no++ ?></th>
              <td style="text-align: left; padding-left: 8px;"><?php echo esc($gas->nama_product) ?></td>
              <td><?php echo esc($gas->kode_product) ?></td>
              <td><?php echo $jumlah ?></td>
              <td style="text-align: right; padding-right: 8px;">Rp <?php echo number_format($harga_beli, 0, ',', '.') ?></td>
              <td style="text-align: right; padding-right: 8px;">Rp <?php echo number_format($harga_jual, 0, ',', '.') ?></td>
              <td style="text-align: right; padding-right: 8px; font-weight: 600; color: #2eb88a;">Rp <?php echo number_format($profit, 0, ',', '.') ?></td>
            </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr style="font-weight: bold; background: #f4f6fb;">
            <td colspan="3" style="text-align: right; padding-right: 8px;">Grand Total:</td>
            <td><?php echo $total_jumlah ?></td>
            <td colspan="2"></td>
            <td style="text-align: right; padding-right: 8px; color: #2eb88a;">Rp <?php echo number_format($total_keuntungan, 0, ',', '.') ?></td>
          </tr>
        </tfoot>
      </table>
</div>
      <script>
        window.print();
      </script>