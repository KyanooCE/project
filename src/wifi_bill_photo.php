<?php
include 'includes/session.php';

if (isset($_POST['upload'])) {
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        $_SESSION['error'] = 'Invalid request: ID is missing';
        header('location: wifi_bill.php');
        exit();
    }

    $id = $_POST['id'];
    $filename = $_FILES['wifi_photo']['name'];
    $file_tmp = $_FILES['wifi_photo']['tmp_name'];
    $file_error = $_FILES['wifi_photo']['error'];

    // Validate file upload
    if ($file_error === 0 && !empty($filename)) {
        $target_dir = 'assets/images/bills/wifi'; // Ensure this directory exists
        $target_file = $target_dir . basename($filename);

        if (move_uploaded_file($file_tmp, $target_file)) {
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("UPDATE wifi_bill SET wifi_photo = ? WHERE id = ?");
            $stmt->bind_param("si", $filename, $id);

            if ($stmt->execute()) {
                $_SESSION['success'] = 'Photo updated successfully!';
            } else {
                $_SESSION['error'] = 'Database error: ' . $stmt->error;
            }

            $stmt->close();
        } else {
            $_SESSION['error'] = 'Failed to upload photo. Check folder permissions.';
        }
    } else {
        $_SESSION['error'] = 'Select a valid photo to update.';
    }
} else {
    $_SESSION['error'] = 'Select photo to update first.';
}

header('location: wifi_bill.php');
exit();
?>
