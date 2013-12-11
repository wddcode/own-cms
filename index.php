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



$query = "SELECT id, title, parent_id FROM `pages` WHERE `parent_id` IS NULL ORDER BY `position` ASC LIMIT 0, 100;";

$result = mysql_query($query);

$nav = array();
while($row = mysql_fetch_object($result)) {
    if($page_id == $row->id) {
        $row->active = true;
    }
    $nav[] = $row;
};




$query = "SELECT id, title, parent_id FROM `pages` WHERE `parent_id` = $page_id LIMIT 0, 100;";
$result = mysql_query($query);

$subnav = array();

while($row = mysql_fetch_object($result)) {
    if($page_id == $row->id) {
        $row->active = true;
    }
    $subnav[] = $row;
};



// print_r($pages);





// display content
include_once 'templates/base.php';
