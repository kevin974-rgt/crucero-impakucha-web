<?php
// Datos SEO: cada pagina puede enviarlos desde su vista; si no, se usan estos valores por defecto.
$titulo      = $titulo      ?? 'Barco Vikingo – Crucero Impakucha | Paseos en el Lago San Pablo';
$descripcion = $descripcion ?? 'Paseos en el Barco Vikingo (Crucero Impakucha), en el lago San Pablo, Otavalo - Ecuador.';
$imagenOg    = $imagenOg    ?? base_url('assets/img/hero.jpg');
$urlCanonica = base_url(uri_string());
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($titulo) ?></title>
    <meta name="description" content="<?= esc($descripcion) ?>">
    <link rel="canonical" href="<?= esc($urlCanonica) ?>">
    <link rel="icon" href="<?= base_url('favicon.ico') ?>" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon-32x32.png') ?>">
    <link rel="apple-touch-icon" href="<?= base_url('apple-touch-icon.png') ?>">

    <!-- Vista previa al compartir el enlace (WhatsApp, Facebook, etc.) -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_EC">
    <meta property="og:site_name" content="Barco Vikingo - Crucero Impakucha">
    <meta property="og:title" content="<?= esc($titulo) ?>">
    <meta property="og:description" content="<?= esc($descripcion) ?>">
    <meta property="og:url" content="<?= esc($urlCanonica) ?>">
    <meta property="og:image" content="<?= esc($imagenOg) ?>">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
</head>
<body>

<!-- OLAS DE FONDO -->
<div class="olas">
    <div class="ola"></div>
    <div class="ola"></div>
    <div class="ola"></div>
</div>


<nav>
    
    <div class="nav-logo">
    <img src="<?= base_url('assets/img/logo3.png') ?>" alt="Logo del Barco Vikingo - Crucero Impakucha" id="logo-link">
</div>

    <div class="nav-pill">
        <a href="<?= base_url() ?>" class="<?= uri_string() == '' ? 'active' : '' ?>">Inicio</a>
        <a href="<?= base_url('nosotros') ?>" class="<?= uri_string() == 'nosotros' ? 'active' : '' ?>">Nosotros</a>
        <a href="<?= base_url('servicios') ?>" class="<?= uri_string() == 'servicios' ? 'active' : '' ?>">Servicios</a>
        <a href="<?= base_url('galeria') ?>" class="<?= uri_string() == 'galeria' ? 'active' : '' ?>">Galería</a>
        <a href="<?= base_url('contacto') ?>" class="<?= uri_string() == 'contacto' ? 'active' : '' ?>">Contacto</a>
        
    </div>
</nav>