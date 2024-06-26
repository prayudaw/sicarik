   <!-- header -->
   <?php $this->load->view('dashboard/template/header') ?>
   <!-- end header -->

   <!-- Sidebar -->
   <?php $this->load->view('dashboard/template/sidebar') ?>
   <!-- End of Sidebar -->

   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
       <div id="content">

           <!-- Topbar -->
           <?php $this->load->view('dashboard/template/topbar') ?>
           <!-- End of Topbar -->

           <!-- Begin Page Content -->
           <div class="container-fluid">

               <!-- Page Heading -->
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                   <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
               </div>

               <!-- Content Row -->
               <div class="row">

                   <!-- Earnings (Monthly) Card Example -->
                   <div class="col-xl-2 col-md-6 mb-4">
                       <div class="card border-left-primary shadow h-100 py-2">
                           <a href="<?php echo base_url('dashboard/buku') ?>">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Histori Peminjaman Buku</div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_transaksi_buku ?></div>
                                       </div>
                                       <div class="col-auto">
                                           <i class="fas fa-book fa-2x text-gray-300"></i>
                                       </div>
                                   </div>
                               </div>
                           </a>

                       </div>
                   </div>

                   <!-- Earnings (Monthly) Card Example -->
                   <div class="col-xl-2 col-md-6 mb-4">
                       <div class="card border-left-success shadow h-100 py-2">
                           <a href="<?php echo base_url('dashboard/skripsi') ?>">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Histori Peminjaman Skripsi</div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_transaksi_skripsi ?></div>
                                       </div>
                                       <div class="col-auto">
                                           <i class="fas fa-book fa-2x text-gray-300"></i>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>

                   <!-- Earnings (Monthly) Card Example -->
                   <div class="col-xl-2 col-md-6 mb-4">
                       <div class="card border-left-info shadow h-100 py-2">
                           <a href="<?php echo base_url('dashboard/loker') ?>">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Histori Peminjaman Kunci Loker</div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_transaksi_loker ?></div>
                                       </div>
                                       <div class="col-auto">
                                           <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>

                   <!-- Earnings (Monthly) Card Example -->
                   <div class="col-xl-2 col-md-6 mb-4">
                       <div class="card border-left-info shadow h-100 py-2">
                       <a href="<?php echo base_url('dashboard/pintumasuk') ?>">
                        <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Histori Kunjungan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_transaksi_pintumasuk ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>                          
                       </div>
                   </div>


                     <!-- Earnings (Monthly) Card Example -->
                     <div class="col-xl-2 col-md-6 mb-4">
                       <div class="card border-left-info shadow h-100 py-2">
                       <a href="<?php echo base_url('dashboard/pintumasuk') ?>">
                        <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Histori Kunjungan Serial</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_kunjungan_serial ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>                          
                       </div>
                   </div>
                   <div class="col-xl-2 col-md-6 mb-4">
                       <div class="card border-left-info shadow h-100 py-2">
                       <a href="<?php echo base_url('dashboard/pintumasuk') ?>">
                        <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Histori Kunjungan Referensi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_kunjungan_referensi ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>                          
                       </div>
                   </div>


               </div>

               <!-- Content Row -->
               <?php if ($is_borrow['status'] == 1) {   ?>
                   <div class="row">
                       <div class="col-lg-12 mb-4">
                           <!-- about us -->
                           <div class="card shadow mb-4">
                               <div class="card-header py-3">
                                   <h6 class="m-0 font-weight-bold text-primary">Peminjaman Buku Saat Ini</h6>
                               </div>
                               <div class="card-body" style="font-family:Verdana, Geneva, Tahoma, sans-serif;">
                                   <?php
                                    $date = date('Y-m-d');
                                    foreach ($is_borrow['data'] as $list) { ?>
                                       <div class="bg-light border border-primary p-3 mb-3">
                                           <h4><?php echo $list['judul'] ?></h4><span>Buku dipinjam tanggal <?php echo $list['tgl_pinjam'] ?> Harap dikembalikan <?php echo $list['tgl_kembali'] ?></span>
                                           <?php if ($list['tgl_kembali'] < $date) { ?>
                                               <div style="background-color: red;color:white;">Lama terlambat <b><?php echo $list['list_denda']['jhd'] ?></b> hari Jumlah Denda <?php echo $list['list_denda']['denda'] ?> </div>
                                           <?php } ?>
                                       </div>

                                   <?php } ?>
                                   <!-- <table class="table table-success">
                                       <thead>
                                           <tr>
                                               <th scope="col">#</th>
                                               <th scope="col">Judul</th>
                                               <th scope="col">Tgl Pinjam</th>
                                               <th scope="col">Tgl Kembali</th>
                                               <th scope="col">Status</th>
                                               <th scope="col">Keterangan</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php $no = 1;
                                            $date = date('Y-m-d');
                                            foreach ($is_borrow['data'] as $list) { ?>
                                               <tr>
                                                   <th scope="row"><?php echo $no ?></th>
                                                   <td><?php echo $list['judul'] ?></td>
                                                   <td><?php echo $list['tgl_pinjam'] ?></td>
                                                   <td><?php echo $list['tgl_kembali'] ?></td>
                                                   <?php
                                                    if ($list['tgl_kembali'] < $date) { ?>
                                                       <td>Sudah terlambat</td>
                                                       <td>Lama Terlambat <b><?php echo $list['list_denda']['jhd'] ?></b> Hari Jumlah Denda <b><?php echo $list['list_denda']['denda'] ?> </b> </td>
                                                   <?php } else { ?>
                                                       <td>Masih Masa Pinjaman</td>
                                                       <td>-</td>
                                                   <?php } ?>
                                               </tr>
                                           <?php $no++;
                                            } ?>

                                       </tbody>
                                   </table> -->
                               </div>
                           </div>
                       </div>
                   </div>
               <?php } ?>

               <div class="row">
                   <div class="col-lg-6 mb-4">
                       <!-- about us -->
                       <div class="card shadow mb-4">
                           <div class="card-header py-3">
                               <h6 class="m-0 font-weight-bold text-primary">About Sicarik</h6>
                           </div>
                           <div class="card-body">
                               <div class="text-center">
                                   <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('assets/') ?>img/undraw_posting_photo.svg" alt="...">
                               </div>
                               <p>Sicarik adalah Sistem Informasi Catatan Riwayat Pemustaka pengecekan tanggungan koleksi buku, skripsi ,prosedur pengembalian buku dan kunci locker</p>

                           </div>
                       </div>
                   </div>
                   <div class="col-lg-6 mb-4">
                       <!-- about us -->
                       <div class="card shadow mb-4">
                           <div class="card-header py-3">
                               <h6 class="m-0 font-weight-bold text-primary">Jam Layanan Perpustakaan</h6>
                           </div>
                           <div class="card-body">
                               <div class="text-center">
                                   <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('assets/') ?>img/undraw_posting_photo.svg" alt="...">
                               </div>
                               <p>Jam layanan perpustakaan UIN Sunan Kalijaga sebagai berikut :<br />
                               <ul>
                                   <li>Hari Senin sampai Kamis buka pukul 08.00 samapi 16.00 WIB</li>
                                   <li> Hari Jumat buka pukul 08.00 - 16.30 WIB, istirahat shalat jumat 11.30 - 13.00 WIB</li>
                                   <li>Hari Sabtu Libur</li>
                                   <li>Hari Libur Nasional perpustakaan UIN Sunan Kalijaga tidak membuka layanan</li>
                               </ul>
                               </p>

                           </div>
                       </div>
                   </div>
               </div>

               <!-- Content Row -->
               <div class="row">
               </div>

           </div>
           <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->

       <!-- Footer copyright -->
       <?php $this->load->view('dashboard/template/footer_copyright') ?>
       <!-- End of Footer copyright -->

   </div>
   <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Sidebar -->
   <?php $this->load->view('dashboard/template/footer') ?>
   <!-- End of Sidebar -->