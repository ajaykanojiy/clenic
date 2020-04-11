

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customer List          
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
               <a href="<?php echo  base_url('customer/truncate') ?>" class="btn btn-danger"  onclick="return confirm('Are you sure you want to Truncate this item?');">Truncate</a> 
                          
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">

                <?php echo anchor(site_url('customer/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('customer/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped example" id="example">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
		    <!-- <th>Email</th> -->
		    <th>Pri Mobile</th>
		    <!-- <th>Whatsup No</th> -->
		    <!-- <th>Sec Mobile</th> -->
		    <!-- <th>Dob</th> -->
		    <th>Address</th>
		    <th>Aadharcard No</th>
		    <th>Image</th>
		    <th>Status</th>
            <th>Customer Status</th>
            <!-- <th>Type</th> -->
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($customer_data as $customer)
            {  if($customer->booking_status==1){
                  
                  $colur='btn-success';
            }
            else{
                $colur='btn-danger';
            }
              ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><a href="<?php echo base_url('customer/profile/'.$customer->id) ?>">       
              <?php echo $customer->name.'--'.$customer->id ?></a></td>
		    <!-- <td><?php echo $customer->email ?></td> -->
		    <td><?php echo $customer->pri_mobile ?></td>
		    <!-- <td><?php echo $customer->whatsup_no ?></td> -->
		    <!-- <td><?php echo $customer->sec_mobile ?></td> -->
		    <!-- <td><?php echo $customer->dob ?></td> -->
		    <td><?php echo $customer->address ?></td>
		    <td><?php echo $customer->aadharcard_no ?></td>
		    <td><img src="<?php echo base_url($customer->image)?>" height='50px;' ></td>
		    <td><?php echo ($customer->status==1)?'Active':'Inactive'; ?></td>
             
            <td> <?php if($customer->status==1){ ?><span class="btn <?php echo $colur; ?> "><?php echo ($customer->booking_status==1)?'available':'Booked'; ?></span>  <?php } ?></td>
      
             <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('customer/read/'.$customer->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('customer/update/'.$customer->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('customer/delete/'.$customer->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <!-- <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script> -->
        <!-- <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script> -->
       <!--  <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script> -->
    <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>      
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script> -->

        <script type="text/javascript">
  $(document).ready(function() {
    // $('#example').DataTable( {
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // } );
} );
</script>