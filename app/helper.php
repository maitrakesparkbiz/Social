<?php


if(!function_exists("file_upload")){

    function file_upload($file,$folerName){

      $name = time().'_'.$file->getClientOriginalName();
      $file->storeAs('public/'.$folerName,$name);
      return $folerName.'/'.$name;

    }
}
?>