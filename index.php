<!DOCTYPE html>
<html lang="EN">
<head>
    <title>Makeja Rental System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="login-box">
    <div class="login-header">
        <h2>Makeja System</h2>
    </div>
    <form method="post" action="signup.php">
        <div class="form-group">
            <label>Username:</label>
            <label>
                <input type="text" name="username" required>
            </label>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <label>
                <input type="password" name="password" required>
            </label>
        </div>
        <div class="form-group">
            <label>User Type:</label>
            <label>
                <select name="usertype" required>
                    <option value="landlord">Landlord</option>
                    <option value="tenant">Tenant</option>
                </select>
            </label>
        </div>
        <button type="submit" name="signup">Sign Up</button>
    </form>

    <hr>
    <form method="post" action="login.php">
        <div class="form-group">
            <label>Username:</label>
            <label>
                <input type="text" name="username" required>
            </label>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <label>
                <input type="password" name="password" required>
            </label>
        </div>
        <div class="form-group">
            <label>User Type:</label>
            <label>
                <select name="usertype" required>
                    <option value="">Select User Type</option>
                    <option value="landlord">Landlord</option>
                    <option value="tenant">Tenant</option>
                </select>
            </label>
        </div>
        <button type="submit" name="login">Login</button>
    </form>

</div>
</body>
</html>
