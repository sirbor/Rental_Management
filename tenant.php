<?php
// Start session
session_start();

// Redirect to index page if user is not logged in
if (!isset($_SESSION['username'])) {
    header('location: index.php');
    exit();
}

// Include configuration file
include('config.php');

// Get user type and username from session
$usertype = $_SESSION['usertype'];
$username = $_SESSION['username'];



// Get Tenant information for the tenant
$query = "SELECT * FROM User,Tenant WHERE User.UserID = Tenant.TenantID AND User.username='{$_SESSION['username']}'";
$tenant = mysqli_query($conn, $query);

// Get payment information for the tenant
$query = "SELECT * FROM User,Payment WHERE User.UserID = Payment.PaymentID AND User.username='{$_SESSION['username']}'";
$payments = mysqli_query($conn, $query);

// Get maintenance information for the tenant
$query = "SELECT * FROM User,Maintenance WHERE User.UserID = Maintenance.MaintenanceID AND User.username='{$_SESSION['username']}'";
$maintenance = mysqli_query($conn, $query);

// Get lease information for the tenant
$query = "SELECT * FROM User,Lease WHERE User.UserID = Lease.LeaseID AND User.username='{$_SESSION['username']}'";
$leases = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="EN">
<head>
    <title>Tenant Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<nav>
    <div class="nav-container">
        <div class="logo-container">
            <a href="dashboard.php"><img src="https://www.nicepng.com/png/detail/97-974743_real-estate-logo-png.png" alt="Your logo"></a>
        </div>
        <div class="menu-container">
            <ul>
                <li><a href="#update-tenant-details">Dashboard</a></li>
                <li><a href="#make-payment">Payment</a></li>
                <li><a href="#submit-maintenance-report">Maintenance</a></li>
                <li><a href="#submit-lease-details">Lease</a></li>
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
        <h3 id="tenant-details">Tenant Details</h3>

        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($tenant)) { ?>
                <tr>
                    <td><?php echo $row['FirstName']; ?></td>
                    <td><?php echo $row['LastName']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Phone']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <h3 id="update-tenant-details">Update Tenant Details</h3>
        <form method="post" action="update_tenant.php">
            <label>First Name:</label>
            <label>
                <input type="text" name="FirstName">
            </label>
            <br>
            <label>Last Name:</label>
            <label>
                <input type="text" name="LastName">
            </label>
            <br>
            <label>Email:</label>
            <label>
                <input type="email" name="Email">
            </label>
            <br>
            <label>Phone:</label>
            <label>
                <input type="tel" name="Phone">
            </label>
            <br>
            <input type="submit" value="Submit">
        </form>

        <h3 id="payment-reports">Payment Reports</h3>

        <table>
            <tr>
                <th>Date</th>
                <th>Amount</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($payments)) { ?>
                <tr>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Amount']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <h3 id="make-payment">Make Payment</h3>

        <form method="post" action="make_payment.php">
            <label>Date:</label>
            <label>
                <input type="date" name="date">
            </label><br>
            <label>Amount:</label>
            <label>
                <input type="number" name="amount">
            </label><br>
            <input type="submit" value="Submit">
        </form>
        <h3 id="maintenance-reports">Maintenance Reports</h3>

        <table>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Cost</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($maintenance)) { ?>
                <tr>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Description']; ?></td>
                    <td><?php echo $row['Cost']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <h3 id="submit-maintenance-report">Submit Maintenance Report</h3>

        <form method="post" action="submit_report.php">
            <label>Description:</label>
            <label>
                <input type="text" name="description">
            </label><br>
            <label>Date:</label>
            <label>
                <input type="date" name="date">
            </label><br>
            <label>Cost:</label>
            <label>
                <input type="number" name="cost">
            </label><br>
            <input type="submit" value="Submit">
        </form>
        <h3 id="lease-details">Lease Details</h3>

        <table>
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Rent</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($leases)) { ?>
                <tr>
                    <td><?php echo $row['StartDate']; ?></td>
                    <td><?php echo $row['EndDate']; ?></td>
                    <td><?php echo $row['Rent']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <h3 id="submit-lease-details">Update Lease Details</h3>
        <form method="post" action="update_lease.php">
            <label>StartDate:</label>
            <label>
                <input type="date" name="StartDate">
            </label>
            <br>
            <label>EndDate:</label>
            <label>
                <input type="date" name="EndDate">
            </label>
            <br>
            <label>Rent:</label>
            <label>
                <input type="Number" name="Rent">
            </label>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>