<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Patient Read          
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
                        <?php if($type==1){
                            $ty="Walik in";
                        }
                        elseif ($type==2) {
                             $ty="Teleponic ";
                         } ?>
        <table class="table">
	    <tr><td><b>Date</b></td><td><?php echo date('d-m-Y',strtotime($date)); ?></td></tr>
	    <tr><td><b>Type</b></td><td><?php echo $ty; ?></td></tr>
	    <tr><td><b>Name</b></td><td><?php echo $name; ?></td></tr>
	    <tr><td><b>Number</b></td><td><?php echo $number; ?></td></tr>
	    <tr><td><b>Sex</b></td><td><?php echo ($sex==1)?'Male':'Female'; ?></td></tr>
	    <tr><td><b>Dob</b></td><td><?php echo $dob; ?></td></tr>
	    <tr><td><b>Age</b></td><td><?php echo $age; ?></td></tr>
	    <tr><td><b>Address</b></td><td><?php echo $address; ?></td></tr>
	    <tr><td><b>City</b></td><td><?php echo $city; ?></td></tr>
	    <tr><td><b>Pincode</b></td><td><?php echo $pincode; ?></td></tr>
	    <tr><td><b>Service</b></td><td><?php $res=$this->Service_model->get_by_id($service);if($res){echo $res->name;} ?></td></tr>
	    <tr><td><b>Doctor</b></td><td><?php $res=$this->Service_model->get_by_id($doctor);if($res){echo $res->name;}  ?></td></tr>
	    <tr><td><b>Fees</b></td><td><?php echo $fees; ?></td></tr>
	    <tr><td><b>Amount</b></td><td><?php echo $amount; ?></td></tr>
	    <tr><td><b>Time</b></td><td><?php echo $time; ?></td></tr>
	    <tr><td><b>Createdat</b></td><td><?php echo $createdat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('patient') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>