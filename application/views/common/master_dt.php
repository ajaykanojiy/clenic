<?php
if (!$this->session->userdata('validated')) {
    redirect(base_url());
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="<?php echo base_url('assets/images/Iconsmind-Outline-Gun.ico'); ?>" type="image/gif" sizes="16x16">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SAISUN</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bootstrap/css/bootstrap.min.css">
       <!--print table-->
        <link href="<?php echo base_url(); ?>backend/dist/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend/dist/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend/dist/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <!--print table mobile support-->
        <link href="<?php echo base_url(); ?>backend/dist/datatables/css/responsive.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend/dist/datatables/css/rowReorder.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bootstrap/css/jquery-ui.min.css">
        <!-- Font Awesome -->


        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/fullcalendar/dist/fullcalendar.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
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

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_crop/css/slim.min.css">
        <!--<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">-->
        <!--<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/scss/style.css">-->

        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/iCheck/flat/blue.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/box/css/popupmodal.css" >
        <script src="<?php echo base_url() ?>assets/box/js/popupmodal-min.js">></script>

        <script src="<?php echo base_url('alert/alert.js') ?>"></script>
        <style type="text/css">
            .form-control-feedback{
                padding-right:25px !important;
            }
        </style>
<style>
.dt-buttons {
    position: initial !important;
   float: right !important;
    margin-left: 75% !important;
}


</style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->

    </head>
    <body class="hold-transition skin-blue sidebar-mini ">
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
                    <?php date('Y'); ?>
                    <a href="#"></a>.</strong> All rights
                reserved. </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li> <a href="javascript:void(0)"> <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0)"> <i class="menu-icon fa fa-user bg-yellow"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0)"> <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                        <p>nora@example.com</p>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0)"> <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a> </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->
                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li> <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading"> Custom Template Design <span class="label label-danger pull-right">70%</span> </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading"> Update Resume <span class="label label-success pull-right">95%</span> </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading"> Laravel Integration <span class="label label-warning pull-right">50%</span> </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading"> Back End Framework <span class="label label-primary pull-right">68%</span> </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a> </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->
                    </div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>
                            <div class="form-group">
                                <label class="control-sidebar-subheading"> Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p> Some information about this general settings option </p>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-sidebar-subheading"> Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p> Other sets of options are available </p>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-sidebar-subheading"> Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p> Allow the user to show his name in blog posts </p>
                            </div>
                            <!-- /.form-group -->
                            <h3 class="control-sidebar-heading">Chat Settings</h3>
                            <div class="form-group">
                                <label class="control-sidebar-subheading"> Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-sidebar-subheading"> Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-sidebar-subheading"> Delete chat history <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a> </label>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
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
       <!--datatable new-->
       <!--nprogress-->
