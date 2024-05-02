<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Schedule Selector</title>
</head>
<body>

<h2>Select Day of the Week and Time:</h2>

<form action="process.php" method="post">
  <!-- Dropdown list for selecting day of the week -->
  <label for="dayOfWeek">Select Day of the Week:</label>
  <select id="dayOfWeek" name="dayOfWeek">
    <option value="Sunday">Sunday</option>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
  </select>
  
  <!-- Dropdown list for selecting time -->
  <label for="timeOfDay">Select Time:</label>
  <select id="timeOfDay" name="timeOfDay">
    <option value="1">1:00</option>
    <option value="2">2:00</option>
    <option value="3">3:00</option>
    <option value="4">4:00</option>
  </select>
  
  <button type="submit">Submit</button>
</form>

</body>
</html>
