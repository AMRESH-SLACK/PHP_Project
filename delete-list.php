<?php

include('config/constants.php');

if(isset($_GET['list_id'])) {

    $list_id = $_GET['list_id'];

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or  die(mysqli_error());

    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

    $sql = "DELETE FROM tbl_list WHERE list_id=$list_id";

    $res = mysqli_query($conn, $sql);

    if($res==true) {
        $_SESSION['delete'] = "List Deleted Successfully";

        header('location:'.SITEURL.'manage-list.php');
    }
    else {
        $_SESSION['delete_fail'] = "Failed To Delete List";

        header('location:'.SITEURL.'manage-list.php');
    }
}
else {
    header('location:'.SITEURL.'manage-list.php');
}

?>  