<footer>
    <div class="footer-social">
        <a href="https://www.facebook.com/profile.php?id=100068723646471" target="_blank" rel="noopener" aria-label="Facebook">
            <svg viewBox="0 0 24 24"><path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5 3.66 9.13 8.44 9.94v-7.03H7.9v-2.91h2.54V9.86c0-2.51 1.5-3.89 3.77-3.89 1.09 0 2.24.2 2.24.2v2.47h-1.26c-1.24 0-1.63.78-1.63 1.57v1.89h2.78l-.44 2.91h-2.34V22c4.78-.81 8.44-4.94 8.44-9.94Z"/></svg>
        </a>
        <a href="https://www.tiktok.com/@barco.guardian.im" target="_blank" rel="noopener" aria-label="TikTok">
            <svg viewBox="0 0 24 24"><path d="M16.6 5.82a4.28 4.28 0 0 1-2.85-1.09v8.86a5.24 5.24 0 1 1-4.5-5.19v2.6a2.6 2.6 0 1 0 1.83 2.48V2h2.55a4.27 4.27 0 0 0 3.97 3.82Z"/></svg>
        </a>
    </div>
    <p>© 2025 Crucero Impakucha - Lago San Pablo, Otavalo, Ecuador</p>
</footer>


<!-- AOS ANIMACIONES -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>

<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>


<!-- LIGHTBOX GALERIA -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>



<!-- LOGIN OCULTO CON CLIC EN LOGO -->
<script>

    let clicks = 0;
    let timer;

    const logo = document.getElementById('logo-link');


    if (logo) {

        logo.addEventListener('click', function(e) {

            e.preventDefault();

            clicks++;

            clearTimeout(timer);


            timer = setTimeout(function() {

                if (clicks === 1) {

                    window.location.href = '<?= base_url() ?>';

                }

                clicks = 0;


            }, 600);



            if (clicks === 2) {

                clearTimeout(timer);

                clicks = 0;

                window.location.href = '<?= base_url('admin/login') ?>';

            }


        });

    }

</script>



<!-- SCRIPT PRINCIPAL DE LA WEB -->
<script src="<?= base_url('assets/js/script.js') ?>"></script>


</body>
</html>