<?php


function script_edit_rooms_admin()
{
  return

    "

  let imgInp = document.querySelector('#imgInput')
  if(imgInp == false){
  
  }else{
    imgInp.onchange = evt => {
  
      const [file] = imgInp.files
   
      if (file) {
        blah.src = URL.createObjectURL(file)
      }
  
    
      
    }
  }";
}

function alert_flash()
{
  return "
  

    let alert_flash = document.querySelector('.alert-flash')
    if(alert_flash.innerHTML == ' '){

    }else{
    
      setTimeout(function(){
        
        alert_flash.style.display = 'none'
      }, 3000);

    }
    
    ";
}
