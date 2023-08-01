<?php
include "db_conn.php";
include 'nav.php';

if (isset($_POST["submit"])) {
    $provider_name = $_POST['provider_name'];
    $contact_person = $_POST['contact_person'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO `providers`(`provider_name`, `contact_person`, `email`, `phone_number`, `address`, `created_at`) 
                           VALUES (?, ?, ?, ?, ?, NOW())");

    $stmt->bind_param("sssss", $provider_name, $contact_person, $email, $phone_number, $address);
    $result = $stmt->execute();

    if ($result) {
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="container">
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="mb-3">
                    <label class="form-label">Provider Name:</label>
                    <input type="text" class="form-control" name="provider_name" placeholder="Provider Name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact Person:</label>
                    <input type="text" class="form-control" name="contact_person" placeholder="Contact Person">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number:</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address:</label>
                    <input type="text" class="form-control" name="address" placeholder="Address">
                </div>

                <div>
                    <button type="submit" class="btn btn-info" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
