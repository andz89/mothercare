<?php

  function userRoleEqualtoAdmin($page){
    if(!isLoggedIn()){
      redirect($page);
    }
    if(isset($_SESSION['user_id']) && !$_SESSION['user_role'] == 'admin'){
      redirect($page);
    }
    if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user'){
      redirect($page);  

    }
  }
  function userRoleEqualtoUser($page){
    if(!isLoggedIn()){
      redirect($page);  
      
    }
    if(isset($_SESSION['user_id']) && !$_SESSION['user_role'] == 'user'){
      redirect($page);  
    }
    if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin'){
      redirect($page);  

   
    }
  }

  function userRoleEqualtoAdmin_display_navbar(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin'){
        return require APPROOT . '/views/inc/navbar_admin.php';
    }

  }
  function ID_isNull($id,$page){
    if(isset($id)== true){
  
          return true;
      }else{
          redirect($page);
          return false;
      }
  }
  