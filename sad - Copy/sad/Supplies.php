<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Dental Clinic Sidebar</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f0f0;
        }
        .sidebar {
            background-color: #2c3e50;
            color: white;
            width: 200px;
            height: 100vh;
            position: fixed;
            overflow: auto;
        }
        .sidebar h2 {
            padding: 20px;
            margin: 0;
            background: #1abc9c;
            text-align: center;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 18px;
            border-bottom: 1px solid #333;
        }
        .sidebar ul li:hover {
            background: #16a085;
            cursor: pointer;
        }
        .sidebar ul li i {
            margin-right: 10px;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #1abc9c;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .add-product-form {
            margin-bottom: 20px;
        }
        .add-product-form label,
        .add-product-form input,
        .add-product-form button {
            display: block;
            margin-bottom: 10px;
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
        }

        /* CSS for action buttons */
        .action-button {
            display: inline-block;
            padding: 5px 1px;
            text-align: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
            border-radius: 5px;
            margin-right: -5px;
        }

        /* Edit button style */
        .edit-button {
            background-color: #3498db;
            color: #fff;
        }

        /* Delete button style */
        .delete-button {
            background-color: #e74c3c;
            color: #fff;
        }

        /* Add Quantity button style */
        .add-quantity-button {
            background-color: #2ecc71;
            color: #fff;
        }

        /* Hover effect for buttons */
        .action-button:hover {
            background-color: #555;
        }

        /* CSS for quantity form */
        .add-quantity-form {
            display: none;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Dental Clinic</h2>
    <ul>
        <li><a href="Supplies.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Supplies</a></li>
        <li><a href="addprescription.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Add Prescription</a></li>
        <li><a href="Doconlineapp.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Online App</a></li>
        <li><a href="logout.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Logout</a></li>
    </ul>
</div>

<div class="content">
    <h3>Add Product</h3>
    <!-- Add Product Form -->
    <div class="add-product-form">
        <form method="POST" action="add_product.php">
            <label for="product">Product Name:</label>
            <input type="text" id="product" name="product" required>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>

            <button type="submit">Add Product</button>
        </form>
    </div>

    <h3>Product Inventory</h3>

    <table border="1">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category</th>
            
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include the database connection file
            include("db.php");

            // Query to retrieve data from the supply table
            $sql = "SELECT * FROM supply";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data from each row in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["ProductID"] . "</td>";
                    echo "<td>" . $row["Products"] . "</td>";
                    echo "<td>" . $row["Category"] . "</td>";
                    echo '<td class="action-buttons">';
                    echo '<a href="edit_product.php?product_id=' . $row['ProductID'] . '" class="action-button edit-button">Edit</a>';
                    echo '<a href="delete_product.php?product_id=' . $row['ProductID'] . '" class="action-button delete-button">Delete</a>';
                    echo '<div class="add-quantity-form" style="display: none;">'; // Hidden by default
                    echo '<form action="add_quantity.php?product_id=' . $row['ProductID'] . '" method="POST">';
                    echo '<input type="number" id="quantity" name="quantity" min="1" required>';
                    echo '<button type="submit" class="action-button add-quantity-button">Add Quantity</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '<button class="action-button toggle-quantity-button" onclick="toggleQuantityForm(this)" style="background-color: #2ecc71; color: #fff; padding: 10px 20px; border: none; cursor: pointer; font-weight: bold; transition: background-color 0.3s; border-radius: 5px;">Add Quantity</button>
';
                    echo '</td>';
                    echo "</tr>";
                }
            } else {
                echo "No products found in the inventory.";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

<script>
    function toggleQuantityForm(button) {
        const quantityForm = button.previousSibling;
        if (quantityForm.style.display === "none" || quantityForm.style.display === "") {
            quantityForm.style.display = "block";
        } else {
            quantityForm.style.display = "none";
        }
    }
</script>
</body>
</html>
