<?php echo view('templates/header', [
    'titulo'      => 'Galería de fotos y videos | Barco Vikingo – Crucero Impakucha',
    'descripcion' => 'Fotos y videos del Barco Vikingo (Crucero Impakucha) y del lago San Pablo, en Otavalo, Ecuador.',
]); ?>

<section class="page-hero">
    <h1>Galería</h1>
    <p>Conoce nuestras instalaciones y recorridos</p>
</section>

<section class="galeria-content">

    <?php
    $imagenes = array_filter($archivos, fn($a) => strpos($a['tipo'], 'image') !== false);
    $imagenes = array_values($imagenes);
    $videos = array_filter($archivos, fn($a) => strpos($a['tipo'], 'video') !== false);
    ?>

    <?php if (!empty($imagenes)): ?>
    <div class="slider-container">

        <!-- FOTOS -->
        <div class="slider-track">
            <?php foreach ($imagenes as $i => $imagen): ?>
            <div class="slide <?= $i === 0 ? 'active' : '' ?>" 
                style="background-image: url('<?= base_url($imagen['ruta']) ?>')">
                <img src="<?= base_url($imagen['ruta']) ?>"
                     alt="Barco Vikingo - Crucero Impakucha en el lago San Pablo">
            </div>
            <?php endforeach; ?>
        </div>

        <!-- BOTONES -->
        <button class="slider-btn prev" onclick="cambiarSlide(-1)">&#10094;</button>
        <button class="slider-btn next" onclick="cambiarSlide(1)">&#10095;</button>

        <!-- PUNTITOS -->
        <div class="slider-dots">
            <?php foreach ($imagenes as $i => $imagen): ?>
            <span class="dot <?= $i === 0 ? 'active' : '' ?>"
                  onclick="irASlide(<?= $i ?>)"></span>
            <?php endforeach; ?>
        </div>

    </div>
    <?php endif; ?>

    <?php if (!empty($videos)): ?>
    <h2 style="text-align:center; color:var(--color-principal); margin-top:60px; margin-bottom:25px;">Videos</h2>
    <?php foreach ($videos as $video): ?>
    <div class="video-container">
        <video controls>
            <source src="<?= base_url($video['ruta']) ?>" type="<?= $video['tipo'] ?>">
        </video>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>

</section>

<script>
    let slideActual = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');

    function mostrarSlide(n) {
        slides.forEach(s => s.classList.remove('active'));
        dots.forEach(d => d.classList.remove('active'));

        slideActual = (n + slides.length) % slides.length;

        slides[slideActual].classList.add('active');
        dots[slideActual].classList.add('active');
    }

    function cambiarSlide(direccion) {
        mostrarSlide(slideActual + direccion);
    }

    function irASlide(n) {
        mostrarSlide(n);
    }

    // Cambio automático cada 5 segundos
    setInterval(() => cambiarSlide(1), 5000);
</script>

<?php echo view('templates/footer'); ?>