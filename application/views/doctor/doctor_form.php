<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Doctor <?php echo $button ?>          
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
        <form action="<?php echo $action; ?>" id="doctor_form" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="col-xs-6">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
         
          <div class="form-group">
            <label for="varchar">Number <?php echo form_error('number') ?></label>
            <input type="text" class="form-control" name="number" id="number" placeholder="Number" value="<?php echo $number; ?>" />
        </div>

	    <div class="form-group">
            <label for="varchar">Main Educaton <?php echo form_error('main_educaton') ?></label>
            <input type="text" class="form-control" name="main_educaton" id="main_educaton" placeholder="Main Educaton" value="<?php echo $main_educaton; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Medical Reg No <?php echo form_error('medical_reg_no') ?></label>
            <input type="text" class="form-control" name="medical_reg_no" id="medical_reg_no" placeholder="Medical Reg No" value="<?php echo $medical_reg_no; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Speciality <?php echo form_error('speciality') ?></label>
            <select class="form-control" name="speciality" id="speciality">
                <option value="">Select</option>
                <?php foreach ($spe as $key => $value) {
                        if($value->status==1){
                    ?>
                    <option value="<?php echo $value->id ?>"<?php if($speciality==$value->id){echo 'selected';} ?>><?php echo $value->name; ?></option>
                <?php }} ?>
            </select>
            <!-- <input type="text" class="form-control" name="speciality" id="speciality" placeholder="Speciality" value="<?php echo $speciality; ?>" /> -->
        </div>
	    <div class="form-group">
            <label for="varchar">Year Of Experience <?php echo form_error('year_of_experience') ?></label>
            <input type="text" class="form-control" name="year_of_experience" id="year_of_experience" placeholder="Year Of Experience" value="<?php echo $year_of_experience; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Patients Per Hour <?php echo form_error('patients_per_hour') ?></label>
            <input type="text" class="form-control" name="patients_per_hour" id="patients_per_hour" placeholder="Patients Per Hour" value="<?php echo $patients_per_hour; ?>" />
        </div>
	   
    </div>
    <div class="col-xs-6">

          <div class="form-group">
            <label for="int">Fees <?php echo form_error('fees') ?></label>
            <input type="text" class="form-control" name="fees" id="patients_per_hour" placeholder="fees" value="<?php echo $fees; ?>" />
        </div>
         
        <div class="form-group">
            <label for="int">Gender <?php echo form_error('gender') ?></label>
            <select class="form-control" name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="1"<?php if($gender==1){echo 'selected';} ?>>Male</option>
                <option value="2"<?php if($gender==2){echo 'selected';} ?>>Female</option>
            </select>
            <!-- <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="<?php echo $gender; ?>" /> -->
        </div>

	    <div class="form-group">
            <label for="varchar">Image <?php echo form_error('image') ?></label>
            <!-- <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>" /> -->
              <div style="padding-bottom:15px;">

                                    <div class="slim img-responsive" style="width:200px; height:200px;margin:0 auto;" data-label="Drop your image here" data-size="200,200" data-ratio="200:200" >

                                        <style type="text/css">
                                            .slim .slim-file-hopper {
                                                background:url("<?php echo base_url().$image?>")!important;
                                            }
                                        </style>
                                        <input type="file"/>
                                    </div>
                                    <input type="hidden" name="image" value="<?php echo $image ?>"> 
                                  
                                </div>
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <select class="form-control" name="status" id="status">
                <option value="1"<?php if($status==1){echo 'selected';} ?>>Active</option>
                <option value="2"<?php if($status==2){echo 'selected';} ?>>Inctive</option>
            </select>
            <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
        </div>
	   
    </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('doctor') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

     <script type="text/javascript">
     $( document ).ready(function() {

         $("#doctor_form").submit(function(e) {

          e.preventDefault();

           }).validate({

    rules: {  
        
                    
             number:{

                  required:true,

                    minlength:9,

                    maxlength:10,

                    number: true

               },
     
        
    },

    submitHandler: function(form) { 
      
       // $( "#patient_form" ).submit();
        form.submit();
  
    }    // submit handler close
    });
       });
   </script>
    </div>