<?php

header('Content-type: application/json; charset=UTF-8');

if ($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']) {
    header('No Remote Access Allowed', true, 400);
    echo json_encode([
        "success" => false,
        "msg" => "No Remote Access Allowed"
    ]);
    exit; //just for good measure
}

require_once(dirname(__FILE__) . "/conf.php");

$type = $_POST['type'];
$state = $_POST['state'];
$district = $_POST['district'];
$camp_name = $_POST['camp_name'];
$run_by = $_POST['run_by'];
$facilities = $_POST['facilities'];
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$occupation = $_POST['occupation'];
$other_occupation = array_key_exists('other_occupation', $_POST) ? $_POST['other_occupation'] : null;
$mobile = $_POST['mobile'];
$last_address = $_POST['last_address'];
$native_district = $_POST['native_district'];
$native_state = $_POST['native_state'];
$have_bankac = array_key_exists('have_bankac', $_POST) ? $_POST['have_bankac'] == 'Y' : false;
$have_jandhan = array_key_exists('have_jandhan', $_POST) ? $_POST['have_jandhan'] == 'Y' : false;
$account_no = array_key_exists('account_no', $_POST) ? $_POST['account_no'] : null;
$ifsc = array_key_exists('ifsc', $_POST) ? $_POST['ifsc'] : null;
$have_ujjwala = array_key_exists('ujjwala', $_POST) ? $_POST['ujjwala'] == 'Y' : false;
$aadhaar = array_key_exists('aadhaar', $_POST) ? $_POST['aadhaar'] : null;

global $conn;

$insertsql = "INSERT INTO `gokform` (
    type, state, district, camp_name, run_by, facilities, name, age, gender,
    occupation, other_occupation, mobile, last_address, native_district,
    native_state, have_bankac, have_jandhan, account_no, ifsc, have_ujjwala,
    aadhaar) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

$statement = $conn->prepare($insertsql);
$statement->bindParam(1, $type);
$statement->bindParam(2, $state);
$statement->bindParam(3, $district);
$statement->bindParam(4, $camp_name);
$statement->bindParam(5, $run_by);
$statement->bindParam(6, $facilities);
$statement->bindParam(7, $name);
$statement->bindParam(8, $age, PDO::PARAM_INT);
$statement->bindParam(9, $gender);
$statement->bindParam(10, $occupation);
$statement->bindParam(11, $other_occupation);
$statement->bindParam(12, $mobile);
$statement->bindParam(13, $last_address);
$statement->bindParam(14, $native_district);
$statement->bindParam(15, $native_state);
$statement->bindParam(16, $have_bankac, PDO::PARAM_BOOL);
$statement->bindParam(17, $have_jandhan, PDO::PARAM_BOOL);
$statement->bindParam(18, $account_no);
$statement->bindParam(19, $ifsc);
$statement->bindParam(20, $have_ujjwala, PDO::PARAM_BOOL);
$statement->bindParam(21, $aadhaar);
$success = $statement->execute();

echo json_encode([
    "success" => $success,
    "msg" => "done"
]);