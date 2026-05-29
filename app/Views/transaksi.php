<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-shopping-cart" style="color:#4dd9ac;margin-right:8px;"></i> Transaksi Penjualan</h2>
      <div class="pull-right" style="margin-top:-4px;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
          <i class="fa fa-plus"></i> Tambah Transaksi (POS)
        </button>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert" style="border-radius: 8px;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <i class="fa fa-check-circle" style="margin-right: 6px;"></i> <?= session()->getFlashdata('success') ?>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert" style="border-radius: 8px;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <i class="fa fa-exclamation-triangle" style="margin-right: 6px;"></i> <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <table id="datatable-buttons" class="table table-striped table-bordered" style="width: 100%;">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga Jual</th>
            <th>Total</th>
            <th>Metode Bayar</th>
            <th style="text-align:center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($okta as $key) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><strong><?php echo esc($key->nama_product) ?></strong></td>
            <td>
              <span style="background:#e8f5f1;color:#2eb88a;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:600;">
                <?php echo $key->jumlah ?> unit
              </span>
            </td>
            <td style="color:#6b7a99;">
              Rp <?php echo number_format($key->harga, 0, ',', '.') ?>
            </td>
            <td style="color:#1a2234;font-weight:600;">
              Rp <?php echo number_format($key->jumlah * $key->harga, 0, ',', '.') ?>
            </td>
            <td>
              <span style="background:#f3f4f6;color:#4b5563;padding:3px 8px;border-radius:6px;font-size:11px;font-weight:600;">
                <?= esc($key->no_pembayaran ?? 'Cash') ?>
              </span>
            </td>
            <td style="text-align:center; display: flex; justify-content: center; gap: 6px;">
              <?php if (!empty($key->id_bill)): ?>
              <button class="btn btn-default btn-sm btn-print-receipt-item" data-id-bill="<?= $key->id_bill ?>" title="Cetak Struk" style="border-radius: 4px; padding: 4px 10px;">
                <i class="fa fa-print" style="color: #4dd9ac;"></i> Cetak
              </button>
              <?php endif; ?>
              <?php if(session()->get('level') != 2): ?>
              <a href="<?= base_url('/Home/clear_t/'.$key->id_transaksi)?>" class="btn btn-danger btn-sm"
                 onclick="return confirm('Yakin hapus transaksi ini?')" style="border-radius: 4px; padding: 4px 10px;">
                <i class="fa fa-trash"></i>
              </a>
              <?php endif; ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Tambah Transaksi (POS Cart) -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius:12px; overflow:hidden;">
      <div class="modal-header" style="background:#1a2234; color:#fff; padding:15px 20px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:0.8;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addModalLabel" style="font-weight:600; display:flex; align-items:center; gap:8px;">
          <i class="fa fa-shopping-cart" style="color:#4dd9ac;"></i> Point of Sale (POS) Kasir
        </h4>
      </div>
      <form class="form-horizontal form-label-left" novalidate action="<?= base_url('home/aksi_simpant')?>" method="post">
        <div class="modal-body" style="padding:24px 20px;">
          
          <input type="hidden" name="cart_data" id="cart_data">
          
          <!-- Input fields to add items -->
          <div style="background:#f4f6fb; border-radius:8px; padding: 15px; border:1px solid #eef0f5; margin-bottom: 20px;">
            <p style="font-size:11px; font-weight:700; color:#6b7a99; text-transform:uppercase; letter-spacing:1px; margin-bottom: 12px;">Tambah Barang ke Keranjang</p>
            <div class="row">
              <div class="col-md-5 col-sm-12">
                <div class="form-group" style="margin-bottom: 8px;">
                  <label style="font-weight:600; font-size:12px;">Nama Barang</label>
                  <select class="form-control" id="product_select_transaksi" style="border-radius:8px;">
                    <option value="">-- Pilih Barang --</option>
                    <?php if(!empty($products)): foreach ($products as $key) { ?>
                    <option value="<?= $key->id_product ?>" data-harga-jual="<?= $key->harga_product ?>" data-stok="<?= $key->stok_product ?>"><?= esc($key->nama_product) ?> (Stok: <?= $key->stok_product ?>)</option>
                    <?php } endif; ?>
                  </select>
                </div>
              </div>
              
              <div class="col-md-3 col-sm-12">
                <div class="form-group" style="margin-bottom: 8px;">
                  <label style="font-weight:600; font-size:12px;">Harga Jual</label>
                  <div style="position:relative;">
                    <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#6b7a99; font-size:12px; font-weight:600;">Rp</span>
                    <input type="number" id="harga" placeholder="0" class="form-control" style="padding-left:30px !important; border-radius:8px;" min="0">
                  </div>
                </div>
              </div>

              <div class="col-md-2 col-sm-12">
                <div class="form-group" style="margin-bottom: 8px;">
                  <label style="font-weight:600; font-size:12px;">Qty</label>
                  <input type="number" id="jumlah" placeholder="0" class="form-control" min="1" style="border-radius:8px;">
                </div>
              </div>

              <div class="col-md-2 col-sm-12" style="margin-top: 22px;">
                <button type="button" id="btn-add-to-cart" class="btn btn-primary btn-block" style="border-radius:8px; height: 34px;">
                  <i class="fa fa-plus"></i> Tambah
                </button>
              </div>
            </div>
          </div>

          <!-- Cart items list -->
          <div class="table-responsive" style="margin-bottom: 20px;">
            <label style="font-weight:600; font-size:13px; color: #1a2234; display:block; margin-bottom: 8px;">Daftar Keranjang Belanja</label>
            <table class="table table-bordered table-striped" id="cart-table" style="width:100%;">
              <thead>
                <tr style="background:#1a2234; color: #fff;">
                  <th>Nama Barang</th>
                  <th style="width: 80px; text-align: center;">Qty</th>
                  <th style="text-align: right; width: 130px;">Harga Jual</th>
                  <th style="text-align: right; width: 150px;">Total</th>
                  <th style="text-align: center; width: 60px;">Aksi</th>
                </tr>
              </thead>
              <tbody id="cart-tbody">
                <tr>
                  <td colspan="5" class="text-center" style="color: #6b7a99; padding: 20px;">Keranjang belanja kosong</td>
                </tr>
              </tbody>
              <tfoot>
                <tr style="font-weight: bold; background:#f4f6fb; font-size: 14px;">
                  <td colspan="3" class="text-right">Grand Total:</td>
                  <td class="text-right" id="cart-grand-total" style="color:#2eb88a; font-weight:700;">Rp 0</td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>

          <!-- Checkout payment options -->
          <div style="background:#f9fafc; border-top:1px solid #eef0f5; padding: 15px; border-radius: 8px;">
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <div class="form-group" style="margin-bottom: 8px;">
                  <label style="font-weight:600; font-size:12px;">Metode Pembayaran</label>
                  <select class="form-control" name="payment_method" id="payment_method" style="border-radius:8px;">
                    <option value="Cash">Cash (Tunai)</option>
                    <option value="QRIS">QRIS</option>
                    <option value="Transfer">Transfer Bank</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-4 col-sm-12" id="cash-payment-group">
                <div class="form-group" style="margin-bottom: 8px;">
                  <label style="font-weight:600; font-size:12px;">Jumlah Bayar (Tunai)</label>
                  <div style="position:relative;">
                    <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#6b7a99; font-size:12px; font-weight:600;">Rp</span>
                    <input type="number" class="form-control" id="cash_pay" placeholder="0" style="padding-left:30px !important; border-radius:8px;">
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-12 text-right" id="change-group" style="margin-top: 15px;">
                <span style="font-weight:600; color:#6b7a99; display:block; font-size:11px;">KEMBALIAN:</span>
                <span id="cash_change" style="font-size: 20px; font-weight:700; color:#2eb88a; display:block; margin-top: 4px;">Rp 0</span>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer" style="background:#f9fafc; border-top:1px solid #eef0f5; padding:15px 20px;">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:8px;">Batal</button>
          <button id="btn-checkout" type="submit" class="btn btn-success" style="border-radius:8px;"><i class="fa fa-shopping-bag"></i> Selesaikan Transaksi</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Cetak Struk (Receipt Modal) -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 380px; margin: 30px auto;">
    <div class="modal-content" style="border-radius:8px; box-shadow: 0 4px 15px rgba(0,0,0,0.15); font-family: 'Courier New', Courier, monospace; color:#000;">
      <div class="modal-body" style="padding: 20px;" id="receipt-content">
        <!-- Receipt content will be populated dynamically -->
      </div>
      <div class="modal-footer" style="background:#f9fafc; border-top:1px solid #eef0f5; padding:10px 20px; display:flex; justify-content:space-between; width:100%;">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:4px; font-family: sans-serif;">Tutup</button>
        <button type="button" class="btn btn-success" id="btn-print-receipt" style="border-radius:4px; font-family: sans-serif;"><i class="fa fa-print"></i> Cetak Struk</button>
      </div>
    </div>
  </div>
