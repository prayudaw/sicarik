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
               <h1 class="h3 mb-2 text-gray-800">Profil Anggota</h1>
               <div class="row">
                   <div class="col-xl-4">
                       <!-- Profile picture card-->
                       <div class="card mb-4 mb-xl-0">
                           <div class="card-header">foto</div>
                           <div class="card-body text-center">
                               <!-- Profile picture image-->
                               <img class="img-account-profile rounded mb-2" src="<?php echo $img ?>" alt="">
                               <!-- Profile picture help block-->

                           </div>
                       </div>
                   </div>
                   <div class="col-xl-8">
                       <!-- Account details card-->
                       <div class="card mb-4">
                           <div class="card-header">Details</div>
                           <div class="card-body">
                               <form>
                                   <!-- Form Group (NIM)-->
                                   <div class="mb-3">
                                       <label class="small mb-1">NIM</label>
                                       <input class="form-control" disabled type="text" value="<?php echo $this->session->userdata('no_mhs') ?>" fdprocessedid="jp08o">
                                   </div>
                                   <!-- Form Group (Nama)-->
                                   <div class="mb-3">
                                       <label class="small mb-1">Nama</label>
                                       <input class="form-control" disabled type="text" value="<?php echo $this->session->userdata('Fullname') ?>" fdprocessedid="jp08o">
                                   </div>
                                   <!-- Form Group (Fakultas)-->
                                   <div class="mb-3">
                                       <label class="small mb-1">Fakultas</label>
                                       <input class="form-control" disabled type="text" value="<?php echo $this->session->userdata('fakultas') ?>" fdprocessedid="jp08o">
                                   </div>
                                   <!-- Form Group (Jurusan)-->
                                   <div class="mb-3">
                                       <label class="small mb-1">Jurusan</label>
                                       <input class="form-control" disabled type="text" value="<?php echo $this->session->userdata('jurusan') ?>" fdprocessedid="jp08o">
                                   </div>
                                   <!-- Form Group (Status)-->
                                   <div class="mb-3">
                                       <label class="small mb-1">Status</label>
                                       <input class="form-control" disabled type="text" value="<?php echo $this->session->userdata('status') ?>" fdprocessedid="jp08o">
                                   </div>

                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->

       <!-- Footer -->
       <?php $this->load->view('dashboard/template/footer_copyright') ?>
       <!-- End of Footer -->

   </div>
   <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Footer -->
   <?php $this->load->view('dashboard/template/footer') ?>
   <!-- End of Footer -->
   <script type="text/javascript">
   </script>