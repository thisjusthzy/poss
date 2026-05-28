<?php
$total_barang        = $total_barang ?? 0;
$total_stok          = $total_stok ?? 0;
$total_barang_masuk  = $total_barang_masuk ?? 0;
$total_transaksi     = $total_transaksi ?? 0;
$total_pendapatan    = $total_pendapatan ?? 0;
$stok_rendah         = $stok_rendah ?? 0;

$transaksi_terbaru      = $transaksi_terbaru ?? [];
$produk_stok_rendah     = $produk_stok_rendah ?? [];
$barang_masuk_terbaru   = $barang_masuk_terbaru ?? [];
?>

<style>
    .right_col {
    padding: 20px 50px 0 !important;
}
.pos-dashboard .row {
    margin-left: -250px;
    margin-right: -100px;
}

.pos-dashboard [class*="col-"] {
    padding-left: 10px;
    padding-right: 10px;
}
    .pos-dashboard {
    width: 100%;
    padding: 22px 28px 40px;
    background: #f4f6f8;
    min-height: calc(100vh - 60px);
}

    .pos-dashboard-inner {
    width: 100%;
    max-width: 100%;
    margin: 0;
}

    .pos-dashboard-header {
    background: #ffffff;
    border-radius: 16px;
    padding: 22px 26px;
    margin-bottom: 22px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
}

    .pos-dashboard-header h2 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #111827;
    }

    .pos-dashboard-header p {
        margin: 8px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .pos-stat-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 20px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
    margin-bottom: 18px;
    min-height: 140px;
    position: relative;
    overflow: hidden;
}

    .pos-stat-card::after {
        content: "";
        position: absolute;
        width: 110px;
        height: 110px;
        right: -45px;
        top: -45px;
        border-radius: 50%;
        background: rgba(16, 185, 129, 0.10);
    }

    .pos-stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        background: #ecfdf5;
        color: #059669;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 16px;
    }

    .pos-stat-label {
        color: #6b7280;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .pos-stat-number {
        color: #111827;
        font-size: 25px;
        font-weight: 800;
        line-height: 1.2;
    }

    .pos-stat-note {
        margin-top: 8px;
        color: #9ca3af;
        font-size: 12px;
    }

    .pos-panel {
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
        margin-bottom: 24px;
        overflow: hidden;
    }

    .pos-panel-header {
        padding: 18px 22px;
        border-bottom: 1px solid #edf0f3;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .pos-panel-header h4 {
        margin: 0;
        color: #111827;
        font-size: 16px;
        font-weight: 700;
    }

    .pos-panel-header i {
        color: #059669;
        margin-right: 8px;
    }

    .pos-panel-link {
        color: #059669;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
    }

    .pos-panel-link:hover {
        color: #047857;
        text-decoration: none;
    }

    .pos-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .pos-table thead th {
        background: #f9fafb;
        color: #6b7280;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .3px;
        padding: 14px 18px;
        border-bottom: 1px solid #edf0f3;
    }

    .pos-table tbody td {
        padding: 15px 18px;
        border-bottom: 1px solid #f1f5f9;
        color: #374151;
        font-size: 13px;
        vertical-align: middle;
    }

    .pos-table tbody tr:last-child td {
        border-bottom: none;
    }

    .pos-table strong {
        color: #111827;
    }

    .pos-badge-green {
        display: inline-block;
        background: #ecfdf5;
        color: #047857;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .pos-badge-red {
        display: inline-block;
        background: #fee2e2;
        color: #dc2626;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .pos-action-card {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 18px;
        margin-bottom: 14px;
        color: #111827;
        text-decoration: none;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
        transition: 0.2s;
    }

    .pos-action-card:hover {
        text-decoration: none;
        color: #111827;
        border-color: #10b981;
        transform: translateY(-2px);
    }

    .pos-action-card i {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: #ecfdf5;
        color: #059669;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pos-empty {
        padding: 28px;
        text-align: center;
        color: #9ca3af;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .pos-dashboard {
            padding: 18px 14px 30px;
        }

        .pos-dashboard-header {
            padding: 20px;
        }

        .pos-table {
            min-width: 650px;
        }

        .pos-table-wrap {
            overflow-x: auto;
        }
    }
</style>

