<?php
  // Simple page redirect
  // function userRoleEqualtoAdmin($page){
  //   if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin'){
  //       return true;
  //   }else{
  //           redirect($page);
  //   }
  // }
  function userRoleEqualtoAdmin($page){
    if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin'){
        return true;
    }else{
            redirect($page);
    }
  }
  function userRoleEqualtoUser($page){
    if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user'){
        return true;
    }else{
   
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
  