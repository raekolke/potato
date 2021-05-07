// tracking variable initialized
trackProgress = 1;

// loading the first situation on window load
window.onload = function() {
	
	loadFileInto(1, "question_table");
	
};

// generic AJAX function to load fromFile into object with ID whereTo
function loadFileInto(fromIdentifier, fromTable) {

	// creating a new XMLHttpRequest object
	ajax = new XMLHttpRequest();
  
  // define the fromFile value based on PHP URL
  fromFile = "functions.php?id=" + fromIdentifier + "&table=" + fromTable;

	// defines the GET/POST method, source, and async value of the AJAX object
	ajax.open("GET", fromFile, true);

	// prepares code to do something in response to the AJAX request
	ajax.onreadystatechange = function() {
		
			if ((this.readyState == 4) && (this.status == 200)) {
				
        console.log("AJAX JSON response: " + this.responseText);
        
        responseObj = JSON.parse(this.responseText); // responseObj gets named properties matching the database columns
          
          // setting conditions for each table 
          if (fromTable == "question_table"){

          document.getElementById("situation").innerHTML = responseObj.situation; // using the DOM, set the situation

          document.getElementById("question").innerHTML = responseObj.question; // set the question

          document.getElementById("photo").src = responseObj.file_name; // set the image source

          // set the options, using array syntax instead of object.property because names starting with a number
          document.getElementById("choice1").innerHTML = responseObj["1option"];

          document.getElementById("choice2").innerHTML = responseObj["2option"];

          document.getElementById("choice3").innerHTML = responseObj["3option"];

          document.getElementById("tryAgain").style.display = "none"; //hide try again button

          } else if (fromTable == "outcome_table") {
            document.getElementById("situation").innerHTML = responseObj.outcome; //using the DOM, set the outcome

            document.getElementById("tryAgain").style.display = "block"; // making the button reappear
            
            document.getElementById("tryAgain").innerHTML = responseObj.try_again; // setting the try again button

            document.getElementById("photo").src = responseObj.file_name; // set image source

            document.getElementById("choice1").style.display = "none"; // hide option buttons

            document.getElementById("choice2").style.display = "none";

            document.getElementById("choice3").style.display = "none";

            document.getElementById("question").style.display = "none"; //hide question
          }
        
      }
		
	} // end ajax.onreadystatechange

	// now that everything is set, initiate request
	ajax.send();

} 

// choice1 button onclick function for each trackProgress variable
optionClick1 = document.querySelector("button#choice1");
optionClick1.onclick = function() {
  
  if (trackProgress == 1) {
    
    loadFileInto(2, "question_table");
    
  } else if (trackProgress == 2) {
    
    loadFileInto(2, "outcome_table");
    
  } else if (trackProgress == 3) {
    
    loadFileInto(4, "question_table");
    
  } else if (trackProgress == 4) {
    
    loadFileInto(4, "outcome_table");
    
  } else if (trackProgress == 5) {
    
    loadFileInto(5, "outcome_table");
    
  } 
  
  trackProgress++;
  
}

// choice2 button onclick function for each trackProgress variable
optionClick2 = document.querySelector("button#choice2");
optionClick2.onclick = function() {
  
  if (trackProgress == 1) {
    
    loadFileInto(2, "question_table");
    
  } else if (trackProgress == 2) {
    
    loadFileInto(3, "question_table");
    
  } else if (trackProgress == 3) {
    
    loadFileInto(3, "outcome_table");
    
  } else if (trackProgress == 4) {
    
    loadFileInto(5, "question_table");
    
  } else if (trackProgress == 5) {
    
    loadFileInto(7, "outcome_table");
    
  } 
  
  trackProgress++;
  
}

// choice3 button onclick function for each trackProgress variable
optionClick3 = document.querySelector("button#choice3");
optionClick3.onclick = function() {
  
  if (trackProgress == 1) {
    
    loadFileInto(1, "outcome_table");
    
  } else if (trackProgress == 2) {
    
    loadFileInto(3, "question_table");
    
  } else if (trackProgress == 3) {
    
    loadFileInto(4, "question_table");
    
  } else if (trackProgress == 4) {
    
    loadFileInto(5, "question_table");
    
  } else if (trackProgress == 5) {
    
    loadFileInto(6, "outcome_table");
    
  } 
  
  trackProgress++;
  
}

// tryAgain button onclick funtion, resetting displays and trackProgress
againClick = document.querySelector("button#tryAgain");
againClick.onclick = function() {
  
    loadFileInto(1, "question_table");
  
    trackProgress = 1;
    
    document.getElementById("choice1").style.display = "block";
          
    document.getElementById("choice2").style.display = "block";
          
    document.getElementById("choice3").style.display = "block";
          
    document.getElementById("question").style.display = "block";
  
}



function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
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
  var user=getCookie("username");
  if (user != "") {
    alert("Welcome again " + user);
  } else {
     user = prompt("Please enter your name:","");
     if (user != "" && user != null) {
       setCookie("username", user, 30);
     }
  }
}
