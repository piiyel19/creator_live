<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?= project_name()?></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="all,follow">
   </head>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!------ Include the above in your HEAD tag ---------->
   <body>
      <div class="container">
         <br>  
         <p class="text-center"><b><?= project_name()?></b> | <a href="<?= base_url()?>login/logout"> <b>Logout</b></a></p>
         <hr>
         <div class="row" style="padding-bottom:30px;">
            <?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : C1</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">C1</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>C1/C1_list'> <i class="fa fa-angle-right"></i> C1</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : CUN</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">The controller is what will become the center of every request to your web application. In very technical CodeIgniter discussions, it may be referred to as the super object. Like any php class, you refer to it within your controllers as $this. Referring to $this is how you will load libraries, views, and generally command the framework.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Cun/Cun_list'> <i class="fa fa-angle-right"></i> CUN</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : D1</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">D1</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>D1/D1_list'> <i class="fa fa-angle-right"></i> D1</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Dangdut</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Dangdut</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Dangdut/Dangdut_list'> <i class="fa fa-angle-right"></i> Dangdut</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : del</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">del</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Del/Del_update'> <i class="fa fa-angle-right"></i> del</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Image_Data</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Image_Data2</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Image_data/Image_data_list'> <i class="fa fa-angle-right"></i> Image_Data</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Image_Insert</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Image_Insert</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Image_insert/Image_insert_list'> <i class="fa fa-angle-right"></i> Image_Insert</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Image_Insert2</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Image_Insert2</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Image_insert2/Image_insert2_list'> <i class="fa fa-angle-right"></i> Image_Insert2</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : IMG</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">IMG2</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Img/Img_list'> <i class="fa fa-angle-right"></i> IMG</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : IMG3</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">IMG</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Img3/Img3_list'> <i class="fa fa-angle-right"></i> IMG3</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Kenderaan</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Jenis</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Jenis/Jenis_list'> <i class="fa fa-angle-right"></i> Jenis</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Manusia</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Kerja</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Hobi/Hobi_list'> <i class="fa fa-angle-right"></i> Hobi</a></li>
                     <li class='list-group-item'><a href='<?= base_url()?>Kerja/Kerja_list'> <i class="fa fa-angle-right"></i> Manusia</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Pendaftaran</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Pelajar</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Pelajar/Pelajar_list'> <i class="fa fa-angle-right"></i> Pendaftaran</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : PPM Activitiy</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">PPM start register activity</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>List_activity/List_activity_list'> <i class="fa fa-angle-right"></i> List Activity</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Saman</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">BayarSaman</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Bayarsaman/Bayarsaman_list'> <i class="fa fa-angle-right"></i> Bayar</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Syarikat</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Info</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Info_syarikat/Info_syarikat_list'> <i class="fa fa-angle-right"></i> Info</a></li>
                     <li class='list-group-item'><a href='<?= base_url()?>Info/Info_list'> <i class="fa fa-angle-right"></i> Syarikat</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Table_W_Delete</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Table_W_Delete</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Table_w_delete/Table_w_delete_update'> <i class="fa fa-angle-right"></i> Table_W_Delete</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : TD</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">TD</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Td/Td_update'> <i class="fa fa-angle-right"></i> TD</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : TEST100</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Test100/Test100_update'> <i class="fa fa-angle-right"></i> TEST100</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Test_Date</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Test_Date</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Test_date/Test_date_list'> <i class="fa fa-angle-right"></i> Test_Date</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Test_Img_Module</b></p>
               <div class="card">
                  <img class="card-img-top" src="http://localhost/creator/source/all_file/d4b1a91e5fe6f71a4427752df72f62ce.jpg" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Test_Img_Module</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Test_img_module/Test_img_module_list'> <i class="fa fa-angle-right"></i> Test_Img_Module</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : test_redirect</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">test_redirect_add</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Test_redirect_add/Test_redirect_add_list'> <i class="fa fa-angle-right"></i> adsa</a></li>
                     <li class='list-group-item'><a href='<?= base_url()?>Test_redirect/Test_redirect_add'> <i class="fa fa-angle-right"></i> test_redirect2</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Tes_Dropdown_Segment</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">Tes_Dropdown_Segment</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Tes_dropdown_segment/Tes_dropdown_segment_list'> <i class="fa fa-angle-right"></i> Tes_Dropdown_Segment</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : TW</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">TW</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Tw/Tw_list'> <i class="fa fa-angle-right"></i> TW</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : TWD</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">TWD</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Twd/Twd_update'> <i class="fa fa-angle-right"></i> TWD</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')|| ($this->session->userdata('role')=='Admin')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : Ubat</b></p>
               <div class="card">
                  <img class="card-img-top" src="http://localhost/creator/source/all_file/57f57513d1ccebe78fcf4db34d29d5ba.jpg" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">ini adalah dokumen rekod</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Rekod_ubat/Rekod_ubat_list'> <i class="fa fa-angle-right"></i> Rekod Ubat</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')|| ($this->session->userdata('role')=='Admin')|| ($this->session->userdata('role')=='Customer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : UWU</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">UWU</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Uwu/Uwu_list'> <i class="fa fa-angle-right"></i> UWU</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')|| ($this->session->userdata('role')=='Member')|| ($this->session->userdata('role')=='Admin')|| ($this->session->userdata('role')=='Customer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : UXX</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">UXX</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Uxx/Uxx_list'> <i class="fa fa-angle-right"></i> UXX</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : WSD</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">WSD</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Wsd/Wsd_list'> <i class="fa fa-angle-right"></i> WSD</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?><?php if(($this->session->userdata('role')=='developer')){  ?>
            <aside class="col-sm-4" style="padding-bottom:30px;">
               <p><b>Module : WSX</b></p>
               <div class="card">
                  <img class="card-img-top" src="https://www.rajnathsingh.in/wp-content/uploads/2016/09/noImg.png" alt="Card image cap">
                  <div class="card-body">
                     <p class="card-text">xa</p>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class='list-group-item'><a href='<?= base_url()?>Wsx/Wsx_list'> <i class="fa fa-angle-right"></i> WSX</a></li>
                  </ul>
               </div>
            </aside>
            <?php } ?>
         </div>
      </div>
   </body>
</html>