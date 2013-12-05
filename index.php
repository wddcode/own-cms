<?php

// app includes
include_once 'inc/config.php';
include_once 'inc/db.php';
include_once 'inc/debug.php';


// get content

// get id?
if (isset($_GET['page_id'])) {
    $page_id = $_GET['page_id'];
} else {
    $page_id = false;
}

if (!$page_id) {
    die('no page id given');
}


// db queries

// get the current page by id

// create query string
$query = "SELECT * FROM `pages` WHERE `id` = $page_id LIMIT 1;";

// run query
$result = mysql_query($query);

// map result to object
$page = mysql_fetch_object($result);


// display content
include_once 'templates/base.php';
