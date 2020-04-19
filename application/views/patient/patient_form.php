
 <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/age_ui.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Patient <?php echo $button ?>          
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
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" autocomplete="off" id="patient_form">
             <div class="alert alert-warning alert-dismissible ">
   <div class="row">
    <div class="col-xs-6">
         <!-- <div class="form-group"> -->
            <label for="int">Type <?php echo form_error('type') ?></label>
            <select class="form-control" name="type" id="type">
                <option value="1"<?php if($type==1){echo 'selected';} ?>>Walk in</option>
                <option value="2"<?php if($type==2){echo 'selected';} ?>>Telephonic</option>
                <!-- <option value="3"<?php if($type==3){echo 'selected';} ?>>Appoinment</option> -->
            </select>
          
             </div>
     <div class="col-xs-6">
             <div class="form-group">
            <label for="date">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control " name="date" id="date" placeholder="Date"
             value="<?php if($date){echo $date;}else{echo date('d-m-Y');} ?>" />
        </div>
    </div>
             </div>

            </div>
            <div class="col-xs-6">
	    
	   
        
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Number <?php echo form_error('number') ?></label>
            <input type="text" class="form-control" name="number" id="number" placeholder="Number" value="<?php echo $number; ?>" />
          <!-- <input type="number" pattern="\d{3}[\-]\d{3}[\-]\d{4}" class="form-control" name="number" id="number" placeholder="Number" value="<?php echo $number; ?>" required> -->
        </div>
	    <div class="form-group">
            <label for="int">Sex <?php echo form_error('sex') ?></label>
            <select class="form-control" name="sex" id="sex">
                <option value="">Select Gender</option>>
                <option value="1"<?php if($sex==1){echo 'selected';} ?>>Male</option>
                <option value="2"<?php if($sex==2){echo 'selected';} ?>>Female</option>
            </select>
            <!-- <input type="text" class="form-control" name="sex" id="sex" placeholder="Sex" value="<?php echo $sex; ?>" /> -->
        </div>
	    <div class="form-group">
            <label for="date">Dob <?php echo form_error('dob') ?></label>
            <input type="text" class="form-control " name="dob" id="dob" placeholder="mm-dd-yyyy" onchange="getAge();" value="<?php echo $dob; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Age <?php echo form_error('age') ?></label>
            <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="<?php echo $age; ?>" />
        </div>
        <div class="form-group">
            <label for="address">Address <?php echo form_error('address') ?></label>
            <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
        </div>
        
       <div class="form-group">
            <label for="varchar">City <?php echo form_error('city') ?></label>
            <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $city; ?>" />
        </div>
         
        <div class="form-group">
            <label for="int">Pincode <?php echo form_error('pincode') ?></label>
            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo $pincode; ?>" />
        </div>
	   
    </div>
	   <div class="col-xs-6">

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
                    </div>
                 
                  <div class="form-group">
                        <label for="varchar">Id Number <?php echo form_error('id_number') ?></label>
                        <input type="text" class="form-control" name="id_number" id="id_number" placeholder="Id Number" value="<?php echo $id_number; ?>" />
                    </div>

	    <div class="form-group">
            <label for="int">Doctor <?php echo form_error('doctor') ?></label>
            <select class="form-control" name="doctor" id="doctor">
                <option value="">Select</option> 
                <?php foreach ($doc as $key => $value) {?>
                   <option value="<?php echo $value->id ?>"<?php if($doctor==$value->id){echo 'selected';} ?> ><?php echo $value->name ?></option>
                <?php } ?>
               
            </select>
            <!-- <input type="text" class="form-control" name="doctor" id="doctor" placeholder="Doctor" value="<?php echo $doctor; ?>" /> -->
        </div>
        
         <div class="form-group" id="ser" style="">
            <label for="int">Service <?php echo form_error('service') ?></label>
            <select class="form-control" name="service" id="service">
                <option value="">Select Service</option>
                <?php foreach ($serv as $key => $value) {?>
                   <option value="<?php echo $value->id ?>"<?php if($service==$value->id){echo 'selected';} ?> ><?php echo $value->name ?></option>
                <?php } ?>
               
            </select>
            <!-- <input type="text" class="form-control" name="service" id="service" placeholder="Service" value="<?php echo $service; ?>" /> -->
        </div>

	    <div class="form-group" id="fee" style="">
            <label for="varchar">Fees <?php echo form_error('fees') ?></label>
            <input type="text" class="form-control" name="fees" id="fees" placeholder="Fees" value="<?php echo $fees; ?>" />
        </div>
	    <div class="form-group" id="amu" style="">
            <label for="int">Amount <?php echo form_error('amount') ?></label>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
        </div>
	   <!--  <div class="form-group">
            <label for="varchar">Time <?php echo form_error('time') ?></label>
            <input type="text" class="form-control" name="time" id="time" placeholder="Time" value="<?php echo $time; ?>" />
        </div> -->
    </div>

	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('patient') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 


     <script type="text/javascript">
     $( document ).ready(function() {

         $("#patient_form").submit(function(e) {

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





         $('#dob').datepicker({
      // autoclose: true
       // format: 'dd-mm-yyyy'
       format: 'mm-dd-yyyy'
    })


      $("#service").change(function(){
        var id=$(this).val();
      $.ajax({
    type: "POST",
    url: "<?php echo base_url('patient/patient_fess')?>",
    data:{id:id},
    // contentType: "application/json; charset=utf-8",
    // dataType: "json",
    success: function(result){
        // alert(result);
        console.log(result);

        if(result){
          
         $('#fees ').val(result);
        }
    }
});
    });


       $("#type").change(function(){        
        var id=$(this).val();
    
       if(id==2){
         $('#fee').hide();
         $('#amu').hide();
         $('#ser').hide();
       }
       else{
         $('#fee').show();
         $('#amu').show();
         $('#ser').show();
       }

       
    });
     
      
});

    function getAge() {
      var da=$('#dob').val();  

      var today = new Date();  
      // alert(today);  
      var birthDate = new Date(da);
      // alert(birthDate);
      var age = today.getFullYear() - birthDate.getFullYear();
      
  
    $('#age').val(age);
    
}



   
   // function checknum(){

   //   var number=$('#number').val();
   //       alert(number);
        
   //      alert(number);
   //             $.ajax({
         
         
   //        url:"<?php echo base_url('patient/number_check') ?>",
                
   //            type:"POST", 
   //               data: {number:number},
             
   //    success:function(data)
   //    {
    
   //      console.log(data);
   //        if(data==1){
   //    $('#number')[0].reset();
   //      html='<span class="alert alert-danger">this number allready exist</span>';
   //       $('#succ').text(html);
   //   }
    

   //   }
        
   //    }); 
   // }





      


</script>
      

    