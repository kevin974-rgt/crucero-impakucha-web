<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends BaseController
{
    public function login()
    {
        return view('admin/login');
    }

    public function autenticar()
    {
        $usuario    = $this->request->getPost('usuario');
        $contrasena = (string) $this->request->getPost('contrasena');

        $db = \Config\Database::connect();
        $user = $db->table('usuarios')
                   ->where('usuario', $usuario)
                   ->get()
                   ->getRow();

        $valido = false;

        if ($user) {
            if (password_verify($contrasena, $user->contrasena)) {
                // Contraseña ya guardada con password_hash (bcrypt)
                $valido = true;
            } elseif (hash_equals($user->contrasena, hash('sha256', $contrasena))) {
                // Contraseña antigua en SHA-256: se acepta una vez y se convierte
                // automáticamente al formato seguro password_hash
                $valido = true;
                $db->table('usuarios')
                   ->where('usuario', $user->usuario)
                   ->update(['contrasena' => password_hash($contrasena, PASSWORD_DEFAULT)]);
            }
        }

        if ($valido) {
            session()->regenerate();
            session()->set('admin_logueado', true);
            session()->set('admin_nombre', $user->nombre);
            return redirect()->to('/admin/panel');
        } else {
            return redirect()->to('/admin/login')
                ->with('error', 'Usuario o contraseña incorrectos');
        }
    }

    public function panel()
    {
        if (!session()->get('admin_logueado')) {
            return redirect()->to('/admin/login');
        }

        $db = \Config\Database::connect();

        $totalMensajes         = $db->table('mensajes')->countAllResults();
        $reservasPendientes    = $db->table('reservas')->where('estado', 'pendiente')->countAllResults();
        $testimoniosPendientes = $db->table('testimonios')->where('estado', 'pendiente')->countAllResults();
        $totalArchivos         = $db->table('galeria')->countAllResults();

        return view('admin/panel', [
            'totalMensajes'         => $totalMensajes,
            'reservasPendientes'    => $reservasPendientes,
            'testimoniosPendientes' => $testimoniosPendientes,
            'totalArchivos'         => $totalArchivos,
        ]);
    }

    public function cerrarSesion()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }


    public function mensajes()
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $mensajes = $db->table('mensajes')
                   ->orderBy('fecha', 'DESC')
                   ->get()
                   ->getResultArray();

    return view('admin/mensajes', ['mensajes' => $mensajes]);
}

public function eliminarMensaje($id)
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $db->table('mensajes')->where('id', $id)->delete();

    return redirect()->to('/admin/mensajes')
        ->with('success', 'Mensaje eliminado correctamente');
}

public function reservas()
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $reservas = $db->table('reservas')
                   ->orderBy('fecha_solicitud', 'DESC')
                   ->get()
                   ->getResultArray();

    return view('admin/reservas', ['reservas' => $reservas]);
}

public function aprobarReserva($id)
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $db->table('reservas')->where('id', $id)->update(['estado' => 'aprobada']);

    return redirect()->to('/admin/reservas')
        ->with('success', 'Reserva aprobada correctamente');
}

public function rechazarReserva($id)
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $db->table('reservas')->where('id', $id)->update(['estado' => 'rechazada']);

    return redirect()->to('/admin/reservas')
        ->with('success', 'Reserva rechazada correctamente');
}

public function eliminarReserva($id)
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $db->table('reservas')->where('id', $id)->delete();

    return redirect()->to('/admin/reservas')
        ->with('success', 'Reserva eliminada correctamente');
}

public function testimonios()
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $testimonios = $db->table('testimonios')
                      ->orderBy('fecha', 'DESC')
                      ->get()
                      ->getResultArray();

    return view('admin/testimonios', ['testimonios' => $testimonios]);
}

public function aprobarTestimonio($id)
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $db->table('testimonios')->where('id', $id)->update(['estado' => 'aprobado']);

    return redirect()->to('/admin/testimonios')
        ->with('success', 'Testimonio aprobado correctamente');
}

public function rechazarTestimonio($id)
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $db->table('testimonios')->where('id', $id)->update(['estado' => 'rechazado']);

    return redirect()->to('/admin/testimonios')
        ->with('success', 'Testimonio rechazado correctamente');
}

public function eliminarTestimonio($id)
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $db->table('testimonios')->where('id', $id)->delete();

    return redirect()->to('/admin/testimonios')
        ->with('success', 'Testimonio eliminado correctamente');
}

public function galeria()
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $archivos = $db->table('galeria')
                   ->orderBy('fecha_carga', 'DESC')
                   ->get()
                   ->getResultArray();

    return view('admin/galeria', ['archivos' => $archivos]);
}

public function subirArchivo()
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $archivo = $this->request->getFile('archivo');

    if (!$archivo->isValid()) {
        return redirect()->to('/admin/galeria')
            ->with('error', 'El archivo no es válido');
    }

    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/jpg', 'video/mp4'];
    $tipo = $archivo->getMimeType();

    if (!in_array($tipo, $tiposPermitidos)) {
        return redirect()->to('/admin/galeria')
            ->with('error', 'Solo se permiten imágenes (jpg, png) y videos (mp4)');
    }

    $nuevoNombre = $archivo->getRandomName();
    $archivo->move(FCPATH . 'assets/img/', $nuevoNombre);

    $db = \Config\Database::connect();
    $db->table('galeria')->insert([
        'nombre_archivo' => $nuevoNombre,
        'ruta'           => 'assets/img/' . $nuevoNombre,
        'tipo'           => $tipo
    ]);

    return redirect()->to('/admin/galeria')
        ->with('success', '¡Archivo subido correctamente!');
}

public function eliminarArchivo($id)
{
    if (!session()->get('admin_logueado')) {
        return redirect()->to('/admin/login');
    }

    $db = \Config\Database::connect();
    $archivo = $db->table('galeria')->where('id', $id)->get()->getRow();

    if ($archivo) {
        $ruta = FCPATH . 'assets/img/' . $archivo->nombre_archivo;
        if (file_exists($ruta)) {
            unlink($ruta);
        }
        $db->table('galeria')->where('id', $id)->delete();
    }

    return redirect()->to('/admin/galeria')
        ->with('success', 'Archivo eliminado correctamente');
}

}