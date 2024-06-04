<?php
// Include the database connection file
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["product_id"])) {
    $productID = $_GET["product_id"];
    $quantityToAdd = $_POST["quantity"];

    if (is_numeric($quantityToAdd) && $quantityToAdd >= 1) {
        // Retrieve the current quantity of the product
        $sql = "SELECT Stocks FROM supply WHERE ProductID = $productID";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $currentQuantity = $row["Stocks"];
            
            // Increase the quantity by the specified amount
            $newQuantity = $currentQuantity + $quantityToAdd;

            // Update the quantity in the database
            $updateSql = "UPDATE supply SET Stocks = $newQuantity WHERE ProductID = $productID";

            if (mysqli_query($conn, $updateSql)) {
                echo "Quantity added successfully.";
            } else {
                echo "Error adding quantity: " . mysqli_error($conn);
            }
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Invalid quantity. Please enter a valid number greater than or equal to 1.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
