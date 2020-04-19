<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Staff Read          
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
        <table class="table">
	    <tr><td><b>Type</b></td><td><?php echo $type; ?></td></tr>
	    <tr><td><b>Name</b></td><td><?php echo $name; ?></td></tr>
	    <tr><td><b>Father Name</b></td><td><?php echo $father_name; ?></td></tr>
	    <tr><td><b>Age</b></td><td><?php echo $age; ?></td></tr>
	    <tr><td><b>Sex</b></td><td><?php echo ($sex===1)?'Male':'Female'; ?></td></tr>
	    <tr><td><b>Address</b></td><td><?php echo $address; ?></td></tr>
	    <tr><td><b>Mobile</b></td><td><?php echo $mobile; ?></td></tr>
	    <tr><td><b>Salary</b></td><td><?php echo $salary; ?></td></tr>
	    <tr><td><b>Work Time</b></td><td><?php echo $work_time; ?></td></tr>
	    <tr><td><b>Image</b></td><td><img src="<?php echo base_url($image); ?>" style="height:70px"></td></tr>
	    <tr><td><b>Id Image</b></td><td><img src="<?php echo base_url($id_image); ?>" style="height:70px"></td></tr>
	    <tr><td><b>Id Number</b></td><td><?php echo $id_number; ?></td></tr>
	    <tr><td><b>Created At</b></td><td><?php echo $createdat; ?></td></tr>
	    <tr><td><b>Date</b></td><td><?php echo $date; ?></td></tr>
	    <tr><td><b>Status</b></td><td><?php echo ($status==1)?'Active':'Inactive'; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('staff') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>