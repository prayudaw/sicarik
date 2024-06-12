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
               <h1 class="h3 mb-2 text-gray-800">History Kunjungan</h1>

               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                   <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-primary"></h6>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                               <thead>
                                   <tr>
                                       <th>Waktu Kunjungan</th>

                                   </tr>
                               </thead>
                               <tbody>
                               </tbody>
                           </table>
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

   <style>
       .redClass {
           background-color: red;
           color: white;
       }
   </style>

   <script type="text/javascript">
       // Call the dataTables jQuery plugin
       $(document).ready(function() {

           var table;
           var base_url = '<?php echo base_url() ?>';

           table = $('#table').DataTable({
               "processing": true, //Feature control the processing indicator.
               "serverSide": true, //Feature control DataTables' server-side processing mode.
               "order": [], //Initial no order.
               "ajax": {
                   "url": "<?php echo site_url('dashboard/pintumasuk/ajax_list') ?>",
                   "type": "POST"
               },
               "ordering": false,
               //    "createdRow": function(row, data, dataIndex) {

               //        if (data[3] == 'Belum Dikembalikan') {
               //            $(row).addClass('redClass');
               //        }
               //    }
           });
       });
   </script>