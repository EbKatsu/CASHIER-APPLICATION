   <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
   <!--sidebar start-->

   <?php
    $id = $_SESSION['admin']['id_member'];
    $hasil_profil = $lihat->member_edit($id);
    ?>
   <aside>
       <div id="sidebar" class="nav-collapse ">
           <!-- sidebar menu start-->
           <ul class="sidebar-menu" id="nav-accordion">


               <li class="mt">
                   <a href="index.php">
                       <i class="fa fa-dashboard"></i>
                       <span>Dashboard</span>
                   </a>
               </li>

               <li class="sub-menu">
                   <a href="javascript:;">
                       <i class="fa fa-desktop"></i>
                       <span>Data <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                   </a>
                   <ul class="sub">
                       <li><a href="index.php?page=menu"><i class="fa fa-briefcase" aria-hidden="true"></i>Menu</a></li>
                       <li><a href="index.php?page=beban"><i class="fa fa-suitcase" aria-hidden="true"></i>Beban</a></li>
                       <li><a href="index.php?page=user1"><i class="fa fa-user" aria-hidden="true"></i>User</a></li>
                   </ul>
               </li>
               <li class="sub-menu">
                   <a href="index.php?page=jual"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Penjualan</a>

               </li>

               <li class="sub-menu">
                   <a href="javascript:;">
                       <i class="fa fa-file"></i>
                       <span>Laporan <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                   </a>
                   <ul class="sub">
                       <li><a href="index.php?page=laporan"><i class="fa fa-file" aria-hidden="true"></i>Laporan Penjualan</a></li>
                       <li><a href="index.php?page=laporanlr"><i class="fa fa-file" aria-hidden="true"></i>Laporan Laba Rugi</a></li>
                   </ul>
               </li>
               <li class="sub-menu">
                   <a href="javascript:;">
                       <i class="fa fa-cog"></i>
                       <span>Setting <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                   </a>
                   <ul class="sub">
                       <li><a href="index.php?page=pengaturan"><i class="fa fa-cogs" aria-hidden="true"></i>Pengaturan Toko</a></li>
                   </ul>
               </li>

           </ul>
           <!-- sidebar menu end-->
       </div>
   </aside>
   <!--sidebar end-->