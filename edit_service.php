<?php
include 'sad/db.php';

if (isset($_GET['id'])) {
    $editId = $_GET['id'];
    $editQuery = "SELECT * FROM services WHERE id = $editId";
    $editResult = mysqli_query($conn, $editQuery);

    if ($editResult && mysqli_num_rows($editResult) > 0) {
        $service = mysqli_fetch_assoc($editResult);
    } else {
        echo "Error fetching service for editing: " . mysqli_error($conn);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_service'])) {
    $updateId = $_POST['update_id'];
    $serviceName = $_POST['service_name'];
    $servicePrice = $_POST['service_price'];

    $updateQuery = "UPDATE services SET name = '$serviceName', price = $servicePrice WHERE id = $updateId";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: services.php"); // Redirect to refresh the page
        exit;
    } else {
        echo "Error updating service: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here, similar to services.php -->
</head>
<body>
<div class="content">
    <h2>Edit Service</h2>
    <form method="post" action="edit_service.php">
        <input type="hidden" name="update_id" value="<?php echo $service['id']; ?>">
        <div class="form-group">
            <label for="service_name">Service Name:</label>
            <input type="text" name="service_name" class="form-control" value="<?php echo $service['name']; ?>"
                   required>
        </div>
        <div class="form-group">
            <label for="service_price">Price (Peso):</label>
            <input type="number" name="service_price" step="0.01" class="form-control"
                   value="<?php echo $service['price']; ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" name="update_service" value="Update Service" class="btn btn-primary">
        </div>
    </form>
</div>
</body>
</html>
