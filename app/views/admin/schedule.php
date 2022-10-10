
<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar_admin.php'; ?>

<div class="container-xxl mt-4 col-md-11 mx-auto"   >

   <div class="d-flex justify-content-start  gap-3 " style="width:100%">
     
      
         
            <form action="<?php echo URLROOT; ?>/admin/schedule?id=<?php echo $_GET['id'] ?>" method="post" >

                <div class="">
                    
                <input  id="date-enable" hidden name="date" >
            

                <div class=" my-2">
                <label for=""><small>Select Date Above</small></label>
                <input id="display-date" type="text" name="date" readonly class="  form-control <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date'] ?>"  name="date">
                <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                </div>


        
                <div class=" mb-1">
                <label for=""><small>Time</small> </label>
                <input type="time" name="time"  value="<?php echo $data['time'] ?>" class="form-control <?php echo (!empty($data['time_err'])) ? 'is-invalid' : ''; ?>" >
                <span class="invalid-feedback"><?php echo $data['time_err']; ?></span>
                </div>

            

                <div class="">
                    <label for=""><small> Reminders to patient</small> </label>
                <textarea class="form-control py-0 <?php echo (!empty($data['reminders_err'])) ? 'is-invalid' : ''; ?>"  name="reminders"></textarea>
                <span class="invalid-feedback"><?php echo $data['reminders_err']; ?></span>
                
                </div>

                    <div class="">
                <input id="submit-dates" type="submit" class="btn btn-secondary mt-2" >

                </div>
                </div>
             </form>
   
       

    <div id="set-schedule" style="width:100%;">
        <h3 class="text-center">Schedule and Time of <?php echo $data['doctor'] ?></h3>
        <div style="width:100%; height:600px; overflow:auto; background-color:#e6e5e5" class="mb-3 px-2">
                <div class="list-group mt-2 mb-0">
                <div class="list-group-item  mb-0 pb-0" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <div>
                    <span> Date: </span> <b> 2022-10-23  </b>  
                    <span> Time: </span> <b> 08:00 </b>  
                    </div>
                    <div>
                    <small>Edit</small>
                    <small>Remove</small>
                    </div>
              
                </div>
                <div class="mb-1">
                <small >Reminders:</small> <b> Bring your record book  </b> 

                </div>
            
                </div>

                </div>

           
        </div>

    </div>
   </div>
            
</div>

<?php require APPROOT . '/views/inc/footer.php';?>



<script>





let date =  new Date();
flatpickr('#date-enable', {
disable:[date],
dateFormat: 'Y-m-d',
minDate: "today",
inline: true,

onChange: function(){
    let date_enable = document.querySelector('#date-enable').value
    document.querySelector('#display-date').value = date_enable
}
}  

);

</script>