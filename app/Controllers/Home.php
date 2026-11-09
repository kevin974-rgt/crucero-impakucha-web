<?php

namespace App\Controllers;

use App\Models\MensajeModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function nosotros(): string
    {
        return view('nosotros');
    }

    public function servicios(): string
    {
        return view('servicios');
    }

    public function galeria(): string
{
    $db = \Config\Database::connect();
    $archivos = $db->table('galeria')
                   ->orderBy('fecha_carga', 'DESC')
                   ->get()
                   ->getResultArray();

    return view('galeria', ['archivos' => $archivos]);
}

    public function contacto(): string
    {
        return view('contacto');
    }

    public function enviarMensaje()
{
    $reglas = [
        'nombre'  => 'required|min_length[3]|max_length[100]',
        'correo'  => 'required|valid_email',
        'telefono' => 'permit_empty|numeric|max_length[15]',
        'mensaje' => 'required|min_length[10]'
    ];

    if (!$this->validate($reglas)) {
        return redirect()->to('/contacto')
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $model = new MensajeModel();

    $data = [
        'nombre'   => $this->request->getPost('nombre'),
        'correo'   => $this->request->getPost('correo'),
        'telefono' => $this->request->getPost('telefono'),
        'mensaje'  => $this->request->getPost('mensaje')
    ];

    $model->insert($data);

    return redirect()->to('/contacto')->with('success', '¡Mensaje enviado correctamente!');
}


public function reservas(): string
{
    return view('reservas');
}

public function enviarReserva()
{
    $reglas = [
        'nombre'       => 'required|min_length[3]',
        'correo'       => 'required|valid_email',
        'telefono'     => 'required|numeric',
        'fecha_paseo'  => 'required',
        'hora_paseo'   => 'required',
        'num_personas' => 'required|numeric',
        'tipo_servicio'=> 'required'
    ];

    if (!$this->validate($reglas)) {
        return redirect()->to('/reservas')
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $db = \Config\Database::connect();
    $db->table('reservas')->insert([
        'nombre'        => $this->request->getPost('nombre'),
        'correo'        => $this->request->getPost('correo'),
        'telefono'      => $this->request->getPost('telefono'),
        'fecha_paseo'   => $this->request->getPost('fecha_paseo'),
        'hora_paseo'    => $this->request->getPost('hora_paseo'),
        'num_personas'  => $this->request->getPost('num_personas'),
        'tipo_servicio' => $this->request->getPost('tipo_servicio'),
        'observaciones' => $this->request->getPost('observaciones'),
        'estado'        => 'pendiente'
    ]);

    return redirect()->to('/reservas')
        ->with('success', '¡Reserva enviada correctamente! Nos contactaremos pronto.');
}



public function enviarTestimonio()
{
    $reglas = [
        'nombre'       => 'required|min_length[3]',
        'calificacion' => 'required|numeric',
        'comentario'   => 'required|min_length[10]'
    ];

    // Si la validación falla, regresar a Contacto
    if (!$this->validate($reglas)) {
        return redirect()->to('/contacto')
            ->withInput()
            ->with('errors_testimonio', $this->validator->getErrors())
            ->with('tab_activa', 'testimonio');
    }

    // Guardar en la base de datos
    $db = \Config\Database::connect();

    $db->table('testimonios')->insert([
        'nombre'       => $this->request->getPost('nombre'),
        'correo'       => $this->request->getPost('correo'),
        'calificacion' => $this->request->getPost('calificacion'),
        'comentario'   => $this->request->getPost('comentario'),
        'estado'       => 'pendiente'
    ]);

    // Regresar a la página de contacto con mensaje de éxito
    return redirect()->to('/contacto')
        ->with('success_testimonio', '¡Gracias por compartir tu experiencia! Tu testimonio fue enviado correctamente y será revisado antes de publicarse.')
        ->with('tab_activa', 'testimonio');
}

public function enviarContacto()
{
    $tipo = $this->request->getPost('tipo');

    $reglas = [
        'nombre'  => 'required|min_length[3]',
        'correo'  => 'required|valid_email',
        'mensaje' => 'required|min_length[5]'
    ];

    if (!$this->validate($reglas)) {
        return redirect()->to('/contacto')
            ->withInput()
            ->with('errors_contacto', $this->validator->getErrors());
    }

    $db = \Config\Database::connect();

    if ($tipo === 'reserva') {
        $db->table('reservas')->insert([
            'nombre'        => $this->request->getPost('nombre'),
            'correo'        => $this->request->getPost('correo'),
            'telefono'      => $this->request->getPost('telefono'),
            'fecha_paseo'   => $this->request->getPost('fecha_paseo'),
            'hora_paseo'    => $this->request->getPost('hora_paseo'),
            'num_personas'  => $this->request->getPost('num_personas'),
            'tipo_servicio' => $this->request->getPost('tipo_servicio'),
            'observaciones' => $this->request->getPost('mensaje'),
            'estado'        => 'pendiente'
        ]);
    } else {
        $db->table('mensajes')->insert([
            'nombre'   => $this->request->getPost('nombre'),
            'correo'   => $this->request->getPost('correo'),
            'telefono' => $this->request->getPost('telefono'),
            'mensaje'  => $this->request->getPost('mensaje')
        ]);
    }

    return redirect()->to('/contacto')
        ->with('success_contacto', '¡Mensaje enviado correctamente! Nos contactaremos pronto.');
}


}