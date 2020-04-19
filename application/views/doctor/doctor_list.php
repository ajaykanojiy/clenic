<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Doctor List          
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
                <?php echo anchor(site_url('doctor/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('doctor/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
         <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
            <th>Number</th>
		    <th>Main Educaton</th>
		    <th>Medical Reg No</th>
		    <th>Speciality</th>
		    <th>Year Of Experience</th>
		    <th>Patients Per Hour</th>
		    <th>Fees</th>
		    <th>Gender</th>
		    <th>Image</th>
		    <th>Status</th>
		    <th>Createdat</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($doctor_data as $doctor)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $doctor->name ?></td>
            <td><?php echo $doctor->number ?></td>
		    <td><?php echo $doctor->main_educaton ?></td>
		    <td><?php echo $doctor->medical_reg_no ?></td>
		    <td><?php echo $doctor->speciality ?></td>
		    <td><?php echo $doctor->year_of_experience ?></td>
		    <td><?php echo $doctor->patients_per_hour ?></td>
		    <td><?php echo $doctor->fees ?></td>
		    <td><?php echo ($doctor->gender==1)?'Male':'Female'; ?></td>
		    <td><?php echo $doctor->image ?></td>
		    <td><?php echo ($doctor->status==1)?'Active':'Inactive'; ?></td>
		    <td><?php echo date('d-m-Y',strtotime($doctor->createdat)); ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('doctor/read/'.$doctor->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('doctor/update/'.$doctor->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('doctor/delete/'.$doctor->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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