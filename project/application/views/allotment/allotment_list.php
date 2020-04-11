<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Allotment List          
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- ******************/master header end ****************** -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
              
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('allotment/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('allotment/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
         <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Customer Id</th>
		    <th>Employee Id</th>
		    <th>Building Id</th>
		    <th>Room Id</th>
            <th>Bed Rent</th>
		    <th>Booking Rent</th>
		    <th>From Date</th>
		    <th>To Date</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($allotment_data as $allotment)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php $res=$this->Customer_model->get_by_id($allotment->customer_id)?>
            <?php if($res){echo $res->name.'-('.$res->id.')';} ?></td>
		    <td><?php $res=$this->Employee_model->get_by_id($allotment->employee_id)?><?php if($res){ echo $res->name.'-('.$res->id.')';} ?></td>
		    <td><?php $res=$this->Building_model->get_by_id($allotment->building_id)?><?php if($res){ echo $res->name ;}?></td>
		    <td><?php $res=$this->Buil_details_model->get_by_id($allotment->room_id)?><?php if($res){ echo $res->name ;}?></td>
		    <td><?php echo $allotment->amount ?></td>
            <td><?php echo $allotment->rent ?></td>
		    <td><?php echo date('d-m-Y',strtotime($allotment->from_date))?></td>
		    <td><?php echo date('d-m-Y',strtotime($allotment->to_date)) ?></td>
		    <td><?php echo ($allotment->status==1)?'Active':'Inactive'; ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('allotment/read/'.$allotment->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('allotment/update/'.$allotment->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('allotment/delete/'.$allotment->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>