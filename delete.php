<?php
//Connecting to database
include "config.php";


if (isset($_GET['ticket_id'])) {
    $id = $_GET['ticket_id'];

    //delete query
    $sql = "DELETE FROM tickets WHERE ticket_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
        <script>
    alert('IT Ticket Deleted Successfully.');
    window.location.href = 'index.php';
       </script>
        ";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>