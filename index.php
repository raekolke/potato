<?php
    require 'getSituation.php';
    require 'database-config.php';
?>

<!DOCTYPE html>
<html>

<head>

	<!-- meta tags and title -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Potato</title>

	<!-- external and internal CSS -->
	<link rel="stylesheet" href="styles.css" media="all">
	<style>
		/* in-file CSS here */
	</style>

	<!-- external and internal JavaScript -->
	<script type="text/javascript" src="scripts.js" defer></script>
	<script>
		// in-page JavaScript here
	</script>

</head>

<body>

	<!-- HTML elements here -->
  <div id="background">
    <div id="header">
      <h1>
        Choose Your Own Adventure - Will You Make it as a Potato?
      </h1>
    </div>
    <div id="graphic">
       <img src="situation1.png">
    </div>
    <div id="content">
      <p>
        You are a potato growing in the ground.
      </p>
      <p>
        When would you like to start sprouting?
      </p>
      <button type="button">Now</button>
      <button type="button">In 1 week</button>
      <button type="button">In 1 month</button>
    </div>
  </div>

</body>

</html>