<!-- <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crime_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
    $id = intval($_POST['id']);
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE emergency_alerts SET status=? WHERE id=?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: view_alerts.php");
    exit();
}

// Fetch alerts
$sql = "SELECT * FROM emergency_alerts ORDER BY alert_time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Police Dashboard - Alerts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .status-btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Emergency Alerts</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Alert Time</th>
                <th>Status</th>
                <th>Map</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= $row['latitude'] ?></td>
                    <td><?= $row['longitude'] ?></td>
                    <td><?= $row['alert_time'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                        <a target="_blank" href="https://www.google.com/maps?q=<?= $row['latitude'] ?>,<?= $row['longitude'] ?>">View Map</a>
                    </td>
                    <td>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="status" value="Resolved">
                            <button type="submit" class="btn btn-success btn-xs status-btn">Mark Resolved</button>
                        </form>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="status" value="Pending">
                            <button type="submit" class="btn btn-warning btn-xs">Mark Pending</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="8" class="text-center">No alerts found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?> -->


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crime_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ 1. Handle emergency alert from AJAX
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['lat']) && isset($_POST['lon'])) {
    $latitude = $_POST['lat'];
    $longitude = $_POST['lon'];

    // If user login exists, get user ID from session
    session_start();
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; // Use actual session if available

    $stmt = $conn->prepare("INSERT INTO emergency_alerts (user_id, latitude, longitude, status) VALUES (?, ?, ?, 'Pending')");
    $stmt->bind_param("idd", $user_id, $latitude, $longitude);
    if ($stmt->execute()) {
        echo "Alert stored successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    exit();
}

// ✅ 2. Handle status update by police
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
    $id = intval($_POST['id']);
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE emergency_alerts SET status=? WHERE id=?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: view_alerts.php");
    exit();
}

// ✅ 3. Fetch alerts
$sql = "SELECT * FROM emergency_alerts ORDER BY alert_time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Police Dashboard - Alerts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .status-btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Emergency Alerts</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Alert Time</th>
                <th>Status</th>
                <th>Map</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= $row['latitude'] ?></td>
                    <td><?= $row['longitude'] ?></td>
                    <td><?= $row['alert_time'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                        <a target="_blank" href="https://www.google.com/maps?q=<?= $row['latitude'] ?>,<?= $row['longitude'] ?>">View Map</a>
                    </td>
                    <td>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="status" value="Resolved">
                            <button type="submit" class="btn btn-success btn-xs status-btn">Mark Resolved</button>
                        </form>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="status" value="Pending">
                            <button type="submit" class="btn btn-warning btn-xs">Mark Pending</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="8" class="text-center">No alerts found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
<footer style="background-color: rgba(0, 0, 0, 0.7);padding: 0.1px; text-align: center; position: fixed; bottom: 0; width: 100%;">
  <h4 style="color: white;">&copy; 2025 <b>Jividha & Karuna</b> | All Rights Reserved</h4>
</footer>

</html>

<?php $conn->close(); ?>
