<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Doctor Read          
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
	    <tr><td><b>Name</b></td><td><?php echo $name; ?></td></tr>
	    <tr><td><b>Main Educaton</b></td><td><?php echo $main_educaton; ?></td></tr>
	    <tr><td><b>Medical Reg No</b></td><td><?php echo $medical_reg_no; ?></td></tr>
	    <tr><td><b>Speciality</b></td><td><?php echo $speciality; ?></td></tr>
	    <tr><td><b>Year Of Experience</b></td><td><?php echo $year_of_experience; ?></td></tr>
	    <tr><td><b>Patients Per Hour</b></td><td><?php echo $patients_per_hour; ?></td></tr>
	    <tr><td><b>Fees</b></td><td><?php echo $fees; ?></td></tr>
	    <tr><td><b>Gender</b></td><td><?php echo $gender; ?></td></tr>
	    <tr><td><b>Image</b></td><td><?php echo $image; ?></td></tr>
	    <tr><td><b>Status</b></td><td><?php echo $status; ?></td></tr>
	    <tr><td><b>Createdat</b></td><td><?php echo $createdat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('doctor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>