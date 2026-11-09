<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes - Barco Vikingo</title>
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
            max-width: 1100px;
            margin: 0 auto;
        }

        @media (max-width: 600px) {
            .content {
                padding: 20px;
            }
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 14px;
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

        table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 14px rgba(11,44,68,0.08);
        }

        @media (max-width: 600px) {
            thead th,
            tbody td {
                padding: 10px 12px;
                font-size: 13px;
            }
        }

        thead {
            background: linear-gradient(135deg, #0d3350, #0b2c44);
            color: #f7f4ec;
        }

        thead th {
            padding: 15px 20px;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
        }

        tbody tr {
            border-bottom: 1px solid #f0ece1;
            transition: 0.2s;
        }

        tbody tr:hover {
            background-color: #faf7ee;
        }

        tbody td {
            padding: 15px 20px;
            font-size: 14px;
            color: #2c2a26;
        }

        .btn-eliminar {
            background-color: #c0394a;
            color: white;
            border: none;
            padding: 7px 14px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: 0.25s;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-eliminar:hover {
            background-color: #a12f3d;
        }

        .form-accion {
            display: inline;
            margin: 0;
        }

        button.btn-eliminar {
            font-family: inherit;
        }

        .no-mensajes {
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
        <h2>📩 Mensajes Recibidos</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($mensajes)): ?>
        <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mensajes as $mensaje): ?>
                <tr>
                    <td><?= $mensaje['id'] ?></td>
                    <td><?= $mensaje['nombre'] ?></td>
                    <td><?= $mensaje['correo'] ?></td>
                    <td><?= $mensaje['telefono'] ?? '-' ?></td>
                    <td><?= substr($mensaje['mensaje'], 0, 80) ?>...</td>
                    <td><?= $mensaje['fecha'] ?></td>
                    <td>
                        <form action="<?= base_url('admin/eliminarMensaje/' . $mensaje['id']) ?>" method="post" class="form-accion"
                              onsubmit="return confirm('¿Estás seguro de eliminar este mensaje?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn-eliminar">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <?php else: ?>
            <div class="no-mensajes">
                📭 No hay mensajes recibidos aún.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>