</div>

<script>
let cart = [];

document.addEventListener('DOMContentLoaded', function() {
    // 1. Auto fill price on product change
    var productSelect = document.getElementById('product_select_transaksi');
    if (productSelect) {
        productSelect.addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var hargaJual = selectedOption.getAttribute('data-harga-jual');
            var hargaField = document.getElementById('harga');
            if (hargaField) {
                hargaField.value = hargaJual ? hargaJual : '';
            }
        });
    }

    // 2. Add to cart click
    var btnAddToCart = document.getElementById('btn-add-to-cart');
    if (btnAddToCart) {
        btnAddToCart.addEventListener('click', function() {
            var productSelect = document.getElementById('product_select_transaksi');
            var qtyInput = document.getElementById('jumlah');
            var priceInput = document.getElementById('harga');

            if (!productSelect.value) {
                alert('Pilih barang terlebih dahulu!');
                return;
            }

            var qty = parseInt(qtyInput.value);
            if (isNaN(qty) || qty <= 0) {
                alert('Masukkan jumlah qty yang valid!');
                return;
            }

            var price = parseInt(priceInput.value);
            if (isNaN(price) || price < 0) {
                alert('Harga jual tidak valid!');
                return;
            }

            var selectedOption = productSelect.options[productSelect.selectedIndex];
            var productName = selectedOption.text.split(' (Stok:')[0];
            var productId = productSelect.value;
            var stock = parseInt(selectedOption.getAttribute('data-stok') || 0);

            // Check if product is already in cart
            var existingItem = cart.find(item => item.id == productId);
            var currentQtyInCart = existingItem ? existingItem.qty : 0;

            if (currentQtyInCart + qty > stock) {
                alert('Stok tidak mencukupi! Sisa stok: ' + stock + ' (Di keranjang: ' + currentQtyInCart + ')');
                return;
            }

            if (existingItem) {
                existingItem.qty += qty;
                existingItem.price = price;
            } else {
                cart.push({
                    id: productId,
                    name: productName,
                    qty: qty,
                    price: price
                });
            }

            // Reset inputs
            qtyInput.value = '';
            renderCart();
        });
    }

    // 3. Render cart table
    function renderCart() {
        var tbody = document.getElementById('cart-tbody');
        var grandTotalSpan = document.getElementById('cart-grand-total');
        var cartDataInput = document.getElementById('cart_data');

        if (cart.length === 0) {
            tbody.innerHTML = '<tr><td colspan="5" class="text-center" style="color: #6b7a99; padding: 20px;">Keranjang belanja kosong</td></tr>';
            grandTotalSpan.innerHTML = 'Rp 0';
            if (cartDataInput) cartDataInput.value = '';
            calculateChange();
            return;
        }

        var html = '';
        var grandTotal = 0;

        cart.forEach(function(item, index) {
            var total = item.qty * item.price;
            grandTotal += total;
            html += '<tr>' +
                '<td><strong>' + item.name + '</strong></td>' +
                '<td style="text-align:center;">' + item.qty + '</td>' +
                '<td style="text-align:right;">Rp ' + formatRupiah(item.price) + '</td>' +
                '<td style="text-align:right; font-weight:600; color:#1a2234;">Rp ' + formatRupiah(total) + '</td>' +
                '<td style="text-align:center;">' +
                    '<button type="button" class="btn btn-danger btn-xs btn-remove-item" data-index="' + index + '" style="border-radius:4px; padding: 2px 6px;">' +
                        '<i class="fa fa-trash"></i>' +
                    '</button>' +
                '</td>' +
                '</tr>';
        });

        tbody.innerHTML = html;
        grandTotalSpan.innerHTML = 'Rp ' + formatRupiah(grandTotal);
        if (cartDataInput) cartDataInput.value = JSON.stringify(cart);

        // Bind delete events
        document.querySelectorAll('.btn-remove-item').forEach(function(button) {
            button.addEventListener('click', function() {
                var index = parseInt(this.getAttribute('data-index'));
                cart.splice(index, 1);
                renderCart();
            });
        });

        calculateChange();
    }

    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID').format(angka);
    }

    // 4. Change calculator
    var cashPayInput = document.getElementById('cash_pay');
    var paymentMethodSelect = document.getElementById('payment_method');
    
    if (cashPayInput) {
        cashPayInput.addEventListener('input', calculateChange);
    }
    
    if (paymentMethodSelect) {
        paymentMethodSelect.addEventListener('change', function() {
            var val = this.value;
            var payGroup = document.getElementById('cash-payment-group');
            var changeGroup = document.getElementById('change-group');
            
            if (val === 'Cash') {
                payGroup.style.display = 'block';
                changeGroup.style.display = 'block';
                calculateChange();
            } else {
                payGroup.style.display = 'none';
                changeGroup.style.display = 'none';
            }
        });
    }

    function calculateChange() {
        var total = getCartGrandTotal();
        var paymentMethod = paymentMethodSelect ? paymentMethodSelect.value : 'Cash';
        
        if (paymentMethod !== 'Cash') {
            document.getElementById('cash_change').innerHTML = 'Rp 0';
            return;
        }

        var pay = parseInt(cashPayInput.value || 0);
        var change = pay - total;
        
        var changeSpan = document.getElementById('cash_change');
        if (change < 0) {
            changeSpan.innerHTML = 'Rp 0';
            changeSpan.style.color = '#f5365c';
        } else {
            changeSpan.innerHTML = 'Rp ' + formatRupiah(change);
            changeSpan.style.color = '#2eb88a';
        }
    }

    function getCartGrandTotal() {
        var total = 0;
        cart.forEach(item => {
            total += item.qty * item.price;
        });
        return total;
    }

    // 5. Validate checkout submit
    var formSubmit = document.querySelector('#addModal form');
    if (formSubmit) {
        formSubmit.addEventListener('submit', function(e) {
            if (cart.length === 0) {
                e.preventDefault();
                alert('Keranjang belanja kosong! Silakan tambahkan barang terlebih dahulu.');
                return;
            }
            
            var total = getCartGrandTotal();
            var paymentMethod = paymentMethodSelect ? paymentMethodSelect.value : 'Cash';
            if (paymentMethod === 'Cash') {
                var pay = parseInt(cashPayInput.value || 0);
                if (pay < total) {
                    e.preventDefault();
                    alert('Jumlah bayar tunai kurang dari total belanja!');
                    return;
                }
            }
        });
    }

    // 6. Handle receipt print trigger for table actions
    $(document).on('click', '.btn-print-receipt-item', function() {
        var billId = $(this).data('id-bill');
        showReceipt(billId);
    });

    // 7. Print action in receipt modal
    document.getElementById('btn-print-receipt').addEventListener('click', function() {
        var printContent = document.getElementById('receipt-content').innerHTML;
        var printWindow = window.open('', '_blank', 'width=400,height=600');
        printWindow.document.write('<html><head><title>Cetak Struk</title>');
        printWindow.document.write('<style>body { font-family: "Courier New", Courier, monospace; padding: 20px; color: #000; font-size: 12px; } hr { border-top: 1px dashed #000; margin: 10px 0; }</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(printContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        
        printWindow.setTimeout(function() {
            printWindow.print();
            printWindow.close();
        }, 250);
    });
});

