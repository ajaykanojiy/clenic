 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

        <div class="pull-left image">

         <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"  style="margin-top: 15px;">

        </div>

        <div class="pull-left info">

          <?php $name= $this->session->userdata('name');?>

          <p style="margin-top: 8px;"><?php echo $name; ?></p>

          <?php $type= $this->session->userdata('type'); 

                if($type==1){

                  $login='Super admin';

                }

                elseif($type==2){

                  $login='Admin';

                }

                else 
                {

                  $login='Employee';

               }

          ?>

          <a href="#"><i class="fa fa-circle text-success" style="margin-top: 8px;"></i><?php echo $login; ?> - Online</a>

        </div>

      </div>

    

      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">

          <a href="<?php echo base_url('dashboard') ?>">

            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

            <span class="pull-right-container">

              <!-- <i class="fa fa-angle-left pull-right"></i> -->

            </span>

          </a>

        

        </li>

         
          

         <li class="header">Setting</li>

      

        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Dcotor management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('doctor'); ?>"><i class="fa fa-circle-o"></i> Add/modifiy Doctor</a></li>
                                <li><a href="<?php echo base_url('speciality'); ?>"><i class="fa fa-circle-o"></i>Speciality</a></li>
                               
                            </ul>
                        </li> 

   
       


        <li class="active">

          <a href="<?php echo base_url('staff') ?>">

            <i class="fa fa-th"></i> <span>Staff Management</span>


          </a>

        </li>

        <li class="active">

          <a href="<?php echo base_url('service') ?>">

            <i class="fa fa-th"></i> <span>Service Management</span>


          </a>

        </li>


         <li><a href="<?php echo base_url('login_create') ?>"><i class="fa fa-circle-o"></i>Login</a></li>




      </ul>



    </section>

    <!-- /.sidebar -->

  </aside>