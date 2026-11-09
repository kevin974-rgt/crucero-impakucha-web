<?php echo view('templates/header', [
    'titulo'      => 'Barco Vikingo – Crucero Impakucha | Paseos en el Lago San Pablo',
    'descripcion' => 'Paseos en el Barco Vikingo (Crucero Impakucha), embarcación de dos pisos en el lago San Pablo, Otavalo. Conoce servicios, tarifas y galería, y reserva tu paseo.',
]); ?>

<section class="hero">
    <div class="hero-content">
        <h1>Barco Vikingo</h1>
        <p>Vive una experiencia única en el lago San Pablo, Otavalo - Ecuador</p>
        <a href="<?= base_url('contacto') ?>" class="btn">
            Reserva tu paseo
        </a>
    </div>
</section>

<section class="experiencias">

    <div class="titulo-seccion">
        <h2>Nuestras Experiencias</h2>
        <p>Descubre todo lo que te espera a bordo del Barco Vikingo.</p>
    </div>

    <div class="grid-experiencias">

        <div class="card-img">
            <img src="<?= base_url('assets/img/img3.jpeg') ?>" alt="Paseo en crucero por el lago San Pablo">

            <div class="overlay">
                <h3>🚢 Paseos en Crucero</h3>
                <p>Recorre el Lago San Pablo con vistas espectaculares.</p>
            </div>
        </div>

        <div class="card-img">
            <img src="<?= base_url('assets/img/img24.png') ?>" alt="Atardecer en el lago San Pablo junto al volcán Imbabura">

            <div class="overlay">
                <h3>🌄 Atardeceres</h3>
                <p>Disfruta de los mejores paisajes junto al volcán Imbabura.</p>
            </div>
        </div>

        <div class="card-img">
            <img src="<?= base_url('assets/img/img5.jpeg') ?>" alt="Familia disfrutando del paseo en el Barco Vikingo">

            <div class="overlay">
                <h3>👨‍👩‍👧‍👦 Para toda la familia</h3>
                <p>Momentos inolvidables para grandes y pequeños.</p>
            </div>
        </div>

    </div>

</section>

<?php
$datosEstructurados = [
    '@context'    => 'https://schema.org',
    '@type'       => 'TouristAttraction',
    'name'        => 'Barco Vikingo - Crucero Impakucha',
    'description' => 'Crucero turistico de dos pisos que recorre el lago San Pablo, en Otavalo, Ecuador.',
    'url'         => base_url(),
    'image'       => base_url('assets/img/hero.jpg'),
    'telephone'   => '+593986536438',
    'address'     => [
        '@type'           => 'PostalAddress',
        'addressLocality' => 'San Pablo del Lago, Otavalo',
        'addressRegion'   => 'Imbabura',
        'addressCountry'  => 'EC',
    ],
    'geo' => [
        '@type'     => 'GeoCoordinates',
        'latitude'  => 0.2059904,
        'longitude' => -78.2078397,
    ],
];
?>
<script type="application/ld+json"><?= json_encode($datosEstructurados, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>

<?php echo view('templates/footer'); ?>