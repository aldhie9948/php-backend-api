<?php

class User extends Controller
{
    private $MahasiswaModel;

    public function __construct()
    {
        $this->MahasiswaModel = $this->model('Mahasiswa_model');
    }

    public function index()
    {

        $data['data'] = $this->MahasiswaModel->getAllMahasiswa();
        return print json_encode($data);
    }

    public function detail($id)
    {
        $this->setAllowedMethod("GET");
        $data['data'] = $this->MahasiswaModel->getMahasiswa($id);
        return print json_encode($data);
    }

    public function update()
    {
        $this->setAllowedMethod("POST");

        // cara php mengambil request body
        $body = file_get_contents('php://input');

        // konversi string json ke array assosiatif
        $data = json_decode($body, true);

        return print json_encode(["data" => $data]);
    }
}
