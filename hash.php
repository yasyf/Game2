<?php
$time = getdate();
$str = $time['minutes'];
$str .= "S@&#";
echo("hash=".sha1($str));

?>