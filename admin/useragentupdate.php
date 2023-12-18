<?php
	
$uid = $_GET['id'];

// view code//
$sql = "SELECT * FROM user where uid='$uid'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
	{
	  $img=$row["uimage"];
	}
@unlink('user/'.$img);

//end view code
$msg="";
$sql = "";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Agent updated</p>";
	header("Location:useragent.php?msg=$msg");
}
else
{
	$msg="<p class='alert alert-warning'>Agent not updated</p>";
		header("Location:useragent.php?msg=$msg");
}

mysqli_close($con);
?>




















<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    @include 'config.php';
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $uid = $_POST['uid'];
        $uname = $_POST['uname'];
        $uemail = $_POST['uemail'];
        $uphone = $_POST['uphone'];
        $upass = $_POST['upass'];
        $utype = $_POST['utype'];
        $uimage = $_POST['uimage'];

        // TODO: Perform validation and data sanitization as per your requirements

        // TODO: Run the update query
        $updateQuery = "UPDATE users SET uname='$uname', uemail='$uemail', uphone='$uphone', upass='$upass', utype='$utype', uimage='$uimage' WHERE uid='$uid'";

        // Display a success message if the query was successful
        if ("UPDATE users SET uname = '$uname', uemail = '$uemail', uphone = '$uphone', upass = '$upass', utype = '$utype', uimage = '$uimage' WHERE uid = $uid") {
            echo '<h2>User updated successfully!</h2>';
        } else {
            echo '<h2>Failed to update user.</h2>';
        }
    }
    ?>

    <h1>Update User</h1>

    <form method="post">
        <label for="uid">User ID:</label>
        <input type="text" name="uid" id="uid" required><br>

        <label for="uname">Username:</label>
        <input type="text" name="uname" id="uname" required><br>

        <label for="uemail">Email:</label>
        <input type="email" name="uemail" id="uemail" required><br>

        <label for="uphone">Phone:</label>
        <input type="text" name="uphone" id="uphone" required><br>

        <label for="upass">Password:</label>
        <input type="password" name="upass" id="upass" required><br>

        <label for="utype">User Type:</label>
        <input type="text" name="utype" id="utype" required><br>

        <label for="uimage">Image URL:</label>
        <input type="text" name="uimage" id="uimage" required><br>

        <input type="submit" value="Update User">
    </form>
</body>
</html>
