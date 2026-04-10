<?php
include "../conn.php";

if (isset($_GET['id'])) { /* check if user id exists  */
    $id = $_GET['id']; /* store the user id into variable */
    $query = "UPDATE users 
              SET account_status = 'ACTIVE' 
              WHERE user_id = '$id'";

    if (mysqli_query($db_connect, $query)) { /* executes sql query */
        header("Location: user.php");
        exit();
    } else {
        echo "Error updating user status";
    }

}
?>