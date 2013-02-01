<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>High Scores</title>
<link type="text/css" rel="stylesheet" href="http://cache.yasyf.com/style.css" />
<META HTTP-EQUIV="Expires" CONTENT="-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<?php
if(!isset($score))
{
?>
<meta http-equiv="refresh" content="3">
<?php
}
?>

</head>
<?php
// Copyright 2011 Yasyf Mohamedali

// POST variables from flash - no GET = no cheating! ;)
$time = getdate();
$str = $time['minutes'];
$str .= "S@&#";
$check = sha1($str);
$stc = ($_GET['stc']);
$score =($_GET['points']);
$level =$_GET['level'];
$name = $_GET['mname'];
if(isset($_GET['user']))
{
$userg =$_GET['user'];
}
$nowdate = date("Y-m-d H:i:s");
// Database variables
$host = "localhost"; //database location
$user = "yasyfcom_high2"; //database username
$pass = ""; //database password
$db_name = "yasyfcom_highscores2"; //database name
//Database Connection
mysql_connect($host, $user, $pass);
$link = mysql_connect($host, $user, $pass);
mysql_select_db($db_name);
if(isset($score) && isset($name) && $check == $stc)
{
	$sql = mysql_query("INSERT INTO `highscores` (score, name, level, nowdate) VALUES (
            '".$score."' ,
            '".$name."' ,
             '".$level."' ,
            '".$nowdate."'
            )", $link)or die(mysql_error());
	 mysql_insert_id($link)or die(mysql_error());
}
?>
<body>
	<center>
<table>
  <tr>
    <td align="center">Your High Scores</td>
  </tr>
  <tr>
    <td>
      <table border="1">
      <tr>
        <td>SCORE</td>
        <td>NAME</td>
<td>LEVEL</td>
<td>DATE</td>
      </tr>
<?php
mysql_connect($host, $user, $pass);
$sql3 = "SELECT * FROM `highscores` WHERE name = '".$userg."' ORDER BY score DESC";
$result = mysql_query($sql3);	
while($data = mysql_fetch_row($result)){
  echo("<tr><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td></tr>");
}
?>
    </table>
  </td>
</tr>
</table>

<table>
  <tr>
    <td align="center">Global High Scores</td>
  </tr>
  <tr>
    <td>
      <table border="1">
      <tr>
        <td>SCORE</td>
        <td>NAME</td>
<td>LEVEL</td>
<td>DATE</td>
      </tr>
<?php
$sql2 = "SELECT * FROM `highscores` ORDER BY score DESC";
$result = mysql_query($sql2);	
while($data = mysql_fetch_row($result)){
  echo("<tr><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td></tr>");
}
?>
    </table>
  </td>
</tr>
</table>
<p ><a  rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Highscores Site</span> by <a  xmlns:cc="http://creativecommons.org/ns#" href="http://www.yasyf.com" property="cc:attributionName" rel="cc:attributionURL">Yasyf Mohamedali </a> is licensed under a <br /> <a  rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/">Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License</a>.</p>
</center>
</body>
</html>
