<?php
// Include the database connection file
include("sad/db.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["product_id"])) {
    $productID = $_GET["product_id"];

    // Delete the product from the database
    $deleteSql = "DELETE FROM supply WHERE ProductID = $productID";

    if (mysqli_query($conn, $deleteSql)) {
        // Product deleted successfully, redirect to a confirmation page
        header("Location: StaffSupplies.php");
        exit(); // Ensure that no code is executed after the header redirect
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
