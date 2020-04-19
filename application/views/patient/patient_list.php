<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Patient List          
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
                <?php echo anchor(site_url('patient/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('patient/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
         <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Date</th>
		    <th>Type</th>
		    <th>Name</th>
		    <th>Number</th>
		    <th>Sex</th>
		    <th>Dob</th>
		    <th>Age</th>
            <th>image</th>
            <th>Id number</th>
            <!-- <th>Age</th> -->
		   <!--  <th>Address</th>
		    <th>City</th>
		    <th>Pincode</th>
		    <th>Service</th>
		    <th>Doctor</th>
		    <th>Fees</th>
		    <th>Amount</th> -->
		    <th>Time</th>
		    <!-- <th>Createdat</th> -->
            <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($patient_data as $patient)
            {
                if($patient->type==1){
                    $type='Walk IN';
                    // $color="info info-primiry";
                    $color="alert alert-success";
                }
                else {
                 $type='Telephonic';
                 $color="alert alert-danger";
                }
                ?>
                <tr class="<?php echo $color ?>">
		    <td><?php echo ++$start ?></td>
		    <td><?php echo date('d-m-Y',strtotime($patient->date)) ?></td>
		    <td class=""><?php echo $type ?></td>
		    <td><?php echo $patient->name ?></td>
		    <td><?php echo $patient->number ?></td>
		    <td><?php echo ($patient->sex==1)?'Male':'Female'; ?></td>
		    <td><?php echo date('d-m-Y',strtotime($patient->dob)) ?></td>
		    <td><?php echo $patient->age ?></td>
            <td> <img src="<?php echo base_url($patient->image) ?>" style="height: 40px"></td>
             <td><?php echo $patient->id_number ?></td>
<!-- 		    <td><?php echo $patient->address ?></td>
		    <td><?php echo $patient->city ?></td>
		    <td><?php echo $patient->pincode ?></td>
		    <td><?php $res=$this->Service_model->get_by_id($patient->service);if($res){echo $res->name;} ?></td>
		    <td><?php $res=$this->Doctor_model->get_by_id($patient->doctor);if($res){echo $res->name;}  ?></td>
		    <td><?php echo $patient->fees ?></td>
		    <td><?php echo $patient->amount ?></td> -->
		    <!-- <td><?php echo $patient->time ?></td> -->
		    <td><?php echo date('h:m:s',strtotime($patient->createdat)) ?></td>
            <td>
                <select class="form-control" name="status">
                  <option value="" >Select</option>  
                 <option value="1"<?php if($patient->status==1){echo 'selected';} ?>>In queue</option>
                 <option value="2"<?php if($patient->status==2){echo 'selected';} ?>>Checked In </option>
                 <option value="3"<?php if($patient->status==3){echo 'selected';} ?>>With Doc</option>
                 <option value="4"<?php if($patient->status==4){echo 'selected';} ?>>Checked out </option>
                 <option value="5"<?php if($patient->status==5){echo 'selected';} ?>>Now Show</option>
                </select>
            </td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('patient/read/'.$patient->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('patient/update/'.$patient->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('patient/delete/'.$patient->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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