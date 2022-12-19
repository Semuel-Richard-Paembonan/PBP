<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Barang</title>
  <!-- memanggil link css punya bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- memanggil link Google Font untuk membuka halaman secara online yg disediakan google (bawaan dari codeigniter)-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- memanggil base_url() saat membuat URL untuk CSS yg diambil dari adminlte.css (bawaan link template adminlte ) -->
  <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.css">
</head>
<body>
      <!-- membuat container-fluid untuk menampung semua elemen  -->
      <div class="container-fluid">
      <!-- row untuk membuat baris  -->
        <div class="row">
          <!-- membuat kolom dengan lebar 12 (full widht) -->
          <div class="col-12">
            <!-- membuat card untuk judul  -->
            <div class="card">
              <div class="card-header text-center">
                <h3>Kelola Barang</h3>
              </div>
              <!-- membuat card-body -->
              <div class="card-body">

              <!-- gunakan data-toggle="modal" untuk menampilkan modal,sedangkan data-target="#tambah" 
                   untuk menentukan target modal yang akan ditampilkan dengan ID tambah 
                   dan menampilkan Form modal Tambah Barang ketika tombol tambah barang di klik-->
              <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah">Tambah Barang</button>
                <div class="modal fade" id="tambah">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!--bagian ini digunakan untuk mengirimkan data ke server melalui metode POST. 
                            Form ini memiliki nama "form" dan akan mengirimkan data ke URL tujuan yaitu 
                            function "tambah_barang" yang terletak di dalam controller "barang", yg bertanggung jawab 
                            untuk mengolah data yang dikirimkan oleh form tersebut-->
                        <form name="form" action="<?= base_url()?>barang/tambah_barang" method="post">
                            <!-- dalam form terdiri dari nama,harga dan stok yang bertipe text untuk memasukkan data barangnya,
                                 dan atribut name semua elemen untuk mengidentifikasi data yang dikirimkan -->
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Barang</label>
                                <input type="text" name="harga" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" name="stok" class="form-control">
                            </div>
                          </div>
                          <div class="modal-footer">
                             <!-- tombol batal untuk menutup modal dengan menggunakan atribut "data-dismiss" yang bernilai "modal" -->
                            <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                            <!-- tombol simpan bertipe submit untuk mengirimkan data yang telah diinput ke server ketika diklik -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Akhir Modal Form Tambah Barang  -->

              <!-- Buat table untuk daftar barang  -->
              <table  class="table table-bordered">
                    <!-- Buat header kolom untuk daftar barang  -->
                   <tr class="text-center">
                        <th><b>ID</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Harga</b></th>
                        <th><b>Stok</b></th>
                        <th><b>Aksi</b></th>
                    </tr>
                  <!-- Buat tag php untuk membuat perulangan-->
                  <?php
                  // foreach digunakan untuk menampilkan data dari array bernama $barang 
                  // dan array tersebut disimpan dalam variabel $brg
                  foreach($barang as $brg){
                   ?>

                   <tr>
                   <!-- menampilkan nilai dari ID, Nama, Harga dan Stok yang disimpan dalam variabel $brg -->
                      <td><?= $brg->ID ?></td>
                      <td><?= $brg->Nama ?></td>
                      <td>Rp.<?= number_format($brg->Harga,0,',','.')?></td>
                      <td><?= $brg->Stok ?></td>
                      <td>
                        
                          <!-- gunakan data-toggle="modal" untuk menampilkan modal, data-target="#edit diambil 
                          dari id modal dan akan mengambil ID dalam variable brg <?= $brg->ID ?>" yang akan diedit-->
                          <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit<?= $brg->ID ?>">
                          <i class="fas fa-edit"></i></button>
                            <!-- menampilkan Form modal Edit Barang ketika tombol edit di klik sesuai dengan ID dalam variabel $brg -->
                            <div class="modal fade" id="edit<?= $brg->ID ?>">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <!-- membuat header modal dengan judul Edit Barang  -->
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  <!-- untuk mengirimkan data ke server melalui metode POST. 
                                  Form ini memiliki nama "form" dan akan mengirimkan data ke URL tujuan yaitu 
                                  function "edit_barang" yang terletak di dalam controller "barang", yg bertanggung jawab 
                                  untuk mengolah data yang dikirimkan oleh form tersebut-->
                                    <form name="form" action="<?= base_url()?>barang/edit_barang" method="post">
                                        <!-- dalam form, memiliki input field yang menampilkan nilai dari Nama, Harga, dan Stok 
                                        yang disimpan dalam variabel $brg dan untuk ID dalam variabel $brg dengan tipe "hidden", 
                                        tidak akan ditampilkan di halaman web karena setiap ID sudah disetting dengan auto increment dalam database-->
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="hidden" value="<?= $brg->ID?>" name="ID"> 
                                            <input type="text" value="<?= $brg->Nama ?>" name="nama" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Barang</label>
                                            <input type="text" value="<?= $brg->Harga ?>" name="harga" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="text" value="<?= $brg->Stok ?>" name="stok" class="form-control">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                         <!-- tombol batal untuk menutup modal dengan menggunakan atribut "data-dismiss" yang bernilai "modal" -->
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                        <!-- tombol Simpan dengan type="submit" untuk mengirim semua isian data ke server ketika diklik -->
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                      </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                             <!-- Akhir Modal Form Edit Barang -->

                             <!-- gunakan data-toggle="modal" untuk menampilkan modal, data-target="#hapus diambil 
                            dari id modal dan akan mengambil ID dalam variable brg <?= $brg->ID ?>" barang yang akan dihapus-->
                            <button class="btn btn-sm btn-danger ml-3" data-toggle="modal" data-target="#hapus<?= $brg->ID ?>"><i class="fas fa-trash"></i></button>
                            <!-- menampilkan Form modal hapus Barang ketika tombol hapus di klik sesuai dengan ID dalam variabel $brg -->
                            <div class="modal fade" id="hapus<?= $brg->ID ?>">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <!-- membuat header modal dengan judul Hapus Barang  -->
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <!-- atribut action dalam form, diisi base_url() diikuti controller barang dan function hapus_barang,
                                    sehingga ketika form ini disubmit, data yang dikirimkan menggunakan method post, 
                                    akan diteruskan ke halaman web -->
                                  <form name="form" action="<?= base_url()?>barang/hapus_barang" method="post">
                                      <div class="form-group">
                                      <!-- buat pesan "Anda Yakin ingin dihapus?" -->
                                              <p>Anda Yakin ingin dihapus?</p>
                                               <!-- input field ID, untuk mengambil ID dalam variable $brg yg akan dihapus -->
                                              <input type="hidden" value="<?= $brg->ID?>" name="ID"> 
                                            </div>
                                      <div class="modal-footer">
                                         <!-- tombol batal untuk menutup modal dengan menggunakan atribut "data-dismiss" yang bernilai "modal" -->
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                        <!-- tombol Hapus dengan type="submit" untuk menghapus barang 
                                        sesuai dengan ID dalam variable $brg yg akan dihapus  -->
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                      </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- Akhir Modal Form Hapus Barang -->

                        </td>
                   </tr>
                   <!--Akhir Baris  -->
                   <?php } ?>
              </table>
              <!-- Akhir table daftar barang   -->

             </div>
            </div>
            <!-- Akhir card daftar barang  -->
          </div>
        </div>
      </div>
      
  <!-- footer  -->
  <footer>
    <!-- menggunakan Font Awesome untuk membuat icon -->
    <script src="https://kit.fontawesome.com/4590de2183.js" crossorigin="anonymous"></script>
    <!-- file JavaScript yang bernama "jquery.js" yang diambil dari direktori "plugins/jquery" 
    (bawaan template adminlte) untuk mendukung fungsionalitas seperti menangani interaksi pengguna/mengolah data-->
    <script src="<?= base_url();?>/plugins/jquery/jquery.js"></script>
    <!-- menggunakan Javascrip punya bootstrap yang diambil dari direktori "plugins/bootstrap/js" 
     yang terletak di dalam direktori "base_url".-->
    <script src="<?= base_url();?>/plugins/bootstrap/js/bootstrap.bundle.js"></script>
  </footer>
  <!-- akhir footer  -->
</body>
</html>

