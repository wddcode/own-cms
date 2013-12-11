<?php

$conn = mysql_connect($db_host, $db_user, $db_pass);

if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

// mysql_set_charset('utf8', $conn);

mysql_select_db($db_name, $conn);

