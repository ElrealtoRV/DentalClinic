<!-- edit_product.php -->
<?php
// Include the database connection file
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["product_id"])) {
    $productID = $_GET["product_id"];
    
    // Retrieve the product details from the database
    $sql = "SELECT * FROM supply WHERE ProductID = $productID";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $productName = $row["Products"];
        $category = $row["Category"];
    } else {
        echo "Product not found.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $newProductName = $_POST["new_product_name"];
    $newCategory = $_POST["new_category"];
    $productID = $_POST["product_id"];

    // Update the product details in the database
    $updateSql = "UPDATE supply SET Products = '$newProductName', Category = '$newCategory' WHERE ProductID = $productID";
    
    if (mysqli_query($conn, $updateSql)) {
        echo "Product details updated successfully.";
    } else {
        echo "Error updating product details: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your HTML and CSS for the edit form here -->
</head>
<body>
    <h3>Edit Product</h3>
    <form method="POST">
        <input type="hidden" name="product_id" value="<?php echo $productID; ?>">
        <label for="new_product_name">New Product Name:</label>
        <input type="text" id="new_product_name" name="new_product_name" value="<?php echo $productName; ?>" required>

        <label for="new_category">New Category:</label>
        <input type="text" id="new_category" name="new_category" value="<?php echo $category; ?>" required>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>
