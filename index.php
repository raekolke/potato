<?php
    require 'functions.php';
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
    
    <!-- header -->
    <div id="header">
      <h1>
        Choose Your Own Adventure - Will You Make it as a Potato?
      </h1>
    </div>
    
    <div class="float-container">
      
      <!-- graphic -->
      <img src="" id="photo">
      
      <!-- situation -->
      <p id="situation"></p>
      
      <!-- question -->
      <p id="question"></p>
      
      <!-- options -->
      <button type="button" id="choice1"></button>
      <button type="button" id="choice2"></button>
      <button type="button" id="choice3"></button>
      
    </div>
  </div>

</body>

</html>