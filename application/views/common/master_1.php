<?php if (!$this->session->userdata('validated')) {
            redirect(base_url());
        }?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="<?php echo base_url('assets/images/Iconsmind-Outline-Gun.ico'); ?>" type="image/gif" sizes="16x16">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>GFG</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bootstrap/css/jquery-ui.min.css">
<!-- Font Awesome -->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>-->
<script src="<?php echo base_url() ?>assets/js/angular.js"></script>
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/colors/ionicons.min.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url('alert/alert.css') ?>">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">



<link rel="stylesheet" href="<?php echo base_url() ?>assets/box/css/popupmodal.css" >
<script src="<?php echo base_url() ?>assets/box/js/popupmodal-min.js">></script>

<script src="<?php echo base_url('alert/alert.js') ?>"></script>
<style type="text/css">
  .form-control-feedback{
        padding-right:25px !important;
    }
</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>I</b>M</span>
                    <!-- logo for regular state and mobile devices -->
                    <?php
                    if ($this->session->userdata('reg_id') == '') {
                        redirect(base_url('login'));
                    }
                    $user_set_name = $this->session->userdata('logo_name');
                    ?>
                    <span class="logo-lg"><b><?php echo $user_set_name; ?>&nbsp;</b>Revenue </span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div style="margin-top: 14px;margin-right: 20px;">
                     <a href="<?php echo base_url('login/logout') ?>" class=" btn btn-info  btn-xs pull-right">Logout</a>
                 </div>
                 <div style="margin-top: 14px;margin-right: 20px;" >
                  <a href="<?php echo base_url('login/password_reset') ?>" class=" btn bt btn-xs pull-right" style="margin-right: 22px;">Password Reset</a></div>
                  <?php $type=$this->session->userdata('type');
                        $log_id=$this->session->userdata('reg_id');

                        if($type==2){
                          $this->db->select('count(*) as total');
                          $this->db->where('other_emp_id',$log_id);
                          $this->db->where('payment_status',1);
                          $count= $this->db->get('income_register')->row();
                   ?>
                  <div>
                     <li class="dropdown notifications-menu pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-bell-o"></i>
                          <span class="label label-warning" style="margin-right: 20px;"><?php echo $count->total ?></span>
                        </a>
                        <ul class="dropdown-menu">
                        <!--   <li class="header">You have 10 notifications</li> -->
                          <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                              <?php 
                               $this->db->select('emp.name,emp.id,income.employee_id, income.expense,income.register_id');
                               $this->db->from('income_register as income');
                               $this->db->join('employee as emp','emp.id=income.employee_id');
                               $this->db->where('other_emp_id',$log_id);
                               $this->db->where('payment_status',1);
                               $count= $this->db->get()->result(); 
                                 foreach ($count as $key => $value) {?>
                                    <a href="<?php echo base_url('income_register') ?>"><li ><?php echo $value->name.'-'.$value->id.'--'.$value->expense ?></li></a>     
                                <?php }?>
                               
                              
                                                    
                            </ul>
                          </li>
                        
                        </ul>
                      </li>
                  </div>
              <?php } ?>
                </nav>
            </header>
  <!-- Left side column. contains the logo and sidebar -->
 <?php $type= $this->session->userdata('type'); 
                if($type==4){
                  $this->load->view('common/sidebr');
                }else if($type==2){
                  $this->load->view('common/sidebr_employee');
                }elseif($type==3){
                  $this->load->view('common/sidebr_user');
                }
                else{
                   $this->load->view('common/sidebr');
                }
          ?>
  <!-- Content Wrapper. Contains page content -->
  <?php $this->load->view($content); ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs"> <b>Version</b> 2.3.5 </div>
    <strong>Copyright &copy;
    <?php date('Y');?>
    <a href="#"></a>.</strong> All rights
    reserved. </footer>
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datepicker/datepicker3.css">
<script src="<?php echo base_url() ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?php echo base_url() ?>assets/admin/dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.delay.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.full.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url('assets/lib/jquery-1.11.1.js') ?>"></script> -->
  <script type="text/javascript" src="<?php echo base_url('assets/dist/jquery.validate.js') ?>"></script>
  <script>
  $(function () {
        $('.datepicker').datepicker({
      // autoclose: true
       format: 'dd-mm-yyyy'
    })
      //Date range picker
      $('#reservation').daterangepicker()
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    
    //Date range picker with time picker
     //Date range as a button
   

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

   
   

   

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>