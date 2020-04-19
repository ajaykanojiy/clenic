<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Staff List          
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
                <?php echo anchor(site_url('staff/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('staff/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
          <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Type</th>
		    <th>Name</th>
		    <th>Father Name</th>
		    <th>Age</th>
		    <th>Sex</th>
		    <th>Address</th>
		    <th>Mobile</th>
		    <th>Salary</th>
		    <th>Work Time</th>
		    <th>Image</th>
		    <th>Id Image</th>
		    <th>Id Number</th>
		    <th>Created At</th>
		    <th>Date</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($staff_data as $staff)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $staff->type ?></td>
		    <td><?php echo $staff->name ?></td>
		    <td><?php echo $staff->father_name ?></td>
		    <td><?php echo $staff->age ?></td>
		    <td><?php echo ($staff->sex==1)?'Male':'Female'; ?></td>
		    <td><?php echo $staff->address ?></td>
		    <td><?php echo $staff->mobile ?></td>
		    <td><?php echo $staff->salary ?></td>
		    <td><?php echo $staff->work_time ?></td>
		    <td><img src="<?php echo base_url($staff->image) ;?>" style="width:30px"></td>
		    <td><img src="<?php echo base_url($staff->id_image) ;?>"  style="width:30px"></td>
		    <td><?php echo $staff->id_number ?></td>
		    <td><?php echo $staff->createdat ?></td>
		    <td><?php echo $staff->date ?></td>
		    <td><?php echo ($staff->status==1)?'Active':'Inactive'; ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('staff/read/'.$staff->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('staff/update/'.$staff->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('staff/delete/'.$staff->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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