<script src="<?php echo base_url(); ?>backend/dist/js/nprogress.js"></script>
<!--file dropify-->
<script src="<?php echo base_url(); ?>backend/dist/js/dropify.min.js"></script>
       
       
       <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.colVis.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/dataTables.responsive.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/ss.custom.js" ></script>
       
       <!--88888888888888888888888888888888-->
        <script src="<?php echo base_url() ?>assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.full.min.js"></script>
        <!-- <script type="text/javascript" src="<?php echo base_url('assets/lib/jquery-1.11.1.js') ?>"></script> -->
        <script type="text/javascript" src="<?php echo base_url('assets/dist/jquery.validate.js') ?>"></script>
        <script src="<?php echo base_url() ?>assets/admin/bower_components/moment/moment.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

        <!-- FastClick -->
        <script src="<?php echo base_url() ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url() ?>assets/admin/plugins/iCheck/icheck.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin_crop/js/slim.kickstart.min.js"></script>
        <script>


            $(function () {
                //Enable iCheck plugin for checkboxes
                //iCheck for checkbox and radio inputs
                $('.mailbox-messages input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
                });

                //Enable check and uncheck all functionality
                $(".checkbox-toggle").click(function () {
                    var clicks = $(this).data('clicks');
                    if (clicks) {
                        //Uncheck all checkboxes
                        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                    } else {
                        //Check all checkboxes
                        $(".mailbox-messages input[type='checkbox']").iCheck("check");
                        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                    }
                    $(this).data("clicks", !clicks);
                });

                //Handle starring for glyphicon and font awesome
                $(".mailbox-star").click(function (e) {
                    e.preventDefault();
                    //detect type
                    var $this = $(this).find("a > i");
                    var glyph = $this.hasClass("glyphicon");
                    var fa = $this.hasClass("fa");

                    //Switch states
                    if (glyph) {
                        $this.toggleClass("glyphicon-star");
                        $this.toggleClass("glyphicon-star-empty");
                    }

                    if (fa) {
                        $this.toggleClass("fa-star");
                        $this.toggleClass("fa-star-o");
                    }
                });
            });




            $(function () {
                //Add text editor
                $("#compose-textarea").wysihtml5();
            });
            $(document).ready(function () {
                get_locationdata();

            });


            function get_locationdata() {
                $.ajax({
                    url: "<?= base_url('calender/get_event') ?>",
                    dataType: 'json',

                    success: function (resp) {


                        // alert(resp);
                        // Now you have your event data, you can fire up Fullcalendar
                        initFullcalendar(resp);





                    }
                });


            }



            function init_events(ele) {
                ele.each(function () {

                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }
                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its//
                        revertDuration: 0     //  original position after the drag//
                    })

                })
            }

            init_events($('#external-events div.external-event'))


            var date = new Date()
            var d = date.getDate(),
                    m = date.getMonth(),
                    y = date.getFullYear()

            function initFullcalendar(even) {
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month'
                    },
                    buttonText: {
                        today: 'today',
                        month: 'month'
                    },
                    //Random default events

                    events: even,

                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function (date, allDay) { // this function is called when something is dropped

                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject')

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject)

                        // assign it the date that was reported
                        copiedEventObject.start = date
                        copiedEventObject.allDay = allDay
                        copiedEventObject.backgroundColor = $(this).css('background-color')
                        copiedEventObject.borderColor = $(this).css('border-color')

                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove()
                        }

                    }



                });
            }


            /* initialize the external events
             -----------------------------------------------------------------*/

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)







            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            //Color chooser button
            var colorChooser = $('#color-chooser-btn')
            $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                //Save color
                currColor = $(this).css('color')
                //Add color effect to button
                $('#add-new-event').css({'background-color': currColor, 'border-color': currColor})
            })
            $('#add-new-event').click(function (e) {
                e.preventDefault()
                //Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                //Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color': currColor,
                    'color': '#fff'
                }).addClass('external-event')
                event.html(val)
                $('#external-events').prepend(event)

                //Add draggable funtionality
                init_events(event)

                //Remove event from text input
                $('#new-event').val('')
            })

        </script>



        <script>
            $(function () {

                //Date range picker

                $("#date1").datepicker();
                $("#date2").datepicker();
                $("#bydaterange1").datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy',

                });
                
                $("#bydaterange2").datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy',

                });

                $("#bydaterange1_wak").datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy',

                });
                $("#bydaterange2_wak").datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy',

                });
                $("#reminder_date").datepicker({
                     autoclose: true,
                     format: 'dd-mm-yyyy',
                    todayHighlight: 'TRUE',
                    startDate:'+0d'

                });
                 $(".reminder_dates").datepicker({
                     autoclose: true,
                     format: 'dd-mm-yyyy',
                    todayHighlight: 'TRUE',
                    startDate:'+0d'

                });


                var start = moment().subtract(31, 'days');
                var end = moment();
                $('#reservation').daterangepicker({

                    locale: {format: 'DD/MM/YYYY'},
                    startDate: start,
                    endDate: end,

                });
                //Initialize Select2 Elements
                $('.select2').select2()

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})

                $('#enqdate').inputmask('dd-mm-yyyy', {'placeholder': 'dd-mm-yyyy'})
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
                //Money Euro
                $('[data-mask]').inputmask()

                //Date range picker

                //Date range picker with time picker
                //Date range as a button


                //Date picker
                $('#datepicker').datepicker({
                    autoclose: true
                })

                $('#datepicker2').datepicker({
					format: 'dd-mm-yyyy',
					autoclose: true,
					todayHighlight: true
                })

                $('#demodate').datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy',
                    todayHighlight: 'TRUE',
//                    startDate:'+0d'

                })
                 $('#end_date').datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy',
                    todayHighlight: 'TRUE',
//                    startDate:'+0d'

                })
                $('#extend_date_time').datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy',
                    todayHighlight: 'TRUE',
                    startDate:'+0d'

                })
                 $('#followupdate').datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy',
                    todayHighlight: 'TRUE',
                    startDate:'+0d'

                })






                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: false
                })
                $('.enquirytime').timepicker({
                    showInputs: false,
                    showMeridian: false
                    

                });


            })
        </script>
    </body>
</html>
