<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Expense List          
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
            	<a href="<?php echo base_url('refund/create') ?>" class="btn btn-success">Refund </a>	
            	<a href="<?php echo base_url('income_register/create') ?>" class="btn btn-success">Emp To Emp </a>	
                <?php echo anchor(site_url('expense/create'), 'Expense', 'class="btn btn-danger"'); ?>
		<?php echo anchor(site_url('expense/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Date</th>
		    <th>Transaction Id</th>
		    <th>Category</th>
		    <!-- <th>Subcategory</th> -->
		    <!-- <th>Item Detail</th> -->
		    <th>Paying Employee</th>
		    <th>Amount Paid</th>
		    <th>Payment Mode</th>
		    <th>Building Id</th>
		    <th>Room Id</th>
		    <th>Room Type</th>
		  
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($expense_data as $expense)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo date('d-m-Y',strtotime($expense->date))?></td>
		    <td><?php echo $expense->transaction_id ?></td>
		    <td><?php $res=$this->Expense_category_model->get_by_id($expense->category);if($res){echo $res->name;} ?></td>
		
		    <td><?php $res=$this->Employee_model->get_by_id($expense->paying_employee);if($res){echo $res->name.'-('.$res->id.')';} ?></td>
		    <td><?php echo $expense->amount_paid ?></td>
		    <td><?php $res=$this->Payment_mode_model->get_by_id($expense->payment_mode);if($res){echo $res->name;} ?></td>
		    <td><?php $res=$this->Building_model->get_by_id($expense->building_id);if($res){echo $res->name;}?></td>
		    <td><?php echo $expense->room_id ?></td>
		    <td><?php $res=$this->Room_type_model->get_by_id($expense->room_type);if($res){echo $res->name;} ?></td>
		    <!-- <td><?php echo $expense->sic_bill ?></td> -->
		    <!-- <td><?php echo $expense->comment ?></td> -->
		    <!-- <td><?php echo $expense->vendor_bill ?></td> -->
		    <!-- <td><?php echo $expense->shop_name ?></td>
		    <td><?php echo $expense->vendor_type ?></td>
		    <td><?php echo $expense->location ?></td>
		    <td><?php echo $expense->mobile ?></td>
		    <td><?php echo $expense->asset_id ?></td>
		    <td><?php echo $expense->model ?></td>
		    <td><?php echo $expense->manufacturing_company ?></td>
		    <td><?php echo $expense->warranty ?></td>
		    <td><?php echo $expense->stayinclass_asset_id ?></td> -->
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('expense/read/'.$expense->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('expense/update/'.$expense->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('expense/delete/'.$expense->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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