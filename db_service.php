<?php

function userData($conn, $username) {
    $sql = "SELECT * FROM Users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        
            if ($result) {
                $row = mysqli_fetch_row($result);
                return $row;
            } else {
                return NULL;
            }
        }
}



?>