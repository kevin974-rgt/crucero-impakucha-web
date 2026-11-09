<?php echo view('templates/header', [
    'titulo'      => 'Nuestra historia | Barco Vikingo – Crucero Impakucha',
    'descripcion' => 'Conoce la historia de la asociación del Crucero Impakucha y del Barco Vikingo, una iniciativa de turismo comunitario en el lago San Pablo, Otavalo.',
]); ?>

<!-- HERO -->
<section class="page-hero">
    <h1>Nuestra Historia</h1>
    <p>Un legado construido con trabajo, unión y amor por el Lago San Pablo.</p>
</section>

<!-- HISTORIA -->
<section class="historia">

    <div class="historia-titulo" data-aos="fade-up">
        <span>NUESTRA HISTORIA</span>
        <h2>Así nació el turismo en Araque</h2>

        <p>
            Antes de convertirse en uno de los destinos turísticos más visitados
            del Lago San Pablo, todo comenzó con un grupo de trabajadores que
            decidió luchar por un sueño.
        </p>
    </div>

    <div class="timeline">

        <!-- 1 -->
        <div class="timeline-item" data-aos="fade-right">

            <div class="timeline-img">
                <img src="<?= base_url('assets/img/img13.jpg') ?>" alt="Los inicios del Crucero Impakucha en el lago San Pablo">
            </div>

            <div class="timeline-texto">

                <span class="fecha">Los Inicios</span>

                <h3>Un sueño compartido</h3>

                <p>
                    Un grupo de trabajadores de la comunidad Araque decidió
                    organizarse con un mismo propósito: impulsar el turismo
                    comunitario y generar nuevas oportunidades para sus familias.
                </p>

            </div>

        </div>

        <!-- 2 -->

        <div class="timeline-item reverse" data-aos="fade-left">

            <div class="timeline-img">
                <img src="<?= base_url('assets/img/img14.jpg') ?>" alt="Las mingas de la asociación del Crucero Impakucha">
            </div>

            <div class="timeline-texto">

                <span class="fecha">Las Mingas</span>

                <h3>Trabajo en equipo</h3>

                <p>
                    Mediante mingas y jornadas comunitarias construyeron espacios,
                    mejoraron el entorno y trabajaron hombro a hombro para hacer
                    realidad un proyecto que beneficiaría a toda la comunidad.
                </p>

            </div>

        </div>

        <!-- 3 -->

        <div class="timeline-item" data-aos="fade-right">

            <div class="timeline-img">
                <img src="<?= base_url('assets/img/img15.jpg') ?>" alt="El crecimiento del Barco Vikingo en el lago San Pablo">
            </div>

            <div class="timeline-texto">

                <span class="fecha">El Crecimiento</span>

                <h3>Nace una nueva experiencia</h3>

                <p>
                    Con esfuerzo y perseverancia lograron consolidar el turismo
                    lacustre, dando origen a nuevos emprendimientos como el
                    Parque Acuático Araque y el reconocido Barco Vikingo Araque.
                </p>

            </div>

        </div>

        <!-- 4 -->

        <div class="timeline-item reverse" data-aos="fade-left">

            <div class="timeline-img">
                <img src="<?= base_url('assets/img/hero.jpg') ?>" alt="El Barco Vikingo en la actualidad">
            </div>

            <div class="timeline-texto">

                <span class="fecha">Actualidad</span>

                <h3>Un orgullo para Otavalo</h3>

                <p>
                    Hoy continúan recibiendo visitantes nacionales e
                    internacionales, compartiendo la belleza del Lago San Pablo
                    y demostrando que el trabajo comunitario puede transformar
                    una comunidad.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- MISION Y VISION -->

<section class="mision-vision">

    <div class="mv-card" data-aos="zoom-in">

        <h2>🎯 Nuestra Misión</h2>

        <p>
            Promover un turismo comunitario sostenible ofreciendo experiencias
            inolvidables y contribuyendo al desarrollo de la comunidad Araque.
        </p>

    </div>

    <div class="mv-card" data-aos="zoom-in" data-aos-delay="150">

        <h2>👁 Nuestra Visión</h2>

        <p>
            Ser un referente del turismo comunitario en el Ecuador,
            destacando por nuestra hospitalidad, cultura y compromiso
            con el medio ambiente.
        </p>

    </div>

</section>

<!-- VALORES -->

<section class="valores">

    <h2 data-aos="fade-up">Nuestros Valores</h2>

    <div class="valores-grid">

        <div data-aos="zoom-in">🤝<span>Trabajo en Equipo</span></div>

        <div data-aos="zoom-in" data-aos-delay="100">🌱<span>Sostenibilidad</span></div>

        <div data-aos="zoom-in" data-aos-delay="200">❤️<span>Hospitalidad</span></div>

        <div data-aos="zoom-in" data-aos-delay="300">🛟<span>Seguridad</span></div>

        <div data-aos="zoom-in" data-aos-delay="400">🏔<span>Respeto por la Naturaleza</span></div>

        <div data-aos="zoom-in" data-aos-delay="500">🏛<span>Cultura</span></div>

    </div>

</section>

<!-- HOMENAJE -->

<section class="homenaje">

    <div class="homenaje-content" data-aos="fade-up">

        <h2>Un legado que continúa...</h2>

        <p>
            "Todo lo que hoy disfrutan nuestros visitantes es el resultado
            del esfuerzo, la unión y la perseverancia de los trabajadores
            de la comunidad Araque. Gracias a las mingas, al trabajo
            comunitario y al amor por su tierra, lograron convertir
            un sueño en una realidad que hoy beneficia a generaciones
            enteras."
        </p>

    </div>

</section>

<?php echo view('templates/footer'); ?>