<div class="right_col" role="main">
    <div class="pos-dashboard">
        <div class="pos-dashboard-inner">

        <div class="pos-dashboard-header">
            <h2>Dashboard POS</h2>
            <p>Ringkasan data penjualan, stok barang, barang masuk, dan pendapatan.</p>
        </div>

        <div class="row">

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="pos-stat-card">
                    <div class="pos-stat-icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="pos-stat-label">Total Barang</div>
                    <div class="pos-stat-number"><?= number_format($total_barang, 0, ',', '.') ?></div>
                    <div class="pos-stat-note">Produk yang terdaftar</div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="pos-stat-card">
                    <div class="pos-stat-icon">
                        <i class="fa fa-archive"></i>
                    </div>
                    <div class="pos-stat-label">Total Stok</div>
                    <div class="pos-stat-number"><?= number_format($total_stok, 0, ',', '.') ?></div>
                    <div class="pos-stat-note">Jumlah stok tersedia</div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="pos-stat-card">
                    <div class="pos-stat-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="pos-stat-label">Total Penjualan</div>
                    <div class="pos-stat-number"><?= number_format($total_transaksi, 0, ',', '.') ?></div>
                    <div class="pos-stat-note">Transaksi penjualan</div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="pos-stat-card">
                    <div class="pos-stat-icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="pos-stat-label">Pendapatan</div>
                    <div class="pos-stat-number" style="font-size:22px;">
                        Rp <?= number_format($total_pendapatan, 0, ',', '.') ?>
                    </div>
                    <div class="pos-stat-note">Total pendapatan penjualan</div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-4 col-sm-12 col-xs-12">

                <div class="pos-stat-card">
                    <div class="pos-stat-icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                    <div class="pos-stat-label">Barang Masuk</div>
                    <div class="pos-stat-number"><?= number_format($total_barang_masuk, 0, ',', '.') ?></div>
                    <div class="pos-stat-note">Riwayat barang masuk</div>
                </div>

                <div class="pos-stat-card">
                    <div class="pos-stat-icon" style="background:#fff1f2;color:#e11d48;">
                        <i class="fa fa-warning"></i>
                    </div>
                    <div class="pos-stat-label">Stok Rendah</div>
                    <div class="pos-stat-number"><?= number_format($stok_rendah, 0, ',', '.') ?></div>
                    <div class="pos-stat-note">Barang dengan stok ≤ 5</div>
                </div>

                <a href="<?= base_url('/home/t_transaksi') ?>" class="pos-action-card">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Penjualan</span>
                </a>

                <a href="<?= base_url('/home/bm') ?>" class="pos-action-card">
                    <i class="fa fa-truck"></i>
                    <span>Kelola Barang Masuk</span>
                </a>

                <a href="<?= base_url('/home/product') ?>" class="pos-action-card">
                    <i class="fa fa-cube"></i>
                    <span>Kelola Data Barang</span>
                </a>

            </div>

            <div class="col-md-8 col-sm-12 col-xs-12">

                <div class="pos-panel">
                    <div class="pos-panel-header">
                        <h4><i class="fa fa-shopping-cart"></i> Transaksi Terbaru</h4>
                        <a href="<?= base_url('/home/transaksi') ?>" class="pos-panel-link">Lihat Semua</a>
                    </div>

                    <?php if (!empty($transaksi_terbaru)) : ?>
                        <div class="pos-table-wrap">
                            <table class="pos-table">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi_terbaru as $t) : ?>
                                        <?php
                                            $jumlah = $t->jumlah ?? 0;
                                            $harga  = $t->harga ?? 0;
                                            $total  = $jumlah * $harga;
                                        ?>
                                        <tr>
                                            <td><strong><?= esc($t->nama_product ?? '-') ?></strong></td>
                                            <td><span class="pos-badge-green"><?= number_format($jumlah, 0, ',', '.') ?> unit</span></td>
                                            <td>Rp <?= number_format($harga, 0, ',', '.') ?></td>
                                            <td><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="pos-empty">Belum ada transaksi penjualan.</div>
                    <?php endif; ?>
                </div>

                <div class="pos-panel">
                    <div class="pos-panel-header">
                        <h4><i class="fa fa-warning"></i> Produk Stok Rendah</h4>
                        <a href="<?= base_url('/home/product') ?>" class="pos-panel-link">Cek Barang</a>
                    </div>

                    <?php if (!empty($produk_stok_rendah)) : ?>
                        <div class="pos-table-wrap">
                            <table class="pos-table">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Kode</th>
                                        <th>Stok</th>
                                        <th>Harga Jual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($produk_stok_rendah as $p) : ?>
                                        <tr>
                                            <td><strong><?= esc($p->nama_product ?? '-') ?></strong></td>
                                            <td><?= esc($p->kode_product ?? '-') ?></td>
                                            <td>
                                                <span class="pos-badge-red">
                                                    <?= number_format($p->stok_product ?? 0, 0, ',', '.') ?> tersisa
                                                </span>
                                            </td>
                                            <td>Rp <?= number_format($p->harga_product ?? 0, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="pos-empty">Tidak ada produk dengan stok rendah.</div>
                    <?php endif; ?>
                </div>

                <div class="pos-panel">
                    <div class="pos-panel-header">
                        <h4><i class="fa fa-sign-in"></i> Barang Masuk Terbaru</h4>
                        <a href="<?= base_url('/home/bm') ?>" class="pos-panel-link">Lihat Semua</a>
                    </div>

                    <?php if (!empty($barang_masuk_terbaru)) : ?>
                        <div class="pos-table-wrap">
                            <table class="pos-table">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Harga Beli</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang_masuk_terbaru as $bm) : ?>
                                        <tr>
                                            <td><strong><?= esc($bm->nama_product ?? '-') ?></strong></td>
                                            <td>
                                                <span class="pos-badge-green">
                                                    <?= number_format($bm->jumlah_productmasuk ?? 0, 0, ',', '.') ?> unit
                                                </span>
                                            </td>
                                            <td>Rp <?= number_format($bm->harga ?? 0, 0, ',', '.') ?></td>
                                            <td>
                                                <?= !empty($bm->tanggal) ? date('d-m-Y', strtotime($bm->tanggal)) : '-' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="pos-empty">Belum ada data barang masuk.</div>
                    <?php endif; ?>
                </div>

            </div>

        </div>

    </div>
    </div>
</div>