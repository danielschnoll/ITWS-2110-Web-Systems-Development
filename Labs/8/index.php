<html>
<head>
	<title> index </title>
</head>
<body>
	<form action="install.php" method="post">
		<div style="margin-top: 10px;">
		<label for "options"><b> Input </b></label>
		<select name="options" style="margin-left: 20px">
			<option value="Install">Install</option>
			<option value="Load">Load</option>
		</select>
		</div>
		<button style="margin-top: 10px; margin-left: 150px;" type="submit">Submit</button>
	</form>
</br>
<form action="output.php" method="post">
	<div style="margin-top: 10px;">
		<label for "options"><b> Output </b></label>
		<select name="options" style="margin-left: 10px">
			<option value="Students">Students‘ List</option>
			<option value="Grade Distribution">Grade Distribution</option>
		</select>
	</div>
	<button style="margin-top: 10px; margin-left: 150px;" type="submit">Submit</button>
	</form>
</body>
</html>