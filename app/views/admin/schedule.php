
<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar_admin.php'; ?>

<div class="container-xxl"   style="margin-bottom:350px;margin-top:50px;">

   <div class="d-flex justify-content-start gap-5 " style="width:100%">
     
      
         
            <form action="<?php echo URLROOT; ?>/admin/schedule?id=<?php echo $_GET['id'] ?>" method="post" >

                <div class="">
                    
                <input  id="date-enable" hidden name="date" >
            

                <div class=" my-3">
                <input id="display-date" type="text" readonly class="form-control" name="date" placeholder="Select date above">
                </div>
                
                <div class=" mb-3">
                <input type="time" value="08:00" class="form-control" >
                </div>

            

                <div class="">
                <textarea class="form-control" placeholder="Reminders to Patient"  style="height: 100px"></textarea>
                
                </div>

                    <div class="">
                <input id="submit-dates" type="submit" class="btn btn-secondary mt-4" >

                </div>
                </div>
             </form>
   
       

    <div id="set-schedule" style="width:100%;">
        <h3 class="text-center">Schedule and Time</h3>
        <div style="width:100%; height:700px; overflow:auto;">
                <div class="list-group my-2">
                <div class="list-group-item" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small>3 days ago</small>
                </div>
                <p class="mb-1">Some placeholder content in a paragraph.</p>
                <small>And some small print.</small>
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