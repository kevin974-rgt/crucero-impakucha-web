<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - Barco Vikingo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f5f1e8;
            min-height: 100vh;
        }

        .admin-header {
            background: linear-gradient(135deg, #0d3350 0%, #0b2c44 55%, #163a4a 100%);
            color: #f7f4ec;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        }

        .admin-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-header > div {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
        }

        .admin-header .usuario {
            font-size: 14px;
            opacity: 0.9;
        }

        .admin-header a {
            color: #0b2c44;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            background: linear-gradient(135deg, #e0c374, #caab45);
            padding: 9px 18px;
            border-radius: 30px;
            transition: 0.25s;
            white-space: nowrap;
        }

        .admin-header a:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(202,171,69,0.4);
        }

        @media (max-width: 600px) {
            .admin-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
                padding: 15px 20px;
            }

            .admin-header h1 {
                font-size: 18px;
            }

            .admin-content {
                padding: 20px;
            }
        }

        .admin-content {
            padding: 40px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .bienvenida {
            background: #ffffff;
            padding: 24px 30px;
            border-radius: 14px;
            border-left: 5px solid #caab45;
            box-shadow: 0 2px 14px rgba(11,44,68,0.08);
            margin-bottom: 30px;
        }

        .bienvenida h2 {
            color: #0b2c44;
            font-family: 'Playfair Display', serif;
            font-size: 21px;
            margin-bottom: 4px;
        }

        .bienvenida p {
            color: #8a8272;
            font-size: 14px;
        }

        .section-label {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: #8a8272;
            margin-bottom: 14px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 18px;
            margin-bottom: 36px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 20px 22px;
            box-shadow: 0 2px 14px rgba(11,44,68,0.08);
            border-top: 4px solid #caab45;
        }

        .stat-card .stat-numero {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: #0b2c44;
            line-height: 1;
            margin-bottom: 6px;
        }

        .stat-card .stat-label {
            font-size: 13px;
            color: #8a8272;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
            gap: 20px;
        }

        .card {
            background: #ffffff;
            padding: 32px 20px;
            border-radius: 14px;
            text-align: center;
            box-shadow: 0 2px 14px rgba(11,44,68,0.08);
            text-decoration: none;
            color: #0b2c44;
            transition: 0.25s;
            border: 1px solid transparent;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 26px rgba(11,44,68,0.15);
            border-color: #caab45;
        }

        .card .icon-badge {
            width: 62px;
            height: 62px;
            margin: 0 auto 16px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f0e2b8, #caab45);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <h1>⚓ Panel de Administración</h1>
        <div>
            <span class="usuario">👤 <?= session()->get('admin_nombre') ?></span>
            <a href="<?= base_url('admin/cerrarSesion') ?>">Cerrar Sesión</a>
        </div>
    </div>

    <div class="admin-content">
        <div class="bienvenida">
            <h2>Bienvenida, <?= session()->get('admin_nombre') ?> 👋</h2>
            <p>Desde aquí puedes gestionar el contenido del sitio web del Barco Vikingo.</p>
        </div>

        <div class="section-label">Resumen rápido</div>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-numero"><?= $totalMensajes ?></div>
                <div class="stat-label">📩 Mensajes recibidos</div>
            </div>
            <div class="stat-card">
                <div class="stat-numero"><?= $reservasPendientes ?></div>
                <div class="stat-label">🚢 Reservas pendientes</div>
            </div>
            <div class="stat-card">
                <div class="stat-numero"><?= $testimoniosPendientes ?></div>
                <div class="stat-label">⭐ Testimonios por revisar</div>
            </div>
            <div class="stat-card">
                <div class="stat-numero"><?= $totalArchivos ?></div>
                <div class="stat-label">🖼️ Archivos en galería</div>
            </div>
        </div>

        <div class="section-label">Gestión del sitio</div>
        <div class="cards-grid">
            <a href="<?= base_url('admin/mensajes') ?>" class="card">
                <div class="icon-badge">📩</div>
                <h3>Mensajes</h3>
            </a>
            <a href="<?= base_url('admin/reservas') ?>" class="card">
                <div class="icon-badge">🚢</div>
                <h3>Reservas</h3>
            </a>
            <a href="<?= base_url('admin/testimonios') ?>" class="card">
                <div class="icon-badge">⭐</div>
                <h3>Testimonios</h3>
            </a>
            <a href="<?= base_url('admin/galeria') ?>" class="card">
                <div class="icon-badge">🖼️</div>
                <h3>Galería</h3>
            </a>
            <a href="<?= base_url() ?>" class="card">
                <div class="icon-badge">🌐</div>
                <h3>Ver Sitio Web</h3>
            </a>
        </div>
    </div>
</body>
</html>