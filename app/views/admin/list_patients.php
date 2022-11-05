<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_admin.php'; ?>
<style>
  .hover_list:hover {
    background-color: #f4f4f4;
  }

  .hide {
    display: none;
  }
</style>
<div class="col-md-8 mx-auto" style="min-height: 800px;">

  <div class="bg-light px-1 pt-3 rounded ">
    <a href="<?php echo URLROOT; ?>/admin/schedule?id=<?php echo $_GET['id'] ?>" class="btn btn-md btn-dark mb-3">Back </a>
    <h1><?php echo $data['doctor_name'] ?></h1>


    <p class="lead "><b>List of Patients </b> <a class="lead fs-12" href="/docs/5.2/components/navbar/" role="button">Download as docs »</a> </p>
    <span>Total no. of Patients: <b> <?php echo $data['patient_count'] ?></b> </span>
    <span> Total Payment recieved:<b> <?php echo $data['total_payment']  ?> </b></span>
  </div>

  <div class="list-group w-auto">
    <?php foreach ($data['patient'] as $patient_date) : ?>
      <?php if ($patient_date->date == $_GET['date']) : ?>

        <div class="border rounded-2 gap-3 p-2 mt-1 hover_list">

          <div class="d-flex gap-2 w-100 justify-content-between ">
            <div>
              <h6 class="mb-0"><?php echo $patient_date->user_name ?> </h6>
              <p class="mb-0 opacity-75 mb-1">Date of colsultation:<?php echo $patient_date->date ?></p>


              <?php if ($patient_date->payment) : ?>
                <span class="p-1  btn-success rounded-2 fs-6 text-white m-0 p-0">Paid Amout: Php <?php echo $patient_date->payment ?>
                </span>

                <span class="p-1 fs-6 fst-italic fw-lighter"> <?php echo $patient_date->payment_date ?></span>

              <?php endif ?>


            </div>
            <div>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#patient<?php echo $patient_date->id ?>">
                Show profile
              </button>
              <?php if ($patient_date->payment) : ?>
                <button class="btn btn-sm btn-success">Paid <i class="fa-regular fa-circle-check "></i></button>

              <?php else : ?>
                <button class="btn btn-sm btn-secondary">
                  <a class="text-decoration-none text-white" href="<?php echo URLROOT; ?>/admin/payment?booking_id=<?php echo $patient_date->booking_id ?>&id=<?php echo $_GET['id'] ?>&date=<?php echo  $patient_date->date ?>">
                    Pay
                  </a>
                </button>
              <?php endif ?>


              <!-- Modal -->
              <div class="modal fade" id="patient<?php echo $patient_date->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Patient Details</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">




                      <span><b> Booking ID:</b> <?php echo $patient_date->booking_id ?></span><br>
                      <span><b> Patient Name:</b> <?php echo $patient_date->user_name ?></span><br>
                      <span><b>Patient Email: </b> <?php echo $patient_date->user_email ?></span><br>
                      <span><b>Patient Contact: </b> <?php echo $patient_date->contact_number ?></span><br>
                      <span><b>Doctor:</b> <?php echo $patient_date->doctor_name ?></span><br>
                      <span><b> Schedule: </b> <?php echo $patient_date->date ?></span> @ <?php echo $patient_date->time ?><br>
                      <b> Patient's note: </b><br>
                      <p> <?php echo $patient_date->note ?></p>
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
              <div class="modal fade" id="<?php echo $patient_date->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <?php endif; ?>

    <?php endforeach; ?>



  </div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>