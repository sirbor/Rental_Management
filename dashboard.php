<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: index.php');
    exit();
}

include('config.php');

$usertype = $_SESSION['usertype'];
$username = $_SESSION['username'];

if ($usertype == 'landlord') {
    $query = "SELECT * FROM Lease, Property WHERE Lease.LeaseID = Property.PropertyID";
} elseif ($usertype == 'tenant') {
    $query = "SELECT * FROM User,Lease, Property WHERE Lease.LeaseID = Property.PropertyID AND Lease.LeaseID = User.UserID";
}

$leases = mysqli_query($conn, $query);

$query = "SELECT * FROM Maintenance";
$maintenance = mysqli_query($conn, $query);

$query = "SELECT * FROM Payment";
$payments = mysqli_query($conn, $query);

$query = "SELECT * FROM Tenant";
$tenants = mysqli_query($conn, $query);

$query = "SELECT * FROM Property";
$properties = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="EN">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav>
    <div class="nav-container">
        <div class="logo-container">
            <a href="tenant.php"><img src="https://www.nicepng.com/png/detail/97-974743_real-estate-logo-png.png"  alt="Your logo"></a>
        </div>
        <div class="menu-container">
            <ul>
                <li><a href="#dashboard-land">Dashboard</a></li>
                <li><a href="#Tenant-land">Tenant</a></li>
                <li><a href="#payment-land">Payment</a></li>
                <li><a href="#Maintenance-land">Maintenance</a></li>
                <li><a href="#Lease-Land">Lease</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="dashboard-box">
    <div class="dashboard-header">
        <h2>Welcome, <?php echo ucfirst($username); ?></h2>
        <a href="logout.php">Logout</a>
    </div>
    <div class="dashboard-content">
        <h3 id="dashboard-land">Property</h3>
        <table>
            <tr>
                <th>PropertyID</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($properties)) { ?>
                <tr>
                    <td><?php echo $row['PropertyID']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Address']; ?></td>
                    <td><?php echo $row['City']; ?></td>
                    <td><?php echo $row['State']; ?></td>
                    <td><?php echo $row['Zip']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <h3 id="Tenant-land">Tenants</h3>
        <table>
            <tr>
                <th>TenantID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($tenants)) { ?>
                <tr>
                    <td><?php echo $row['TenantID']; ?></td>
                    <td><?php echo $row['FirstName']; ?></td>
                    <td><?php echo $row['LastName']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Phone']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <h3 id="Lease-Land">Lease</h3>
        <table>
            <tr>
                <th>LeaseId</th>
                <th>StartDate</th>
                <th>EndDate</th>
                <th>Rent</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($leases)) { ?>
                <tr>
                    <td><?php echo $row['LeaseID']; ?></td>
                    <td><?php echo $row['StartDate']; ?></td>
                    <td><?php echo $row['EndDate']; ?></td>
                    <td><?php echo $row['Rent']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <h3 id="payment-land">Payment</h3>
        <table>
            <tr>
                <th>PaymentID</th>
                <th>Date</th>
                <th>Amount</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($payments)) { ?>
                <tr>
                    <td><?php echo $row['PaymentID']; ?></td>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Amount']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <h3 id="Maintenance-land">Maintenance</h3>
        <table>
            <tr>
                <th>MaintenanceID</th>
                <th>Description</th>
                <th>Cost</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($maintenance)) { ?>
                <tr>
                    <td><?php echo $row['MaintenanceID']; ?></td>
                    <td><?php echo $row['Description']; ?></td>
                    <td><?php echo $row['Cost']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>

