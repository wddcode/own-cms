<?php

// app includes
include_once 'inc/config.php';
include_once 'inc/db.php';
include_once 'inc/debug.php';

// dummy
$user = true;

// get content

// get id?
if (isset($_GET['page_id'])) {
    $page_id = $_GET['page_id'];
} else {
    $page_id = false;
}

$page_id = mysql_real_escape_string($page_id);

if (!$page_id || !is_numeric($page_id)) {
    die('no or bad page id given');
}



// db queries

// get the current page by id
// create query string
$query = "SELECT * FROM `pages` WHERE `id` = $page_id LIMIT 1;";
// run query
$result = mysql_query($query);
// map result to object
$page = mysql_fetch_object($result);

if (!$page) die('page not found');




$query = "SELECT id, title, parent_id FROM `pages` WHERE `parent_id` IS NULL ORDER BY `position` ASC LIMIT 0, 100;";
$result = mysql_query($query);

$nav = array();
while($row = mysql_fetch_object($result)) {
    if($page_id == $row->id || $page->parent_id == $row->id) {
        $row->active = true;
    }
    $nav[] = $row;
};


$query_id = ($page->parent_id) ? $page->parent_id : $page_id;
$query = "SELECT id, title, parent_id FROM `pages` WHERE `parent_id` = $query_id LIMIT 0, 100;";
$result = mysql_query($query);

$subnav = array();

while($row = mysql_fetch_object($result)) {
    if($page_id == $row->id) {
        $row->active = true;
    }
    $subnav[] = $row;
};

ob_start();
include_once('templates/' . $page->template . '.php');
$content = ob_get_clean();


// administration part
$mode = (isset($_GET['mode'])) ? $_GET['mode'] : false;

if($user && $mode == 'edit') {

    if($_POST) {

        $title = (isset($_POST['title'])) ? $_POST['title'] : false;
        // UPDATE `pages` SET `title` = 'Portfolioo' WHERE `id` = '4';
        $query = "UPDATE `pages` SET `title` = '$title' WHERE `id` = '$page->id';";
        $result = mysql_query($query);

        if($result) {
            header('Location: ' . '?page_id=' . $page->id . '&mode=edit');
            exit;
        }

    }

    ob_start();
    include_once('templates/cms_edit.php');
    $content = ob_get_clean();

}




// display content
include_once 'templates/base.php';
