// tracking variable initialized
trackProgress = 1;

// loading the first situation on window load

window.onload = function() {
	
	loadFileInto(1, "question_table");
	
};


// what needs to be changed here?

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

        document.getElementById("situation").innerHTML = responseObj.situation; // using the DOM, set the situation

        document.getElementById("question").innerHTML = responseObj.question; // set the question

        document.getElementById("photo").src = responsObj.file_name; // set the image source

        // set the options

        // need to use array syntax instead of object.property syntax because you can’t start property names with a number

        document.getElementById("choice1").innerHTML = responseObj["1option"];

        document.getElementById("choice2").innerHTML = responseObj["2option"];

        document.getElementById("choice3").innerHTML = responseObj["3option"];
      }
		
	} // end ajax.onreadystatechange

	// now that everything is set, initiate request
	ajax.send();

} 

//tacking progress variables to send user to next step

optionClick1 = document.querySelector("#choice1");
optionClick1.onclick = function() {
  if (trackProgress == 1) {
    responseObj
  }
}

optionClick2 = document.querySelector("#choice2");
optionClick2.onclick = function() {
  optionClick2.classList.toggle("equipmentClicked");
}

optionClick3 = document.querySelector("#choice3");
optionClick3.onclick = function() {
  optionClick3.classList.toggle("directionsClicked");
}



/* I'm pretty sure this part is useless

// object constructor for Recipe prototype
function pageSituation(situation, question, option1, option2, option3, fileName) {
	this.sit = situation;
	this.quest = question;
	this.opt1 = option1;
	this.opt2 = option2;
  this.opt3 = option3;
  this.name = fileName;
	
	// update the screen with this object's recipe information
	this.displaySituation = function() {
		
		// update the recipe title
		document.querySelector("#situation").innerHTML = this.sit;
		
		// update the recipe contributor
		document.querySelector("#question").innerHTML = this.quest;
    
    document.querySelector("#choice1").innerHTML = this.opt1;
    
    document.querySelector("#choice2").innerHTML = this.opt2;
    
    document.querySelector("#choice3").innerHTML = this.opt3;
		
		// update the image
		document.querySelector("#photo").style.backgroundImage = "url(" + this.name + ")";
		
	}
	
}



Situation1 = new pageSituation(
	"", 
	"https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F5574746.jpg&w=596&h=596&c=sc&poi=face&q=85",
	"Tor",
	"SevenLayerBars"
);
*/


