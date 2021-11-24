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

    <h3>Manage List Page</h3>

    <p>
        <?php 
        
        if(isset($_SESSION['add'])) {
            
            echo $_SESSION['add'];

            unset($_SESSION['add']);
        }

        if(isset($_SESSION['delete'])) {
            
            echo $_SESSION['delete'];

            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['update'])) {
            
            echo $_SESSION['update'];

            unset($_SESSION['update']);
        }

        if(isset($_SESSION['delete_fail'])) {
            
            echo $_SESSION['delete_fail'];

            unset($_SESSION['delete_fail']);
        }
        
        ?>
    </p>

    <div class="all-list">

        <a class="btn-primary" href=" <?php echo SITEURL ?>add-list.php">Add List</a>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>List Name</th>
                <th>Actions</th>
            </tr>

            <?php 
            
                $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                $db_select = mysqli_select_db($conn, DB_NAME);

                $sql = "SELECT * FROM tbl_list";

                $res = mysqli_query($conn, $sql);

                if($res==true) {
                  $count_rows = mysqli_num_rows($res);

                  $sn = 1;

                  if($count_rows>0) {
                      while($row=mysqli_fetch_assoc($res)) {
                          $list_id = $row['list_id'];
                          $list_name = $row['list_name'];

                          ?>

                                 <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $list_name; ?></td>
                                    <td>
                                        <a class="update" href="<?php echo SITEURL ?>update-list.php?list_id=<?php echo $list_id; ?>">Update </a> 
                                        <a class="delete" href="<?php echo SITEURL ?>delete-list.php?list_id=<?php echo $list_id; ?>">Delete</a> 
                                    </td>
                                </tr>

                          <?php
                      }
                  }
                  else {
                      ?>

                      <tr>
                          <td colspan="">No List Added Yet</td>
                      </tr>
                      
                      <?php
                  }
                }
            
            ?>

        </table>
    </div>
            </div>
</body>
</html>