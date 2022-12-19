<?php

class Model_barang extends CI_Model{

     // Buat fungction tampil_data menggunakan method get, 
     // untuk mengambil data dari tabel tb_barang di database.
     public function tampil_data()
     {
        return $this->db->get('tb_barang');
     }

     // buat function tambahkan dan membuat parameter $databarang, yang merupakan array 
     // yang berisi data barang untuk catatan baru yang ditambahkan ke dalam tb_barang dalam database
     public function tambahkan($databarang)
     {
        // buat array baru dengan variable $data yang berisi tiga elemen yaitu nama, harga, dan stok.
        // elemen tersebut diberikan nilai sesuai dengan catatan baru data barang yang ditambahkan.
        $data = array('nama' => $databarang['nama'],
                      'harga' => $databarang['harga'], 
                      'stok' => $databarang['stok'],
        );
        // lalu menggunakan method insert untuk catatan baru dari objek $this->db(koneksi database),
        // untuk menyisipkan array $data ke dalam tabel tb_barang
        $this->db->insert('tb_barang', $data);
     }
      
     // buat function edit dan membuat parameter $databarang, yang merupakan array yang berisi 
     // data barang yang digunakan untuk mengupdate data barang pada tb_barang dalam database.
     public function edit($databarang)
     {
        // membuat array baru dengan variable $data yang berisi tiga elemen yaitu nama, harga, dan stok
        // elemen tersebut diberikan nilai dari elemen yang sesuai dalam array $databarang sebelumnya
        $data = array('nama' => $databarang['nama'],
                      'harga' => $databarang['harga'], 
                      'stok' => $databarang['stok'],
        );
        // gunakan where untuk menentukan barang yang akan diedit, 
        // berdasarkan ID yang diberikan melalui parameter $databarang['ID']
        $this->db->where('ID',$databarang['ID']);
        // lalu gunakan metode update untuk mengupdate barang dalam tb_barang dengan data dari array $data
        $this->db->update('tb_barang',$data);
     }
     // buat function hapus dan membuat parameter $databarang, yang merupakan 
     // array yang berisi informasi tentang barang yang akan dihapus. 
     public function hapus($databarang)
     {
      // gunakan metode where untuk menentukan barang yang akan dihapus, berdasarkan ID 
      // yang diberikan melalui parameter $databarang['ID'].
      $this->db->where('ID',$databarang['ID']);
      // lalu gunakan metode delete untuk menghapus barang tersebut dari tabel tb_barang
      $this->db->delete('tb_barang');
     }
}

?>