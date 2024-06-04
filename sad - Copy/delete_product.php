<!-- delete_product.php -->
<?php
// Include the database connection file
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["product_id"])) {
    $productID = $_GET["product_id"];

    // Delete the product from the database
    $deleteSql = "DELETE FROM supply WHERE ProductID = $productID";

    if (mysqli_query($conn, $deleteSql)) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