// Fetch bill and items JSON data and render in modal
function showReceipt(billId) {
    fetch('<?= base_url("Home/get_receipt") ?>/' + billId)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                var content = document.getElementById('receipt-content');
                content.innerHTML = renderReceiptHTML(data);
                $('#receiptModal').modal('show');
            } else {
                alert('Gagal mengambil data struk: ' + data.message);
            }
        })
        .catch(err => {
            console.error(err);
            alert('Terjadi kesalahan koneksi saat mengambil data struk.');
        });
}

// Convert JSON transaction to Thermal receipt design
function renderReceiptHTML(data) {
    var bill = data.bill;
    var items = data.items;
    var cashier = data.cashier;
    
    var html = '<div style="text-align: center; margin-bottom: 15px;">' +
        '<h4 style="margin: 0; font-weight: bold; font-size: 15px; font-family: sans-serif;">WARUNG POS KASIR</h4>' +
        '<p style="margin: 2px 0 0 0; font-size: 11px;">Jl. Raya Pemrograman No. 4</p>' +
        '<p style="margin: 2px 0 0 0; font-size: 11px;">Telp: 0812-3456-7890</p>' +
        '</div>' +
        '<hr style="border-top: 1px dashed #000; margin: 10px 0;">' +
        '<div style="font-size: 11px; margin-bottom: 10px; line-height: 1.4;">' +
        '<div>Bill ID  : ' + bill.id_bill + '</div>' +
        '<div>Tanggal  : ' + bill.tgl_transaksi + '</div>' +
        '<div>Kasir    : ' + cashier + '</div>' +
        '<div>Bayar    : ' + bill.no_pembayaran + '</div>' +
        '</div>' +
        '<hr style="border-top: 1px dashed #000; margin: 10px 0;">' +
        '<table style="width: 100%; font-size: 11px; border-collapse: collapse; line-height: 1.5;">';
        
    var totalQty = 0;
    var rupiahFormatter = new Intl.NumberFormat('id-ID');
    
    items.forEach(function(item) {
        var subtotal = item.jumlah * item.harga;
        totalQty += parseInt(item.jumlah);
        html += '<tr>' +
            '<td colspan="3" style="padding: 2px 0;"><strong>' + item.nama_product + '</strong></td>' +
            '</tr>' +
            '<tr>' +
            '<td style="padding: 2px 0; width: 45%;">' + item.jumlah + ' x Rp ' + rupiahFormatter.format(item.harga) + '</td>' +
            '<td style="padding: 2px 0; width: 5%;"></td>' +
            '<td style="padding: 2px 0; text-align: right; width: 50%;">Rp ' + rupiahFormatter.format(subtotal) + '</td>' +
            '</tr>';
    });
    
    html += '</table>' +
        '<hr style="border-top: 1px dashed #000; margin: 10px 0;">' +
        '<table style="width: 100%; font-size: 11px; font-weight: bold; line-height: 1.5;">' +
        '<tr>' +
        '<td>TOTAL QTY:</td>' +
        '<td style="text-align: right;">' + totalQty + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td>GRAND TOTAL:</td>' +
        '<td style="text-align: right; font-size: 12px;">Rp ' + rupiahFormatter.format(bill.total_belanjaan) + '</td>' +
        '</tr>' +
        '</table>' +
        '<hr style="border-top: 1px dashed #000; margin: 15px 0 10px 0;">' +
        '<div style="text-align: center; font-size: 11px; font-style: italic; line-height: 1.4;">' +
        'Terima Kasih Atas Kunjungan Anda<br>' +
        'Barang yang sudah dibeli tidak dapat ditukar/dikembalikan.' +
        '</div>';
        
    return html;
}
</script>

<?php if (session()->getFlashdata('print_bill_id')): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var billId = <?= session()->getFlashdata('print_bill_id') ?>;
    showReceipt(billId);
});
</script>
<?php endif; ?>