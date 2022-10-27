<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar_admin.php'; ?>

<style>
    .all:hover{
        text-decoration: underline;
    }
  
</style>
<div class="container col-md-8 mx-auto my-3" style="min-height:500px" >
    
<div class="list-group ">
    <div class="px-2 pt-4 pb-2 text-white" style="background-color:#EE6983; ">
        <h4>List of Bookings</h4>
        <hr class="my-4 bg-white p-0 m-0">
        <span>Total no. of bookings: <b><?php echo $data['total_bookings'] ?> </b></span>
        <!-- <span>Total no. of bookings: <b>4 </b></span> -->
            <div class="d-flex justify-content-end">
                    <div >
                    <span  class="btn  btn-sm text-white  all" > See all </span>
                    </div>
                    <div >
                    <span  class="btn  btn-sm btn-primary  custom" id="custom" > Select date </span>
                    </div>
                    </div>
            </div>
    
    </div>


<div id="main" class="list-group w-auto">
<div class="container-display-date" style="display:none ;">
   <div>Total Number of bookings on <span class="display-date"> </span>: <b class="count">  </b> </div> 
</div>
<?php foreach($data['booking'] as $patient_date ): ?>


  <div class="border rounded-2 gap-3 p-2 mt-1 hover_list bg-white"   >
    
    <div class="d-flex gap-2 w-100 justify-content-between ">
      <div>
        <h6 class="mb-0"> <b> <?php echo $patient_date->user_name ?></b></h6>
        <p class="mb-0 opacity-75 ">Date of colsultation: <b class="date">  <?php echo $patient_date->date ?></b></p>
        <span><?php echo $patient_date->doctor_name ?></span>
      </div>
      <div>
  
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#patient<?php echo $patient_date->id ?>">
  Show Details
</button>

<!-- Modal -->
<div class="modal fade" id="patient<?php echo $patient_date->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Patient Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

           
             
            <span><b> Booking ID:</b>  <?php echo $patient_date->booking_id ?></span><br>
            <span><b> Patient Name:</b>  <?php echo $patient_date->user_name ?></span><br>
            <span><b>Patient Email:  </b> <?php echo $patient_date->user_email?></span><br>
            <span><b>Patient Contact: </b>  <?php echo $patient_date->contact_number?></span><br>
            <span><b>Doctor:</b> <?php echo $patient_date->doctor_name ?></span><br>
            <span><b> Schedule: </b> <?php echo $patient_date->date ?></span> @ <?php echo $patient_date->time ?><br>
            <b> Patient's note: </b><br>
             <p > <?php echo $patient_date->note ?></p>
            <span><b> Patient to Bring:</b></span><?php echo $patient_date->reminders ?><br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
        <!-- Modal -->
<div class="modal fade" id="<?php echo $patient_date->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
      </div>
   
    </div>




  </div>


  <?php endforeach; ?>



  </div>

</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

<script>
  flatpickr('#custom', {
            dateFormat: 'Y-m-d',
            onChange: function(e){
              let dates =  document.querySelector('#custom').value
           
                      
         let date_x = document.querySelectorAll('.date')
          let count = 0
         for(var i=0; i<date_x.length; i++){
         let date_element =  date_x[i].innerText
         let parent = date_x[i].parentElement.parentElement.parentElement.parentElement
         parent.style.display = 'none'
        

      
             if(date_element.trim() == dates.trim()){
           
               count++
                parent.style.display = 'block'
     
             }
          
            
                        
                        }

          document.querySelector('.display-date').innerText = dates
          document.querySelector('.count').innerText = count

          document.querySelector('.container-display-date').style.display = 'block'
            //   Array.from(date_x).forEach((e)=>{
            //     console.log(e.style.display == 'none')
              
            //  if(e.style.display == 'none'){
            //     console.log('no found bookings')
            //  }
            //   }) 
           
                   },

            }  

            );
  document.body.addEventListener('click',(e)=>{


if(e.target.classList.contains('all')){
  // let month = date_filter.getMonth() + 1;
  let dates = document.querySelectorAll('.date')
  // let month = date_today.split('-')[1]

  for(var i=0; i<dates.length; i++){
    let parent = dates[i].parentElement.parentElement.parentElement.parentElement
      parent.style.display = 'block';
      document.querySelector('.container-display-date').style.display = 'none'
   
   
  }
}


})
</script>