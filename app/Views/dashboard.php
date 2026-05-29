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
/* ── Reset & container ── */
.right_col { padding: 0 !important; }

.db-wrap {
    padding: 16px 20px 28px;
    background: #f0f2f5;
    min-height: calc(100vh - 60px);
    font-family: 'Inter', sans-serif;
}

/* ── Header banner ── */
.db-header {
    background: linear-gradient(135deg, #0f4c35 0%, #1a7a52 60%, #22c55e 100%);
    border-radius: 14px;
    padding: 18px 24px;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 6px 20px rgba(15,76,53,.20);
    position: relative;
    overflow: hidden;
}

.db-header::before {
    content: "";
    position: absolute;
    width: 260px; height: 260px;
    border-radius: 50%;
    background: rgba(255,255,255,.07);
    right: -60px; top: -80px;
    pointer-events: none;
}

.db-header::after {
    content: "";
    position: absolute;
    width: 160px; height: 160px;
    border-radius: 50%;
    background: rgba(255,255,255,.05);
    right: 120px; bottom: -60px;
    pointer-events: none;
}

.db-header-text h2 {
    margin: 0 0 6px;
    font-size: 26px;
    font-weight: 800;
    color: #fff;
    letter-spacing: -.3px;
}

.db-header-text p {
    margin: 0;
    color: rgba(255,255,255,.80);
    font-size: 14px;
}

.db-header-icon {
    width: 64px; height: 64px;
    border-radius: 20px;
    background: rgba(255,255,255,.15);
    display: flex; align-items: center; justify-content: center;
    font-size: 28px;
    color: #fff;
    flex-shrink: 0;
}

/* ── Stat grid (top row of 6) ── */
.db-stats {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 12px;
    margin-bottom: 14px;
}

@media (max-width: 1200px) { .db-stats { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 768px)  { .db-stats { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 480px)  { .db-stats { grid-template-columns: 1fr; } }

.db-stat {
    background: #fff;
    border-radius: 12px;
    padding: 14px 14px;
    border: 1px solid #e8edf2;
    box-shadow: 0 2px 8px rgba(0,0,0,.04);
    position: relative;
    overflow: hidden;
    transition: transform .18s, box-shadow .18s;
}

.db-stat:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 28px rgba(0,0,0,.10);
}

.db-stat-icon {
    width: 36px; height: 36px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
    margin-bottom: 10px;
}

.db-stat-label {
    font-size: 12px;
    font-weight: 600;
    color: #8a96a3;
    text-transform: uppercase;
    letter-spacing: .4px;
    margin-bottom: 5px;
}

.db-stat-value {
    font-size: 22px;
    font-weight: 800;
    color: #1a202c;
    line-height: 1.15;
}

.db-stat-sub {
    font-size: 12px;
    color: #b0bac6;
    margin-top: 5px;
}

/* icon colour variants */
.ic-green  { background: #e8faf0; color: #16a34a; }
.ic-blue   { background: #e8f0fe; color: #2563eb; }
.ic-amber  { background: #fef9e7; color: #d97706; }
.ic-violet { background: #f3f0ff; color: #7c3aed; }
.ic-cyan   { background: #e0f9f9; color: #0891b2; }
.ic-red    { background: #fff0f0; color: #dc2626; }

/* ── Main content grid ── */
.db-main {
    display: grid;
    grid-template-columns: 240px 1fr;
    gap: 14px;
    align-items: start;
}

@media (max-width: 992px) { .db-main { grid-template-columns: 1fr; } }

/* ── Sidebar quick-actions ── */
.db-sidebar { display: flex; flex-direction: column; gap: 8px; }

.db-quick-title {
    font-size: 12px;
    font-weight: 700;
    color: #8a96a3;
    text-transform: uppercase;
    letter-spacing: .5px;
    margin-bottom: 0;
}

.db-action {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #fff;
    border: 1px solid #e8edf2;
    border-radius: 12px;
    padding: 11px 14px;
    color: #1a202c;
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
    box-shadow: 0 2px 6px rgba(0,0,0,.04);
    transition: .18s;
}

.db-action:hover {
    text-decoration: none;
    color: #16a34a;
    border-color: #16a34a;
    transform: translateX(3px);
    box-shadow: 0 4px 18px rgba(22,163,74,.12);
}

.db-action-ic {
    width: 38px; height: 38px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}

/* ── Panels (tables) ── */
.db-content { display: flex; flex-direction: column; gap: 20px; }

.db-panel {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e8edf2;
    box-shadow: 0 2px 12px rgba(0,0,0,.05);
    overflow: hidden;
}

.db-panel-head {
    padding: 16px 22px;
    border-bottom: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.db-panel-head h4 {
    margin: 0;
    font-size: 15px;
    font-weight: 700;
    color: #1a202c;
    display: flex;
    align-items: center;
    gap: 8px;
}

.db-panel-head h4 i { color: #16a34a; }

.db-panel-link {
    font-size: 13px;
    font-weight: 600;
    color: #16a34a;
    text-decoration: none;
    padding: 5px 12px;
    border-radius: 8px;
    border: 1px solid #d1fae5;
    background: #f0fdf4;
    transition: .15s;
}

.db-panel-link:hover {
    background: #16a34a;
    color: #fff;
    text-decoration: none;
}

.db-table { width: 100%; border-collapse: collapse; }

.db-table thead th {
    background: #f8fafc;
    color: #7a8694;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .4px;
    padding: 12px 18px;
    border-bottom: 1px solid #f1f5f9;
    white-space: nowrap;
}

.db-table tbody td {
    padding: 13px 18px;
    border-bottom: 1px solid #f8fafc;
    color: #374151;
    font-size: 13.5px;
    vertical-align: middle;
}

.db-table tbody tr:last-child td { border-bottom: none; }
.db-table tbody tr:hover td { background: #f9fffe; }

.db-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
}

.db-badge-green { background: #dcfce7; color: #15803d; }
.db-badge-red   { background: #fee2e2; color: #dc2626; }
.db-badge-blue  { background: #dbeafe; color: #1d4ed8; }

.db-empty {
    padding: 36px;
    text-align: center;
    color: #b0bac6;
    font-size: 13px;
}

.db-empty i { font-size: 32px; display: block; margin-bottom: 10px; opacity: .4; }

.db-table-wrap { overflow-x: auto; }

@media (max-width: 768px) {
    .db-wrap { padding: 16px 14px 32px; }
    .db-header { flex-direction: column; gap: 16px; align-items: flex-start; }
    .db-table { min-width: 520px; }
}
</style>

<div class="db-wrap">

    <!-- ── Header Banner ── -->
    <div class="db-header">
        <div class="db-header-text">
            <h2>Dashboard POS</h2>
            <p>Ringkasan penjualan, stok, barang masuk &amp; pendapatan hari ini</p>
        </div>
        <div class="db-header-icon">
            <i class="fa fa-bar-chart"></i>
        </div>
    </div>

    <!-- ── 6 Stat Cards ── -->
    <div class="db-stats">

        <div class="db-stat">
            <div class="db-stat-icon ic-green"><i class="fa fa-cubes"></i></div>
            <div class="db-stat-label">Total Barang</div>
            <div class="db-stat-value"><?= number_format($total_barang, 0, ',', '.') ?></div>
            <div class="db-stat-sub">Produk terdaftar</div>
        </div>

        <div class="db-stat">
            <div class="db-stat-icon ic-blue"><i class="fa fa-archive"></i></div>
            <div class="db-stat-label">Total Stok</div>
            <div class="db-stat-value"><?= number_format($total_stok, 0, ',', '.') ?></div>
            <div class="db-stat-sub">Unit tersedia</div>
        </div>

        <div class="db-stat">
            <div class="db-stat-icon ic-cyan"><i class="fa fa-sign-in"></i></div>
            <div class="db-stat-label">Barang Masuk</div>
            <div class="db-stat-value"><?= number_format($total_barang_masuk, 0, ',', '.') ?></div>
            <div class="db-stat-sub">Riwayat penerimaan</div>
        </div>

        <div class="db-stat">
            <div class="db-stat-icon ic-amber"><i class="fa fa-shopping-cart"></i></div>
            <div class="db-stat-label">Total Penjualan</div>
            <div class="db-stat-value"><?= number_format($total_transaksi, 0, ',', '.') ?></div>
            <div class="db-stat-sub">Transaksi selesai</div>
        </div>

        <div class="db-stat">
            <div class="db-stat-icon ic-violet"><i class="fa fa-money"></i></div>
            <div class="db-stat-label">Pendapatan</div>
            <div class="db-stat-value" style="font-size:17px;">Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></div>
            <div class="db-stat-sub">Total pendapatan</div>
        </div>

        <div class="db-stat">
            <div class="db-stat-icon ic-red"><i class="fa fa-warning"></i></div>
            <div class="db-stat-label">Stok Rendah</div>
            <div class="db-stat-value" style="color:#dc2626;"><?= number_format($stok_rendah, 0, ',', '.') ?></div>
            <div class="db-stat-sub">Barang ≤ 5 unit</div>
        </div>

    </div>

    <!-- ── Main 2-col layout ── -->
    <div class="db-main">

        <!-- Sidebar: Quick Actions -->
        <div class="db-sidebar">
            <div class="db-quick-title">Aksi Cepat</div>

            <a href="<?= base_url('/home/t_transaksi') ?>" class="db-action">
                <div class="db-action-ic ic-green"><i class="fa fa-plus"></i></div>
                Tambah Penjualan
            </a>

            <a href="<?= base_url('/home/bm') ?>" class="db-action">
                <div class="db-action-ic ic-cyan"><i class="fa fa-truck"></i></div>
                Kelola Barang Masuk
            </a>

            <a href="<?= base_url('/home/product') ?>" class="db-action">
                <div class="db-action-ic ic-blue"><i class="fa fa-cube"></i></div>
                Kelola Data Barang
            </a>

            <a href="<?= base_url('/home/transaksi') ?>" class="db-action">
                <div class="db-action-ic ic-amber"><i class="fa fa-list"></i></div>
                Riwayat Transaksi
            </a>
        </div>

        <!-- Content: 3 tables -->
        <div class="db-content">

            <!-- Transaksi Terbaru -->
            <div class="db-panel">
                <div class="db-panel-head">
                    <h4><i class="fa fa-shopping-cart"></i> Transaksi Terbaru</h4>
                    <a href="<?= base_url('/home/transaksi') ?>" class="db-panel-link">Lihat Semua</a>
                </div>
                <?php if (!empty($transaksi_terbaru)) : ?>
                    <div class="db-table-wrap">
                        <table class="db-table">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi_terbaru as $t) : ?>
                                    <?php
                                        $jumlah = $t->jumlah ?? 0;
                                        $harga  = $t->harga  ?? 0;
                                        $total  = $jumlah * $harga;
                                    ?>
                                    <tr>
                                        <td><strong><?= esc($t->nama_product ?? '-') ?></strong></td>
                                        <td><span class="db-badge db-badge-green"><?= number_format($jumlah, 0, ',', '.') ?> unit</span></td>
                                        <td>Rp <?= number_format($harga, 0, ',', '.') ?></td>
                                        <td><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <div class="db-empty">
                        <i class="fa fa-shopping-cart"></i>
                        Belum ada transaksi penjualan.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Produk Stok Rendah -->
            <div class="db-panel">
                <div class="db-panel-head">
                    <h4><i class="fa fa-warning" style="color:#dc2626;"></i> Produk Stok Rendah</h4>
                    <a href="<?= base_url('/home/product') ?>" class="db-panel-link">Cek Barang</a>
                </div>
                <?php if (!empty($produk_stok_rendah)) : ?>
                    <div class="db-table-wrap">
                        <table class="db-table">
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
                                        <td><span class="db-badge db-badge-blue"><?= esc($p->kode_product ?? '-') ?></span></td>
                                        <td><span class="db-badge db-badge-red"><?= number_format($p->stok_product ?? 0, 0, ',', '.') ?> tersisa</span></td>
                                        <td>Rp <?= number_format($p->harga_product ?? 0, 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <div class="db-empty">
                        <i class="fa fa-check-circle" style="color:#16a34a; opacity:1;"></i>
                        Semua produk memiliki stok yang cukup.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Barang Masuk Terbaru -->
            <div class="db-panel">
                <div class="db-panel-head">
                    <h4><i class="fa fa-sign-in"></i> Barang Masuk Terbaru</h4>
                    <a href="<?= base_url('/home/bm') ?>" class="db-panel-link">Lihat Semua</a>
                </div>
                <?php if (!empty($barang_masuk_terbaru)) : ?>
                    <div class="db-table-wrap">
                        <table class="db-table">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Harga Beli</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barang_masuk_terbaru as $bm) : ?>
                                    <tr>
                                        <td><strong><?= esc($bm->nama_product ?? '-') ?></strong></td>
                                        <td><span class="db-badge db-badge-green"><?= number_format($bm->jumlah_productmasuk ?? 0, 0, ',', '.') ?> unit</span></td>
                                        <td>Rp <?= number_format($bm->harga ?? 0, 0, ',', '.') ?></td>
                                        <td><?= !empty($bm->tanggal) ? date('d M Y', strtotime($bm->tanggal)) : '-' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <div class="db-empty">
                        <i class="fa fa-inbox"></i>
                        Belum ada data barang masuk.
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

</div>