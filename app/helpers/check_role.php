<?php
  // Simple page redirect
  function userRoleEqualtoAdmin(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin'){
        return true;
    }else{
            redirect('index');
    }
  }

  function userRoleEqualtoUser(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user'){
        return true;
    }else{
            redirect('index');
    }
  }

  function userRoleEqualtoAdmin_display_navbar(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin'){
        return require APPROOT . '/views/inc/navbar_admin.php';
    }

  }