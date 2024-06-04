<?php
// Include the database connection file
include("sad/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $product = $_POST["product"];
    $category = $_POST["category"];

    // Insert the data into the "supply" table
    $sql = "INSERT INTO supply (Products, Category, Stocks, Sold, Remaining, Action) VALUES ('$product', '$category', 0, 0, 0, 'Add')";
    
    if (mysqli_query($conn, $sql)) {
        // Product added successfully, perform a header redirection
        header("Location: StaffSupplies.php");
        exit(); // Ensure script execution stops after the redirection
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>
