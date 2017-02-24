<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_publishers() {
    global $db;
    $query = "SELECT * FROM publishers ORDER BY publisherID";
    $publishers = $db->query($query);
    return $publishers;
}

function get_publisher_name($publisher_id) {
    global $db;
    $query = "SELECT publisherName FROM publishers WHERE publisherID = $publisher_id";
    $publisher = $db->query($query);
    $publisher = $publisher->fetch();
    $publiserName = $publisher['publisherName'];
    return $publiserName;
}
