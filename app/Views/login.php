<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Point of Sale | Login</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('../vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('../vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('../vendors/animate.css/animate.min.css')?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?= base_url('../build/css/custom.min.css')?>" rel="stylesheet">
    <!-- POS Custom Style -->
    <link href="<?= base_url('css/pos-custom.css')?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
     <style>
        * {
            box-sizing: border-box;
        }

        body.pos-login-page {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #f4f7f6 0%, #eef2f1 100%);
            font-family: "Segoe UI", Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 16px;
        }

        .pos-login-wrapper {
            width: 100%;
            max-width: 1000px;
        }

        .pos-login-card {
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            background: #ffffff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.12);
            min-height: 620px;
            border: 1px solid #e5e7eb;
        }

        .pos-login-left {
            position: relative;
            background: linear-gradient(160deg, #0f172a 0%, #111827 45%, #1f2937 100%);
            color: #ffffff;
            padding: 42px 34px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .pos-login-left::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            background: rgba(16, 185, 129, 0.14);
            border-radius: 50%;
            top: -80px;
            right: -80px;
        }

        .pos-login-left::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            background: rgba(52, 211, 153, 0.08);
            border-radius: 50%;
            bottom: -70px;
            left: -70px;
        }

        .pos-left-top,
        .pos-left-middle,
        .pos-left-bottom {
            position: relative;
            z-index: 2;
        }

        .pos-brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .pos-brand-icon {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            background: linear-gradient(135deg, #10b981, #059669);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 22px rgba(16, 185, 129, 0.28);
            flex-shrink: 0;
        }

        .pos-brand-icon i {
            font-size: 22px;
        }

        .pos-brand-text h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
        }

        .pos-brand-text p {
            margin: 4px 0 0;
            color: #cbd5e1;
            font-size: 13px;
        }

        .pos-left-middle h1 {
            margin: 0 0 14px;
            font-size: 34px;
            line-height: 1.25;
            font-weight: 700;
        }

        .pos-left-middle p {
            margin: 0;
            color: #cbd5e1;
            line-height: 1.8;
            font-size: 15px;
            max-width: 420px;
        }

        .pos-feature-list {
            margin-top: 28px;
            display: grid;
            gap: 12px;
        }

        .pos-feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255,255,255,0.08);
            padding: 12px 14px;
            border-radius: 14px;
            color: #e5e7eb;
            font-size: 14px;
        }

        .pos-feature-item i {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            background: rgba(16, 185, 129, 0.18);
            color: #34d399;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .pos-left-bottom {
            font-size: 12px;
            color: #94a3b8;
        }

        .pos-login-right {
            padding: 52px 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
        }

        .pos-form-box {
            width: 100%;
            max-width: 430px;
        }

        .pos-badge {
            display: inline-block;
            padding: 8px 14px;
            background: #ecfdf5;
            color: #047857;
            font-size: 12px;
            font-weight: 700;
            border-radius: 999px;
            margin-bottom: 18px;
            letter-spacing: 0.3px;
        }

        .pos-form-box h3 {
            margin: 0 0 10px;
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .pos-form-box .pos-subtitle {
            margin: 0 0 32px;
            color: #6b7280;
            font-size: 15px;
            line-height: 1.6;
        }

        .pos-field {
            margin-bottom: 18px;
        }

        .pos-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: #374151;
        }

        .pos-input-wrap {
            position: relative;
        }

        .pos-input-icon-left {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 16px;
            z-index: 2;
            pointer-events: none;
        }

        .pos-password-toggle {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #6b7280;
            cursor: pointer;
            font-size: 17px;
            padding: 4px;
            z-index: 3;
        }

        .pos-password-toggle:focus {
            outline: none;
        }

        .pos-input {
            width: 100%;
            height: 54px;
            border: 1px solid #d1d5db;
            border-radius: 14px;
            background: #f9fafb;
            padding: 0 48px 0 48px;
            font-size: 14px;
            color: #111827;
            transition: all 0.2s ease;
        }

        .pos-input.pos-no-right-icon {
            padding-right: 16px;
        }

        .pos-input:focus {
            outline: none;
            border-color: #10b981;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.12);
        }

        .pos-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin: 10px 0 22px;
            flex-wrap: wrap;
        }

        .pos-remember {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #4b5563;
            cursor: pointer;
            user-select: none;
        }

        .pos-remember input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #10b981;
            cursor: pointer;
        }

        .pos-forgot {
            font-size: 13px;
            color: #059669;
            text-decoration: none;
            font-weight: 600;
        }

        .pos-forgot:hover {
            text-decoration: underline;
            color: #047857;
        }

        .pos-btn-login {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: #ffffff;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 14px 26px rgba(16, 185, 129, 0.22);
        }

        .pos-btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 30px rgba(16, 185, 129, 0.28);
        }

        .pos-btn-login i {
            margin-right: 8px;
        }

        .pos-form-footer {
            margin-top: 28px;
            text-align: center;
            font-size: 13px;
            color: #9ca3af;
            line-height: 1.6;
        }

        .pos-mobile-brand {
            display: none;
            margin-bottom: 22px;
        }

        .pos-mobile-brand .pos-brand {
            justify-content: center;
        }

        @media (max-width: 991px) {
            .pos-login-card {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .pos-login-left {
                display: none;
            }

            .pos-login-right {
                padding: 38px 26px;
            }

            .pos-mobile-brand {
                display: block;
            }

            .pos-form-box {
                max-width: 100%;
            }

            .pos-form-box h3,
            .pos-form-box .pos-subtitle {
                text-align: center;
            }

            .pos-badge {
                display: table;
                margin: 0 auto 18px;
            }
        }

        @media (max-width: 576px) {
            body.pos-login-page {
                padding: 18px 10px;
            }

            .pos-login-card {
                border-radius: 22px;
            }

            .pos-login-right {
                padding: 28px 18px;
            }

            .pos-form-box h3 {
                font-size: 24px;
            }

            .pos-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .pos-btn-login {
                font-size: 16px;
            }
        }
    </style>
</head>
<body class="pos-login-page">

    <div class="pos-login-wrapper">
        <div class="pos-login-card">

            <div class="pos-login-left">
                <div class="pos-left-top">
                    <div class="pos-brand">
                        <div class="pos-brand-icon">
                            <i class="fa fa-shopping-bag"></i>
                        </div>
                        <div class="pos-brand-text">
                            <h2>Aplikasi POS</h2>
                            <p>Point of Sale & Inventory System</p>
                        </div>
                    </div>
                </div>

                <div class="pos-left-middle">
                    <h1>Kelola transaksi dan stok lebih mudah.</h1>
                   

                    <div class="pos-feature-list">
                        <div class="pos-feature-item">
                            <i class="fa fa-cubes"></i>
                            <span>Manajemen stok dan data barang</span>
                        </div>
                        <div class="pos-feature-item">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Pencatatan transaksi penjualan</span>
                        </div>
                        <div class="pos-feature-item">
                            <i class="fa fa-file-text-o"></i>
                            <span>Laporan barang dan penjualan</span>
                        </div>
                    </div>
                </div>

                <div class="pos-left-bottom">
                    © <?= date('Y') ?> Aplikasi POS — Sistem Informasi Penjualan dan Persediaan Barang
                </div>
            </div>

            <div class="pos-login-right">
                <div class="pos-form-box">

                    <div class="pos-mobile-brand">
                        <div class="pos-brand">
                            <div class="pos-brand-icon">
                                <i class="fa fa-shopping-bag"></i>
                            </div>
                            <div class="pos-brand-text">
                                <h2 style="color:#111827;">Aplikasi POS</h2>
                                <p style="color:#6b7280;">Point of Sale & Inventory System</p>
                            </div>
                        </div>
                    </div>

                    <span class="pos-badge">POS SYSTEM</span>
                    <h3>Masuk Akun</h3>
                    <p class="pos-subtitle">Silakan login untuk mengakses dashboard kasir.</p>

                    <form action="<?= base_url('/Home/aksi_login/') ?>" method="post" id="loginForm">
                        <div class="pos-field">
                            <label class="pos-label">Username</label>
                            <div class="pos-input-wrap">
                                <i class="fa fa-user pos-input-icon-left"></i>
                                <input type="text" name="u" id="username" class="pos-input pos-no-right-icon" placeholder="Masukkan username" required>
                            </div>
                        </div>

                        <div class="pos-field">
                            <label class="pos-label">Password</label>
                            <div class="pos-input-wrap">
                                <i class="fa fa-lock pos-input-icon-left"></i>
                                <input type="password" name="p" id="password" class="pos-input" placeholder="Masukkan password" required>
                                <button type="button" class="pos-password-toggle" id="togglePassword" aria-label="Tampilkan Password">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="pos-row">
                            <label class="pos-remember">
                                <input type="checkbox" id="rememberMe">
                                <span>Remember me</span>
                            </label>

                           
                        </div>

                        <button type="submit" class="pos-btn-login">
                            <i class="fa fa-sign-in"></i> Login
                        </button>
                    </form>

                    <div class="pos-form-footer">
                        Sistem Informasi Penjualan dan Persediaan Barang
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Toggle show/hide password
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

            this.innerHTML = isPassword
                ? '<i class="fa fa-eye-slash"></i>'
                : '<i class="fa fa-eye"></i>';
        });

        // Remember me (lebih aman: simpan username saja)
        const usernameInput = document.getElementById('username');
        const rememberMe = document.getElementById('rememberMe');
        const loginForm = document.getElementById('loginForm');

        window.addEventListener('load', function () {
            const savedUsername = localStorage.getItem('remember_username');
            const savedRemember = localStorage.getItem('remember_me');

            if (savedRemember === 'true' && savedUsername) {
                usernameInput.value = savedUsername;
                rememberMe.checked = true;
            }
        });

        loginForm.addEventListener('submit', function () {
            if (rememberMe.checked) {
                localStorage.setItem('remember_username', usernameInput.value);
                localStorage.setItem('remember_me', 'true');
            } else {
                localStorage.removeItem('remember_username');
                localStorage.removeItem('remember_me');
            }
        });
    </script>

</body>
</html>
