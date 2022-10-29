<?php 
require APPROOT . '/views/inc/header.php';

userRoleEqualtoAdmin_display_navbar();
//navbar as user
require APPROOT . '/views/inc/navbar.php'; 




?>
<style>
  textarea{
    background-color: transparent;
    border: none;
    resize: none;
  }
  textarea:focus{
    border: none;
    outline: none;
    resize: none;
  }
</style>
    
<div class="col-md-5 mx-auto mt-3 mb-5  ">
      <div class="card card-body bg-light  ">
        <p >
        <a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/pages/doctors"> <b>&#8592;</b> Back</a>

        </p>

        <h2 class="mt-1">Book Appointment</h2>
        <p>Please fill out this form to book appointment with us</p>

        <span><span class="fw-bold">Patient Name: </span><?php echo  $_SESSION['user_name'] ?></span>
        <span><span class="fw-bold">Email: </span><?php echo  $_SESSION['user_email']?></span>
        <span><span class="fw-bold">Contact No. : </span><?php echo   $_SESSION['user_contact_number'] ?></span>
        <span> <span  class="fw-bold">Doctor : </span><?php echo $data['doctor_name']; ?>  </span>

     

      
        <form action="<?php echo URLROOT; ?>/users/booking?id=<?php echo $data['doctor_id']?>" method="post">
        <div  class="bg-info p-3   reminders-container" style="display:none ;"> 
        <div class="d-flex">
        <span  class="fw-bold ">reminders:</span>
             <textarea readonly name="reminders" class="reminders" style="width: 100%;"> </textarea> 
        </div>

        </div> 
          <div class="form-group mt-3">
            <label for="date">date: <sup>*</sup></label>
            <input  id="date" name="date" class="form-control form-control-lg <?php echo (!empty($data['date_err'])) ? 'is-invalid' : '';   ?>" value=<?php echo $data['date']; ?>  >
            <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
          </div>


          <div class="form-group mt-3">
            <label for="time">Time: <sup>*</sup></label>
            <input id="time" readonly   name="time" class="form-control form-control-lg <?php echo (!empty($data['time_err'])) ? 'is-invalid' : ''; ?>" value=<?php echo $data['time']; ?> >
            <span class="invalid-feedback"><?php echo $data['time_err']; ?></span>
          </div>
  
       
          
          
          <div class="form-group mt-3">
            <label for="note">Note: <sup>*</sup></label>
            <textarea  name="note" class="form-control form-control-lg <?php echo (!empty($data['note_err'])) ? 'is-invalid' : ''; ?>" ><?php echo $data['note']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['note_err']; ?></span>
          </div>
          <br>

          <div class=" d-flex justify-content-between">
            <div class="">
              <input type="submit" value="Submit"  style="background-color:#EE6983;" class="btn  btn-block text-white">
            </div>
         
          </div>
        </form>
      </div>
    </div>


  <div hidden class="sched_dates">
  <?php foreach($data['array_sched'] as $date): ?>
  <span> <?php echo $date->date; ?></span>
  <?php endforeach; ?>
  </div>

  <div hidden class="sched">
  <?php foreach($data['array_sched'] as $date): ?>
    <div>
    <span class="id"> <?php echo $date->id; ?></span>
    <span class="d-date"><?php echo $date->date; ?></span>
    <span class="t-time"> <?php echo $date->time; ?></span>
    <span class="r-reminders"> <?php echo $date->reminders; ?></span>
    </div>

  <?php endforeach; ?>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
    
<script>




let date =  new Date();
let dates_enable =  document.querySelector('.sched_dates').innerText

flatpickr('#date', {
disable:[date,
function(date) {
     // return true to disable
     //disable saturday and sunday
     return (
       date.getDay() === 0 ||
       date.getDay() === 1 ||
       date.getDay() === 2 ||
       date.getDay() === 3 ||
       date.getDay() === 4 ||
       date.getDay() === 5 ||
       date.getDay() === 6
     
       );

 }
],
enable:[ function(date) {
            const rdatedData = `${dates_enable}`; 
            return rdatedData.includes(date.toISOString().substring(0, 10));
        }],

dateFormat: 'Y-m-d',
minDate: "today",
onChange: function(){

let selected = document.querySelector('#date').value
let sched = document.querySelector('.sched')
let date = sched.querySelectorAll('.d-date')

date.forEach((e)=>{
  if(e.innerText == selected){
   let time =  e.parentElement.querySelector('.t-time').innerText 
   let reminders =  e.parentElement.querySelector('.r-reminders').innerText 

      document.querySelector('#time').value = time 

      document.querySelector('.reminders-container').style.display = 'block'
      document.querySelector('.reminders').value = reminders

    }
})

}


}       
);
</script>