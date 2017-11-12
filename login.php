<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="Orange.ico">
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="frm">
		<form action="process.php" method="POST">
			<p>
				<label>Username:</label>
				<input type="text" id="user" name="user" />
			</p>
			<p>
				<label>Password:</label>
				<input type="password" id="pass" name="pass" />
			</p>
			<p>
				<input type="submit" id="btn" value="Login" />
			</p>
		</form>
	</div>
</body>
</html>
