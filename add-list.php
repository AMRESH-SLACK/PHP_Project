<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="<?php echo SITEURL; ?>css/style.css">
</head>
<body>

<div class="wrapper">

    <h1>TASK MANAGER</h1>

    <a class="btn-secondary" href="<?php echo SITEURL ?>">Home</a>
    <a class="btn-secondary" href=" <?php echo SITEURL ?>manage-list.php">Manage List</a>

    <h3>Add List Page</h3>

    <p>
        <?php 
        
        if(isset($_SESSION['add_fail'])) {
            
            echo $_SESSION['add_fail'];

            unset($_SESSION['add_fail']);
        }
        
        ?>
    </p>

    <form action="" method="POST">
        <table class="tbl-half">
            <tr>
                <td>List Name:</td>
                <td><input type="text" name="list_name" placeholder="Type List Name" required="required"></td>
            </tr>

            <tr>
                <td>List Descriptiion: </td>
                <td><textarea name="list_description" placeholder="Type List Description"></textarea></td>
            </tr>

            <tr>
                <td><input  class="btn-submit btn-lg" type="submit" name="submit" value="SAVE"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>

<?php 

 if(isset($_POST['submit'])) {
    $list_name = $_POST['list_name'];
    $list_description = $_POST['list_description'];

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

    $db_select = mysqli_select_db($conn, DB_NAME);

    // if($db_select==true) {
    //     echo"Dtabase Selected";
    // }

    $sql = "INSERT INTO tbl_list SET
        list_name = '$list_name',
        list_description = '$list_description'
    ";
      
      $res = mysqli_query($conn, $sql);

      if($res==true) {
        //   echo"Data Inserted";
        header('location:'.SITEURL.'manage-list.php');

        $_SESSION['add'] = "List Added Successfully";

      }
      else {
        //   echo"Failed To Insert Data";
        header('location:'.SITEURL.'add-list.php');

        $_SESSION['add_fail'] = "Failed To Add Successfully";
      }
 }

?>