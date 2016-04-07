<?php

include('helpers.php');
include('p2.php');

check_post_only();
$params = process_parameters();
//validate_data($params);
store_data_in_db($params);
pic_upload($params);
include('confirmation.php');
?>