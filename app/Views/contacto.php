<?php echo view('templates/header', [
    'titulo'      => 'Contacto y reservas | Barco Vikingo – Crucero Impakucha',
    'descripcion' => 'Contáctanos o reserva tu paseo en el Barco Vikingo, lago San Pablo, Otavalo. Teléfono, correo, horario y ubicación en el mapa.',
]); ?>

<section class="page-hero">
    <h1>Contacto</h1>
    <p>¿Tienes alguna consulta o deseas hacer una reserva?</p>
</section>

<section class="contacto-content">
    <div class="contacto-info" data-aos="fade-right">
        <h2>Información de Contacto</h2>
        <p>📍 Lago San Pablo, cantón Otavalo, Ecuador</p>
        <p>📞 +593 986536438</p>
        <p>📧 cruceroimbacucha@gmail.com</p>
        <p>🕐 Horario: Lunes a Domingo 8:00 - 18:00</p>

        <h2>Ubicación</h2>
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2339.741802455457!2d-78.20783967108382!3d0.20599043236900128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2a134d8adbe2bb%3A0xab9a3927f4953159!2sAsociaci%C3%B3n%20de%20turismo%20LA%20Garza!5e0!3m2!1ses-419!2sec!4v1785106395353!5m2!1ses-419!2sec"
        width="100%"
        height="250"
        style="border:0; border-radius:10px;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="strict-origin-when-cross-origin">
        </iframe>
    </div>

    <div class="contacto-formularios" data-aos="fade-left">

        <!-- PESTAÑAS -->
        <div class="tabs">
            <button class="tab-btn active" onclick="mostrarTab('contacto-tab')">📩 Contacto / Reserva</button>
            <button class="tab-btn" onclick="mostrarTab('testimonio-tab')">⭐ Testimonio</button>
        </div>

        <!-- TAB CONTACTO/RESERVA -->
        <div id="contacto-tab" class="tab-content active">
            <h2>Escríbenos</h2>

            <?php if (session()->getFlashdata('success_contacto')): ?>
                <div class="alert-success"><?= session()->getFlashdata('success_contacto') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors_contacto')): ?>
                <div class="alert-error">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors_contacto') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('enviarContacto') ?>" method="post">
                <?= csrf_field() ?>

                <!-- SELECTOR TIPO -->
                <div class="form-group">
                    <label>¿Qué deseas hacer?</label>
                    <div class="tipo-selector">
                        <label class="tipo-option">
                            <input type="radio" name="tipo" value="consulta" checked onchange="toggleReserva(this.value)">
                            <span>💬 Consulta general</span>
                        </label>
                        <label class="tipo-option">
                            <input type="radio" name="tipo" value="reserva" onchange="toggleReserva(this.value)">
                            <span>🚢 Reservar paseo</span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nombre completo:</label>
                    <input type="text" name="nombre" placeholder="Tu nombre completo" value="<?= old('nombre') ?>" required>
                </div>
                <div class="form-group">
                    <label>Correo electrónico:</label>
                    <input type="email" name="correo" placeholder="Tu correo electrónico" value="<?= old('correo') ?>" required>
                </div>
                <div class="form-group">
                    <label>Teléfono:</label>
                    <input type="tel" name="telefono" placeholder="Tu número de teléfono" value="<?= old('telefono') ?>">
                </div>

                <!-- CAMPOS SOLO PARA RESERVA -->
                <div id="campos-reserva" style="display:none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Fecha del paseo:</label>
                            <input type="date" name="fecha_paseo" value="<?= old('fecha_paseo') ?>">
                        </div>
                        <div class="form-group">
                            <label>Hora del paseo:</label>
                            <input type="time" name="hora_paseo" value="<?= old('hora_paseo') ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Número de personas:</label>
                            <input type="number" name="num_personas" placeholder="¿Cuántas personas?" min="1" value="<?= old('num_personas') ?>">
                        </div>
                        <div class="form-group">
                            <label>Tipo de servicio:</label>
                            <select name="tipo_servicio">
                                <option value="">Selecciona un servicio</option>
                                <option value="paseo_normal">Paseo Normal</option>
                                <option value="evento_especial">Evento Especial</option>
                                <option value="lancha_rentada">Lancha Rentada</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Mensaje / Observaciones:</label>
                    <textarea name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí..." required><?= old('mensaje') ?></textarea>
                </div>

                <button type="submit" class="btn-enviar">Enviar 📨</button>
            </form>
        </div>

        <!-- TAB TESTIMONIO -->
        <div id="testimonio-tab" class="tab-content">
            <h2>Deja tu Testimonio</h2>

            <?php if (session()->getFlashdata('success_testimonio')): ?>
                <div class="alert-success"><?= session()->getFlashdata('success_testimonio') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors_testimonio')): ?>
                <div class="alert-error">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors_testimonio') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('enviarTestimonio') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label>Nombre completo:</label>
                    <input type="text" name="nombre" placeholder="Tu nombre" required>
                </div>
                <div class="form-group">
                    <label>Correo electrónico (opcional):</label>
                    <input type="email" name="correo" placeholder="Tu correo">
                </div>
                <div class="form-group">
                    <label>Calificación:</label>
                    <select name="calificacion" required>
                        <option value="">Selecciona tu calificación</option>
                        <option value="5">⭐⭐⭐⭐⭐ Excelente</option>
                        <option value="4">⭐⭐⭐⭐ Muy bueno</option>
                        <option value="3">⭐⭐⭐ Bueno</option>
                        <option value="2">⭐⭐ Regular</option>
                        <option value="1">⭐ Malo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Comentario:</label>
                    <textarea name="comentario" rows="4" placeholder="Cuéntanos tu experiencia..." required></textarea>
                </div>
                <button type="submit" class="btn-enviar">Enviar Testimonio ⭐</button>
            </form>
        </div>

    </div>
</section>

<?php echo view('templates/footer'); ?>

<script>
function mostrarTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');
    event.target.classList.add('active');
}

function toggleReserva(valor) {
    const campos = document.getElementById('campos-reserva');
    campos.style.display = valor === 'reserva' ? 'block' : 'none';
}
</script>