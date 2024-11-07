<?php
include 'db.php'; // Include database connection

// Insert student data into the database
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $whatsapp_number = $_POST['whatsapp_number'];
    $email = $_POST['email'];

    // Insert query
    $sql = "INSERT INTO students (name, whatsapp_number, email) VALUES ('$name', '$whatsapp_number', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all students from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Student Management</h1>

        <!-- Form to Add New Student -->
        <form action="index.php" method="POST">
            <input type="text" name="name" placeholder="Enter Student Name" required><br><br>
            <input type="text" name="whatsapp_number" placeholder="Enter WhatsApp Number" required><br><br>
            <input type="email" name="email" placeholder="Enter Student Email" required><br><br>
            <button type="submit" name="submit">Add Student</button>
        </form>

        <h2>Student List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>WhatsApp Number</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["whatsapp_number"] . "</td>
                                <td>" . $row["email"] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No students found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
