<?php


// reinititlze controller
session_start();
$sessionFile="../sessions/sess_".  $_SESSION["sessionId"] ;
$_SESSION["control"] = serialize(new  MainController());
$_SESSION["sessionid"] =  null;
$_SESSION["logged"]=false;
$_SESSION["grants"]=0;

// FIND THE SESSION FILE ND DELETE IT FROM THE SYSTEM
unlink($sessionFile);
header("refresh: 0;");
}