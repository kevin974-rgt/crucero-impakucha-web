<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonios - Barco Vikingo</title>
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
        }

        .admin-header > div {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
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
        }

        .content {
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        @media (max-width: 600px) {
            .content {
                padding: 20px;
            }
        }

        .content h2 {
            font-family: 'Playfair Display', serif;
            color: #0b2c44;
            margin-bottom: 25px;
            font-size: 26px;
        }

        .alert-success {
            background-color: #eef7ec;
            color: #2f6b3a;
            border: 1px solid #cfe8d1;
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .testimonios-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }

        .testimonio-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 2px 14px rgba(11,44,68,0.08);
            border-top: 4px solid #caab45;
        }

        .testimonio-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .testimonio-nombre {
            font-weight: 700;
            color: #0b2c44;
            font-size: 16px;
            font-family: 'Playfair Display', serif;
        }

        .testimonio-fecha {
            font-size: 12px;
            color: #8a8272;
        }

        .estrellas {
            color: #caab45;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .testimonio-comentario {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .testimonio-correo {
            font-size: 12px;
            color: #8a8272;
            margin-bottom: 15px;
        }

        .estado-pendiente {
            background-color: #f7ecd0;
            color: #8a6d1f;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .estado-aprobado {
            background-color: #dcf0de;
            color: #2f6b3a;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .estado-rechazado {
            background-color: #f9dde1;
            color: #8a2333;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .acciones {
            display: flex;
            gap: 8px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .btn-aprobar {
            background-color: #3f9350;
            color: white;
            padding: 7px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.25s;
        }

        .btn-aprobar:hover { background-color: #327b41; }

        .btn-rechazar {
            background: linear-gradient(135deg, #e0c374, #caab45);
            color: #0b2c44;
            padding: 7px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.25s;
        }

        .btn-rechazar:hover { box-shadow: 0 4px 10px rgba(202,171,69,0.4); }

        .btn-eliminar {
            background-color: #c0394a;
            color: white;
            padding: 7px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.25s;
        }

        .btn-eliminar:hover { background-color: #a12f3d; }

        .form-accion {
            display: inline;
            margin: 0;
        }

        button.btn-aprobar,
        button.btn-rechazar,
        button.btn-eliminar {
            font-family: inherit;
        }

        .no-testimonios {
            text-align: center;
            padding: 50px;
            color: #8a8272;
            font-size: 16px;
            background: #ffffff;
            border-radius: 14px;
        }

        .volver {
            display: inline-block;
            margin-bottom: 20px;
            color: #0b2c44;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        .volver:hover { color: #caab45; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="admin-header">
        <h1>⚓ Panel de Administración</h1>
        <div>
            <span>👤 <?= session()->get('admin_nombre') ?> &nbsp;</span>
            <a href="<?= base_url('admin/cerrarSesion') ?>">Cerrar Sesión</a>
        </div>
    </div>

    <div class="content">
        <a href="<?= base_url('admin/panel') ?>" class="volver">← Volver al panel</a>
        <h2>⭐ Testimonios Recibidos</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($testimonios)): ?>
        <div class="testimonios-grid">
            <?php foreach ($testimonios as $t): ?>
            <div class="testimonio-card">
                <div class="testimonio-header">
                    <span class="testimonio-nombre">👤 <?= $t['nombre'] ?></span>
                    <span class="estado-<?= $t['estado'] ?>"><?= ucfirst($t['estado']) ?></span>
                </div>
                <div class="estrellas">
                    <?= str_repeat('⭐', $t['calificacion']) ?>
                </div>
                <p class="testimonio-comentario"><?= $t['comentario'] ?></p>
                <p class="testimonio-correo">📧 <?= $t['correo'] ?? '-' ?></p>
                <p class="testimonio-fecha">📅 <?= $t['fecha'] ?></p>
                <div class="acciones">
                    <?php if ($t['estado'] == 'pendiente'): ?>
                        <form action="<?= base_url('admin/aprobarTestimonio/' . $t['id']) ?>" method="post" class="form-accion">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn-aprobar">✅ Aprobar</button>
                        </form>
                        <form action="<?= base_url('admin/rechazarTestimonio/' . $t['id']) ?>" method="post" class="form-accion">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn-rechazar">❌ Rechazar</button>
                        </form>
                    <?php endif; ?>
                    <form action="<?= base_url('admin/eliminarTestimonio/' . $t['id']) ?>" method="post" class="form-accion"
                          onsubmit="return confirm('¿Eliminar este testimonio?')">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn-eliminar">🗑️ Eliminar</button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <div class="no-testimonios">
                📭 No hay testimonios recibidos aún.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>