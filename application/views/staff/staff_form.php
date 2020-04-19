<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Staff <?php echo $button ?>          
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
        <form action="<?php echo $action; ?>" id="staff_form" method="post" enctype="multipart/form-data" autocomplete="off">
             <div class="col-xs-6">
            	    <div class="form-group">
                        <label for="int">Type <?php echo form_error('type') ?></label>
                        <select class="form-control" name="type" id="type">
                          <option value="3"<?php if($type==3){echo 'selected';} ?>>Employee</option>
                          <option value="2"<?php if($type==2){echo 'selected';} ?>>Admin</option>
                          <option value="1"<?php if($type==1){echo 'selected';} ?>>SuperAdmin</option>

                          
                      </select>

                        <!-- <input type="text" class="form-control" name="type" id="type" placeholder="Type" value="<?php echo $type; ?>" /> -->
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Name <?php echo form_error('name') ?></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Father Name <?php echo form_error('father_name') ?></label>
                        <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name" value="<?php echo $father_name; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="int">Age <?php echo form_error('age') ?></label>
                        <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="<?php echo $age; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="int">Sex <?php echo form_error('sex') ?></label>
                        <select class="form-control" name="sex" id="sex">
                            <option value="">Select Gender</option>
                          <option value="1"<?php if($sex==1){echo 'selected';} ?>>Male</option>
                          <option value="2"<?php if($sex==2){echo 'selected';} ?>>Female</option>
                          <!-- <option value="1"<?php if($sex==1){echo 'selected';} ?>>SuperAdmin</option> -->

                          
                      </select>

                        <!-- <input type="text" class="form-control" name="sex" id="sex" placeholder="Sex" value="<?php echo $sex; ?>" /> -->
                    </div>
            	    <div class="form-group">
                        <label for="address">Address <?php echo form_error('address') ?></label>
                        <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
                    </div>
            	    <div class="form-group">
                        
                        <label for="varchar">Mobile <?php echo form_error('mobile') ?></span></label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" onchange="checknum();" value="<?php echo $mobile; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Salary <?php echo form_error('salary') ?></label>
                        <input type="text" class="form-control" name="salary" id="salary" placeholder="Salary"  value="<?php echo $salary; ?>" />
                    </div>

                     <div class="form-group">
                      <label id="succ"></label>
                        <label for="varchar">Date <?php echo form_error('date') ?></label>
                        <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
                    </div>
            	  
                </div>
             <div class="col-xs-6">
                <div class="form-group">
                        <label for="varchar">Work Time <?php echo form_error('work_time') ?></label>
                        <input type="text" class="form-control" name="work_time" id="work_time" placeholder="Work Time" value="<?php echo $work_time; ?>" />
                    </div>

            	    <div class="form-group">
                        <label for="varchar">Image <?php echo form_error('image') ?></label>

                         <div style="padding-bottom:15px;">

                                                <div class="slim img-responsive" style="width:200px; height:200px;margin:0 auto;" data-label="Drop your image here" data-size="200,200" data-ratio="200:200" >

                                                    <style type="text/css">
                                                        .slim .slim-file-hopper {
                                                            /*background:url("<?php echo base_url().$image?>")!important;*/

                                                        }
                                                    </style>
                                                     <img src="<?php echo base_url().$image?>">
                                                    <input type="file" />
                                                </div>
                                                <input type="hidden" name="image" value="<?php echo $image ?>"> 
                                              
                                            </div>
                        <!-- <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>" /> -->
                    </div>
            	   
            	    <div class="form-group">
                        <label for="varchar">Id Number <?php echo form_error('id_number') ?></label>
                        <input type="text" class="form-control" name="id_number" id="id_number" placeholder="Id Number" value="<?php echo $id_number; ?>" />
                    </div>

                     <div class="form-group">
                       
                         <div style="padding-bottom:15px;">

                                                <div class="slim img-responsive" style="width:200px; height:200px;margin:0 auto;" data-label="Drop your idinty Image here" data-size="200,200" data-ratio="200:200" >

                                                    <style type="text/css">
                                                        .slim .slim-file-hopper {
                                                            /*background:url("<?php echo base_url().$id_image?>")!important;*/
                                                        }
                                                    </style>
                                                    <img src="<?php echo base_url().$id_image?>">
                                                    <input type="file" />
                                                </div>
                                                <input type="hidden" name="id_image" value="<?php echo $id_image ?>"> 
                                              
                                 </div>
                    </div>
            	    
            	   
            	    <div class="form-group">
                        <label for="int">Status <?php echo form_error('status') ?></label>
                        <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
                        <select class="form-control" name="status" id="status">
                            <option value="1"<?php if($status==1){echo 'selected';} ?>>Active</option>
                            <option value="2"<?php if($status==2){echo 'selected';} ?>>Inctive</option>
                        </select>
                    </div>
                </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('staff') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
        </div>
    </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  <script type="text/javascript">

   $(document).ready(function() {

     // alert('ajay');

  $("#staff_form").submit(function(e) {

    e.preventDefault();

}).validate({

    rules: {  
        
                    
             mobile:{

                  required:true,

                    minlength:9,

                    maxlength:10,

                    number: true

               },
     
        
    },

    submitHandler: function(form) { 
      

    }    // submit handler close
    });
    });

   function checknum(){

     var mobile=$('#mobile').val();
         alert(mobile);
        
        alert(mobile);
               $.ajax({
         
         
          url:"<?php echo base_url('staff/number_check') ?>",
                
              type:"POST", 
                 data: {mobile:mobile},
             
      success:function(data)
      {
    
        console.log(data);
          if(data==1){
      $('#mobile')[0].reset();
        html='<span class="alert alert-danger">this number allready exist</span>';
         $('#succ').text(html);
     }
    

     }
        
      }); 
   }


</script>
    </div


