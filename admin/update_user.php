<?php
include "../conn.php";

if (isset($_POST['update_user'])) { /* check if form was submitted */

    $user_id  = $_POST['user_id']; /* check if form was submitted */
    $username = $_POST['username']; /* check if form was submitted */
    $email    = $_POST['email']; /* check if form was submitted */

    $query = "UPDATE users /* update new data to the existing user data */
              SET username = '$username',
                  email = '$email'
              WHERE user_id = '$user_id'";

    if (mysqli_query($db_connect, $query)) { /* executes sql query */
        header("Location: user.php");
        exit();
    } else {
        echo "Error updating user";
    }

}
?>