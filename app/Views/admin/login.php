<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Barco Vikingo</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Outfit', sans-serif;
            background: radial-gradient(circle at 20% 20%, #0d3350 0%, #071c2b 55%, #050f18 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .login-card {
            background: #f7f4ec;
            border-radius: 22px;
            box-shadow: 0 25px 70px rgba(0,0,0,0.45);
            width: 100%;
            max-width: 400px;
            overflow: hidden;
        }

        
        .login-photo {
            position: relative;
            height: 190px;
            background: url('<?= base_url('assets/img/img10.png') ?>') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .login-photo::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(6,20,32,0.15) 0%, rgba(6,20,32,0.65) 100%);
        }

        .login-photo-content {
            position: relative;
            z-index: 1;
            color: #f7f4ec;
        }

        .login-photo .emoji {
            font-size: 42px;
            margin-bottom: 8px;
        }

        .login-photo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .login-badge-wrap {
            display: flex;
            justify-content: center;
            margin-top: -22px;
            position: relative;
            z-index: 2;
        }

        .login-badge {
            background: linear-gradient(135deg, #e0c374, #caab45);
            color: #0b2c44;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 0.5px;
            padding: 10px 26px;
            border-radius: 30px;
            box-shadow: 0 8px 20px rgba(202,171,69,0.35);
            text-transform: uppercase;
        }

        .login-body {
            padding: 30px 34px 34px;
        }

        .login-body > p {
            text-align: center;
            color: #7a7364;
            font-size: 13px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .input-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            border: 1px solid #e4ded0;
            border-radius: 30px;
            padding: 12px 20px;
            transition: 0.25s;
        }

        .input-wrap:focus-within {
            border-color: #caab45;
            box-shadow: 0 0 0 3px rgba(202,171,69,0.18);
        }

        .input-wrap .icon {
            font-size: 15px;
            opacity: 0.75;
        }

        .input-wrap input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 14px;
            font-family: 'Outfit', sans-serif;
            color: #2c2a26;
            background: transparent;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #e0c374, #caab45);
            color: #0b2c44;
            border: none;
            border-radius: 30px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            transition: 0.25s;
            margin-top: 8px;
            letter-spacing: 0.3px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(202,171,69,0.4);
        }

        .alert-error {
            background-color: #fbe3e6;
            color: #8a2333;
            border: 1px solid #f3c2ca;
            padding: 11px 16px;
            border-radius: 14px;
            margin-bottom: 18px;
            font-size: 13px;
            text-align: center;
        }

        .volver {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #0b2c44;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            opacity: 0.75;
        }

        .volver:hover { opacity: 1; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-photo">
            <div class="login-photo-content">
                <div class="emoji">⚓</div>
                <h1>Barco Vikingo</h1>
            </div>
        </div>

        <div class="login-badge-wrap">
            <div class="login-badge">🔒 Panel de administración</div>
        </div>

        <div class="login-body">
            <p>Ingresa tus credenciales para continuar</p>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-error">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/autenticar') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <div class="input-wrap">
                        <span class="icon">👤</span>
                        <input type="text" name="usuario" placeholder="Usuario" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-wrap">
                        <span class="icon">🔒</span>
                        <input type="password" name="contrasena" placeholder="Contraseña" required>
                    </div>
                </div>
                <button type="submit" class="btn-login">Iniciar sesión</button>
            </form>
            <a href="<?= base_url() ?>" class="volver">← Volver al sitio web</a>
        </div>
    </div>
</body>
</html>