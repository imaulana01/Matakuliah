<?php
class Matakuliah extends CI_Controller
{
    public function index()
    {
        $this->load->view('view-form-matakuliah');
    }
    public function cetak()
{
    $this->load->library('form_validation');

    $this->form_validation->set_rules(
        'kode',
        'Kode Matakuliah',
        'required|min_length[3]',
        [
            'required' => 'Kode Matakuliah Harus diisi',
            'min_length' => 'Kode terlalu pendek'
        ]
    );
    $this->form_validation->set_rules(
        'nama',
        'Nama Matakuliah',
        'required|min_length[3]',
        [
            'required' => 'Nama Matakuliah Harus diisi',
            'min_length' => 'Nama terlalu pendek'
        ]
    );
    $this->form_validation->set_rules(
        'sks',
        'Sks',
        'required|min_length[1]',
        [
            'required' => 'SKS Harus diisi',
            'min_length' => 'SKS terlalu kosong'
        ]
    );

    if ($this->form_validation->run() != true) {
        if (empty($this->input->post('kode'))) {
            echo "<script>alert('Kode Matakuliah Harus diisi');</script>";
        }
        elseif (strlen($this->input->post('kode')) < 3) {
            echo "<script>alert('Kode terlalu pendek');</script>";}
        if (empty($this->input->post('nama'))) {
            echo "<script>alert('Nama Matakuliah Harus diisi');</script>";
        } elseif (strlen($this->input->post('nama')) < 3) {
            echo "<script>alert('Nama terlalu pendek');</script>";
        }
        if (empty($this->input->post('sks'))) {
            echo "<script>alert('SKS Harus diisi');</script>";
        }
        elseif (strlen($this->input->post('sks')) < 3) {
            echo "<script>alert('SKS kosong');</script>";}
        $this->load->view('view-form-matakuliah');
    } else {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'sks' => $this->input->post('sks')
        ];
        $this->load->view('view-data-matakuliah', $data);
    }
}
}