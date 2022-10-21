
<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar_admin.php'; ?>
<style>
.option-btn span:hover{
text-decoration: underline;
}
</style>
<div class="container-xxl  col-md-11 mx-auto mb-4" style="height: 800px;"  >
      
   <div class="d-flex justify-content-start  gap-3 " style="width:100%">
     
      
         
            <form action="<?php echo URLROOT; ?>/admin/schedule?id=<?php echo $_GET['id'] ?>" method="post" class="mt-3">

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
    <div  style="height: 30px;">
        <div class="alert-flash text-center"> <?php flash('add_sched'); ?></div>
        </div>
        <h3 class="text-center mt-1">Schedule and Time of <?php echo $data['doctor'] ?></h3>
        <div id="sched" style="width:100%; height:500px; overflow:auto; background-color:#e6e5e5" class="mb-3 px-2">

        <?php if($data['sched']): ?>
        <?php foreach($data['sched'] as $data ): ?>
         
                <div class="list-group mt-1 mb-0">
                <div class="list-group-item  mb-0 pb-0" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <div>
                    <span ><?php echo $data->id ?></span>
                    <span> Date: </span> <b> <?php echo $data->date ?> </b>  
                    <span> Time: </span> <b> <?php echo $data->time ?></b>  
                    </div>
                    <div class="option-btn">
                    <span class="text-info" style="cursor:pointer ;" data-bs-toggle="modal" data-bs-target="#announce<?php echo $data->id ?>">Announcement</span>
                    <span class="text-info" style="cursor:pointer ;" data-bs-toggle="modal" data-bs-target="#d<?php echo $data->id ?>">Edit</span>
                    <span class="text-info" style="cursor:pointer ;">Remove</span>
                    </div>
              
                </div>
                <div class="mb-1">
                <small >Reminders:</small> <b><?php echo $data->reminders ?> </b> 

                </div>
            
                </div>

                </div>


                <!-- Modal edit -->
        <div class="modal fade" id="d<?php echo $data->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <form action="<?php echo URLROOT; ?>/admin/edit_schedule?id=<?php echo $data->id ?>" method="post">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div>
                <input type="time" name="time" class="form-control mb-2" value="<?php echo $data->time ?>">

                </div>
                <div>
                <textarea name="reminders" id="" class="form-control" rows="3"><?php echo $data->reminders ?></textarea>
                </div>

                <input name="doctor_id" type="text" hidden value="<?php echo $_GET['id']?>">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <input type="submit" class="btn btn-primary" value="Save changes">


                </div>
                </div>
                </div>
                </form>

         </div>
                      <!-- Modal announce -->
        <div class="modal fade" id="announce<?php echo $data->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form action="<?php echo URLROOT; ?>/admin/announcement?id=<?php echo $data->id ?>" method="post">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Announcement</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<div>
<textarea name="announcement" id="" class="form-control" rows="3"><?php echo $data->announcement ?></textarea>
</div>

<input name="doctor_id" type="text" hidden value="<?php echo $_GET['id']?>">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

<input type="submit" class="btn btn-primary" value="Save changes">


</div>
</div>
</div>
</form>

</div>

                    <?php endforeach; ?>

                    <?php else: ?>
                    <h4 class="text-center m-5 text-secondary">No Schedule found</h4>
                    <?php endif; ?>
                </div>

              
           
            </div>

    </div>
   </div>
            
</div>



    
<?php require APPROOT . '/views/inc/footer.php';?>



<script>
  <?php echo alert_flash(); ?>
 




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