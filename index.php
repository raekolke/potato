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
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  var user = getCookie("username");
  if (user != "") {
    alert("Welcome again " + user);
  } else {
    user = prompt("Please enter your name:", "");
    if (user != "" && user != null) {
      setCookie("username", user, 365);
    }
  }
}
	</script>
  
  <html>
  <body>



</head>
<body onload="checkCookie()"></body>
<body>
  

	<!-- HTML elements here -->
  <div id="background">
    
    <!-- header -->
    <div id="header">
      <h1>
        CHOOSE YOUR OWN ADVENTURE - WILL YOU MAKE IT AS A POTATO?
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