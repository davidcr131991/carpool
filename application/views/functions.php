<?php
/*
 * Funciones comunes 
 */
session_start();



// genera un numero aleatorio
function randomNum($length){
  $rangeMin = pow(36, $length-1);
  $rangeMax = pow(36, $length)-1;
  $base10Rand = mt_rand($rangeMin, $rangeMax);
  $newRand = base_convert($base10Rand, 10, 36);
  return $newRand;
}

// Comprueba si algún usuario está conectado
function loggedin() {
  return isset($_SESSION['username']);
}
function getUserid(){
  $emailid=$_SESSION['username'];
  $query="SELECT uid,name from users where email='".$emailid."'";
  $result = mysql_query($query);
  $fields = mysql_fetch_array($result);
  $uid=$fields['uid'];
  return $uid;
}
function name(){
  $emailid=$_SESSION['username'];
  $query="SELECT uid,name from users where email='".$emailid."'";
  $result = mysql_query($query);
  $fields = mysql_fetch_array($result);
  $uid=$fields['name'];
  return $uid;
}

function getName($uid){
  $query="SELECT name from users WHERE uid=".$uid;
  $res=mysql_query($query);
  $result=mysql_result($res, 0);
  return $result;
}
?>