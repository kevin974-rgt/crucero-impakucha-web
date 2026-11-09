<?php echo view('templates/header', [
    'titulo'      => 'Reservas | Barco Vikingo – Crucero Impakucha',
    'descripcion' => 'Reserva tu paseo en el Barco Vikingo – Crucero Impakucha, en el lago San Pablo (Otavalo, Ecuador).',
]); ?>

<section class="page-hero">
    <h1>Reservas</h1>
    <p>Reserva tu paseo en el Crucero Imbacucha</p>
</section>

<section class="reservas-content">
    <div class="reservas-form" data-aos="fade-up">
        <h2>Solicitar Reserva</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert-error">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('enviarReserva') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-row">
                <div class="form-group">
                    <label>Nombre completo:</label>
                    <input type="text" name="nombre" placeholder="Tu nombre completo" value="<?= old('nombre') ?>" required>
                </div>
                <div class="form-group">
                    <label>Correo electrónico:</label>
                    <input type="email" name="correo" placeholder="Tu correo electrónico" value="<?= old('correo') ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Teléfono:</label>
                    <input type="tel" name="telefono" placeholder="Tu número de teléfono" value="<?= old('telefono') ?>" required>
                </div>
                <div class="form-group">
                    <label>Número de personas:</label>
                    <input type="number" name="num_personas" placeholder="¿Cuántas personas?" min="1" value="<?= old('num_personas') ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Fecha del paseo:</label>
                    <input type="date" name="fecha_paseo" value="<?= old('fecha_paseo') ?>" required>
                </div>
                <div class="form-group">
                    <label>Hora del paseo:</label>
                    <input type="time" name="hora_paseo" value="<?= old('hora_paseo') ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label>Tipo de servicio:</label>
                <select name="tipo_servicio" required>
                    <option value="">Selecciona un servicio</option>
                    <option value="paseo_normal" <?= old('tipo_servicio') == 'paseo_normal' ? 'selected' : '' ?>>Paseo Normal</option>
                    <option value="evento_especial" <?= old('tipo_servicio') == 'evento_especial' ? 'selected' : '' ?>>Evento Especial</option>
                    <option value="lancha_rentada" <?= old('tipo_servicio') == 'lancha_rentada' ? 'selected' : '' ?>>Lancha Rentada</option>
                </select>
            </div>
            <div class="form-group">
                <label>Observaciones:</label>
                <textarea name="observaciones" rows="4" placeholder="Alguna observación adicional..."><?= old('observaciones') ?></textarea>
            </div>
            <button type="submit" class="btn-enviar">Enviar Reserva 🚢</button>
        </form>
    </div>
</section>

<?php echo view('templates/footer'); ?>