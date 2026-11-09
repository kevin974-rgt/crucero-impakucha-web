<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería - Barco Vikingo</title>
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

        .alert-error {
            background-color: #f9dde1;
            color: #8a2333;
            border: 1px solid #f3c2ca;
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .subir-card {
            background: #ffffff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 2px 14px rgba(11,44,68,0.08);
            margin-bottom: 40px;
            border-left: 5px solid #caab45;
        }

        .subir-card h3 {
            color: #0b2c44;
            margin-bottom: 20px;
            font-size: 18px;
            font-family: 'Playfair Display', serif;
        }

        .upload-area {
            border: 3px dashed #caab45;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
            background-color: #faf7ee;
        }

        .upload-area:hover {
            background-color: #f5efd9;
        }

        .upload-area .icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .upload-area p {
            color: #8a8272;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .upload-area input[type="file"] {
            display: none;
        }

        .btn-seleccionar {
            background: #0b2c44;
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-seleccionar:hover {
            background: #163a4a;
        }

        .archivo-seleccionado {
            margin-top: 15px;
            font-size: 14px;
            color: #0b2c44;
            font-weight: 600;
        }

        .btn-subir {
            display: block;
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #e0c374, #caab45);
            color: #0b2c44;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            transition: 0.25s;
            margin-top: 20px;
        }

        .btn-subir:hover {
            box-shadow: 0 6px 16px rgba(202,171,69,0.4);
        }

        .galeria-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .archivo-card {
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 14px rgba(11,44,68,0.08);
            transition: 0.25s;
        }

        .archivo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 24px rgba(11,44,68,0.15);
        }

        .archivo-preview {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .archivo-preview-video {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background-color: #000;
        }

        .archivo-info {
            padding: 15px;
        }

        .archivo-nombre {
            font-size: 12px;
            color: #8a8272;
            margin-bottom: 10px;
            word-break: break-all;
        }

        .archivo-tipo {
            font-size: 11px;
            padding: 3px 8px;
            border-radius: 20px;
            margin-bottom: 10px;
            display: inline-block;
        }

        .tipo-imagen {
            background-color: #dcf0de;
            color: #2f6b3a;
        }

        .tipo-video {
            background-color: #e4edf5;
            color: #0b2c44;
        }

        .btn-eliminar {
            display: block;
            width: 100%;
            padding: 8px;
            background-color: #c0394a;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            transition: 0.25s;
            text-align: center;
            text-decoration: none;
        }

        .btn-eliminar:hover {
            background-color: #a12f3d;
        }

        .form-accion {
            margin: 0;
        }

        .no-archivos {
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

        .contador {
            background: #0b2c44;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 13px;
            margin-left: 10px;
        }
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
        <h2>🖼️ Gestión de Galería 
            <span class="contador"><?= count($archivos) ?> archivos</span>
        </h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success">✅ <?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert-error">❌ <?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- SUBIR ARCHIVO -->
        <div class="subir-card">
            <h3>➕ Subir nueva foto o video</h3>
            <form action="<?= base_url('admin/subirArchivo') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="upload-area" onclick="document.getElementById('archivo').click()">
                    <div class="icon">📁</div>
                    <p>Haz clic para seleccionar una foto o video<br>
                    <small>Formatos permitidos: JPG, PNG, MP4</small></p>
                    <span class="btn-seleccionar">Seleccionar archivo</span>
                    <input type="file" id="archivo" name="archivo" accept=".jpg,.jpeg,.png,.mp4" onchange="mostrarNombre(this)">
                    <div class="archivo-seleccionado" id="nombre-archivo"></div>
                </div>
                <button type="submit" class="btn-subir">⬆️ Subir archivo</button>
            </form>
        </div>

        <!-- GALERÍA ACTUAL -->
        <h2>📸 Archivos en la Galería</h2>

        <?php if (!empty($archivos)): ?>
        <div class="galeria-grid">
            <?php foreach ($archivos as $archivo): ?>
            <div class="archivo-card">
                <?php if (strpos($archivo['tipo'], 'video') !== false): ?>
                    <video class="archivo-preview-video" controls>
                        <source src="<?= base_url($archivo['ruta']) ?>" type="<?= $archivo['tipo'] ?>">
                    </video>
                <?php else: ?>
                    <img src="<?= base_url($archivo['ruta']) ?>" 
                         alt="Foto galería" 
                         class="archivo-preview">
                <?php endif; ?>
                <div class="archivo-info">
                    <div class="archivo-tipo <?= strpos($archivo['tipo'], 'video') !== false ? 'tipo-video' : 'tipo-imagen' ?>">
                        <?= strpos($archivo['tipo'], 'video') !== false ? '🎥 Video' : '📸 Imagen' ?>
                    </div>
                    <p class="archivo-nombre"><?= $archivo['nombre_archivo'] ?></p>
                    <form action="<?= base_url('admin/eliminarArchivo/' . $archivo['id']) ?>" method="post" class="form-accion"
                          onsubmit="return confirm('¿Estás seguro de eliminar este archivo?')">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn-eliminar">🗑️ Eliminar</button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <div class="no-archivos">
                📭 No hay archivos en la galería aún. ¡Sube tu primera foto!
            </div>
        <?php endif; ?>
    </div>

    <script>
        function mostrarNombre(input) {
            const nombre = input.files[0] ? input.files[0].name : '';
            document.getElementById('nombre-archivo').textContent = nombre ? '✅ Archivo seleccionado: ' + nombre : '';
        }
    </script>
</body>
</html>