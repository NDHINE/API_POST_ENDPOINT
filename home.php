<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biodata</title>
</head>


<body>
<fieldset style="width:50%;height:50%; position:center;">
    <h3 align="center">Fill out the form below</h3>
<legend align="center"> <h2 style="color:blue;">AIRFLOW SAMPLE DAG</h2></legend>
<form method="POST" action="api.php" align="center" align="center">
<label>First_Name</label><br><br>
<input type="text" name="First_Name"><br><br>
<label>Last_Name</label><br>
<input type="text" name="Last_Name"><br><br>
<label>Age</label><br><br>
<input type="number" name="Age"><br><br>
<label>Gender</label><br><br>
<select width="50%" name="Gender">
    <option> </option>
    <option>Male</option>
    <option>Female</option>
    <option>Custom</option>
</select><br><br>
<label>DOB</label><br><br>
<input type="date" name="DOB"><br><br>
<input type="Submit" value="Submit">
<input type="Reset" value="Reset">
</form>
</legend>
</fieldset>
</body>

</html>