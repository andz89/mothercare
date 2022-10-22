<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar_admin.php'; ?>
<style>
    .hover_list:hover{
        background-color:#f4f4f4;
    }
</style>
<div class="col-md-8 mx-auto" style="min-height: 500px;">
<div class="bg-light px-3 pt-3 rounded ">
    <h1>Dr. Amorillo Hermones </h1>
    <p class="lead "><b>List of Patients </b>  <a class="lead fs-12" href="/docs/5.2/components/navbar/" role="button">Download as docs »</a> </p>
   
    <div class=" d-flex justify-content-end">
    <div class="dropdown btn btn-sm btn-primary mb-2">
    <div class=" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Filter by date
    </div>

    <ul class="dropdown-menu">

    <li><a class="dropdown-item rounded-2 active" href="#">Today</a></li>
    <li><a class="dropdown-item rounded-2" href="#">This week</a></li>
    <li><a class="dropdown-item rounded-2" href="#">This month</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item rounded-2" href="#">Custom</a></li>

    </ul>
    </div>
    </div>
 

  
    


  </div>
<div class="list-group w-auto">
<?php foreach($data['patient'] as $patient_date ): ?>
  <div class="border rounded-2 d-flex gap-3 p-2 mt-1 hover_list" >
    
    <div class="d-flex gap-2 w-100 justify-content-between ">
      <div>
        <h6 class="mb-0"><?php echo $patient_date->user_name ?></h6>
        <p class="mb-0 opacity-75">Date of colsultation: <?php echo $patient_date->date ?></p>
      </div>
      <div>
  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#patient<?php echo $patient_date->id ?>">
  Launch demo modal
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
        <button type="button" class="btn btn-primary">Save changes</button>
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

<?php require APPROOT . '/views/inc/footer.php';?>