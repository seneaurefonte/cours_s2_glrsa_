<?php 
function dump(mixed $data){
     echo "<pre>";
      var_dump($data);
      echo "</pre>";
}

function dd(mixed $data){
     echo "<pre>";
      var_dump($data);
      die;
      echo "</pre>";
}