<?php
class Barang extends CI_Controller{
    // buat function __construct untuk menjalankan perintah "parent::__construct();", 
    // turunan dari CI_Controller yaotu kelas Barang. Kemudian, fungsi ini juga memanggil 
    // fungsi "load->model('model_barang')", untuk memuat sebuah model bernama "model_barang" 
    // yang terletak di folder models.
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_barang');
    }

    // Buat fungsi index 
    public function index()
    {
        // buat variabel array $data index barang, yang diisi dengan data barang
        // yang diperoleh dari pemanggilan fungsi tampil_data() pada file model_barang dalam folder models
        $data['barang'] = $this->model_barang->tampil_data()->result();
        // lalu load->view akan dipanggil untuk menampilkan view bernama data_barang
        // kemudian variable $data yang berisi data, akan ditampilkan pada halaman web
        $this->load->view('data_barang',$data);
    }
    
    // membuat function tambah_barang
    public function tambah_barang()
    {
        // membuat function tambahkan dalam model_barang untuk mengambil inputan dari 
        // form tambah barang yang menggunakan method POST untuk pengiriman data dalam bentuk array.
        $this->model_barang->tambahkan($this->input->post());
        // ketika datanya sudah terinput, method redirect akan dipanggil 
        // untuk diarahkan ke halaman URL barang
        redirect(base_url().'barang');
    }
    
    // membuat function edit_barang
    public function edit_barang()
    {
        // membuat function edit dalam model_barang untuk mengambil inputan dari 
        // form edit barang sesuai dengan ID, yang menggunakan method POST untuk 
        // pengiriman data dalam bentuk array.
        $this->model_barang->edit($this->input->post());
        // ketika datanya sudah diedit, method redirect akan dipanggil 
        // untuk diarahkan ke halaman URL barang
        redirect(base_url().'barang');
    }

    // membuat function hapus_barang
    public function hapus_barang()
    {
        // membuat function hapus dalam model_barang untuk mengambil inputan dari 
        // form hapus barang sesuai dengan ID yang akan di hapus
        $this->model_barang->hapus($this->input->post());
        // ketika datanya sudah dihapus, maka akan dilempar kembali ke halaman URL barang
        redirect(base_url().'barang');
    }
    
}

?>