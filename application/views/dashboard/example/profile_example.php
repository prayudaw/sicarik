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
                           <div class="card-header">Profile Picture</div>
                           <div class="card-body text-center">
                               <!-- Profile picture image-->
                               <img class="img-account-profile rounded-circle mb-2" src="assets/img/illustrations/profiles/profile-1.png" alt="">
                               <!-- Profile picture help block-->
                               <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                               <!-- Profile picture upload button-->
                               <button class="btn btn-primary" type="button" fdprocessedid="2ie1qn">Upload new image</button>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-8">
                       <!-- Account details card-->
                       <div class="card mb-4">
                           <div class="card-header">Account Details</div>
                           <div class="card-body">
                               <form>
                                   <!-- Form Group (username)-->
                                   <div class="mb-3">
                                       <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                       <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username" fdprocessedid="jp08o">
                                   </div>
                                   <!-- Form Row-->
                                   <div class="row gx-3 mb-3">
                                       <!-- Form Group (first name)-->
                                       <div class="col-md-6">
                                           <label class="small mb-1" for="inputFirstName">First name</label>
                                           <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie" fdprocessedid="xpbjmj">
                                       </div>
                                       <!-- Form Group (last name)-->
                                       <div class="col-md-6">
                                           <label class="small mb-1" for="inputLastName">Last name</label>
                                           <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna" fdprocessedid="652yw1">
                                       </div>
                                   </div>
                                   <!-- Form Row        -->
                                   <div class="row gx-3 mb-3">
                                       <!-- Form Group (organization name)-->
                                       <div class="col-md-6">
                                           <label class="small mb-1" for="inputOrgName">Organization name</label>
                                           <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap" fdprocessedid="u3912i">
                                       </div>
                                       <!-- Form Group (location)-->
                                       <div class="col-md-6">
                                           <label class="small mb-1" for="inputLocation">Location</label>
                                           <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA" fdprocessedid="10otzo">
                                       </div>
                                   </div>
                                   <!-- Form Group (email address)-->
                                   <div class="mb-3">
                                       <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                       <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com" fdprocessedid="wqczi7">
                                   </div>
                                   <!-- Form Row-->
                                   <div class="row gx-3 mb-3">
                                       <!-- Form Group (phone number)-->
                                       <div class="col-md-6">
                                           <label class="small mb-1" for="inputPhone">Phone number</label>
                                           <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567" fdprocessedid="q0db7">
                                       </div>
                                       <!-- Form Group (birthday)-->
                                       <div class="col-md-6">
                                           <label class="small mb-1" for="inputBirthday">Birthday</label>
                                           <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988" fdprocessedid="dif15q">
                                       </div>
                                   </div>
                                   <!-- Save changes button-->
                                   <button class="btn btn-primary" type="button" fdprocessedid="kdu5gq">Save changes</button>
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