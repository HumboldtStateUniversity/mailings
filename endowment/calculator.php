<!DOCTYPE html>
<!-- code by webdevtrick ( https://webdevtrick.com) -->
<html>
<head>
  <title>Simple Calculator In PHP | Webdevtrick.com</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container" style="margin-top: 50px">

  <?php

  // If the submit button has been pressed
  if(isset($_POST['submit']))
  {
    // Check number values
    if(is_numeric($_POST['number1']) && is_numeric($_POST['number2']))
    {
        $total = $_POST['number1'] *.045 * $_POST['number2'];

      // Print total to the browser
      echo "<h1>\${$_POST['number1']} gift over {$_POST['number2']} years = \${$total}</h1>";

    } else {

      // Print error message to the browser
      echo 'Numeric values are required';

    }
  }
  // end PHP. Code by webdevtrick.com
  ?>

  <!-- Calculator form by webdevtrick.com -->
  <form method="post" action="calculator.php">
    <p>Gift Amount ($)</p><input name="number1" type="text" class="form-control" style="width: 150px; display: inline" />
    <p>Years (1-99)</p>
    <input name="number2" type="text" class="form-control" style="width: 150px; display: inline" />
    <input name="submit" type="submit" value="Calculate Growth" class="btn btn-primary" />
  </form>

</div>

</body>
</html>
