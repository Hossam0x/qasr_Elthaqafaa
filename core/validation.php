<?php
  function requiredval($input){
    if(empty($input)){
      return false;
    }
    return true;
  }

  function min_val($input,$length){
    if(strlen($input)<$length){
      return false;
    }
    return true;
  }

  function max_val($input,$length){
    if(strlen($input)>$length){
      return false;
    }
    return true;
  }

  function email_val($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      return false;
    }
    return true;
  }

  
?>