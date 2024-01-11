<?php

include("../config/function.php");

function InsertCode($tableName, $data)
{
$count = 0;
    global $conn;
    $table = validate($tableName);
    $colums = array_keys($data);
    $values = array_values($data);

    $finalColumn = implode(',', $colums);
    // print_r("'".implode("'", $values).",'");exit;

    // $finalValues = "'". implode("',", $values) . "',";
    // print_r($finalValues);exit;
    $finalValues = '';
foreach ($values as $key => $value) {

    if($count != count($values) - 1){
        $finalValues .= "'";

$finalValues.=$value;
$finalValues .= "'";
$finalValues .= ",";

    }
    else{

        $finalValues.='"'.$value.'"';

    }
    $count++;
}

      //check the ooutput
    $query = "INSERT INTO $table ($finalColumn)  VALUES ($finalValues) ";
    // print_r($query);exit;
    $result = mysqli_query($conn, $query);
    return $result;
}
if (isset($_POST['saveAdmin'])) {

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

    if ($name !== '' && $email !== "" && $password !== "") {
        $emailCheck = mysqli_query($conn, "SELECT *FROM admins WHERE email='$email'");
        if ($emailCheck) {
            if (mysqli_num_rows($emailCheck) > 0) {
                redirect('admins-create.php', "Email Already used by another user.");
            }
        }

        $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $bcrypt_password,
            'phone' => $phone,
            'is_ban' => $is_ban,

        ];
        $result = InsertCode('admins', $data);
        if ($result) {
            redirect('admins.php', 'Admin Created Successfully');
        } else {
            redirect('admins-create.php', 'something went wrong');
        }
    } else {
        redirect('admins-create.php', 'Please fill required fields');
    }
    
   
}
