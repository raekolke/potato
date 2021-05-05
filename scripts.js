
// generic AJAX function to load fromFile into object with ID whereTo
function loadFileInto(fromIdentifier, fromList) {

	// creating a new XMLHttpRequest object
	ajax = new XMLHttpRequest();
  
  // define the fromFile value based on PHP URL
  fromFile = "functions.php?id=" + fromIdentifier + "&list=" + fromList;

	// defines the GET/POST method, source, and async value of the AJAX object
	ajax.open("GET", fromFile, true);

	// prepares code to do something in response to the AJAX request
	ajax.onreadystatechange = function() {
		
			if ((this.readyState == 4) && (this.status == 200)) {
				
        console.log("AJAX JSON response: " + this.responseText);
        
        //convert JSON from PHP into JS array
        responseArray = JSON.parse(this.responseText);
        responseHTML = "";
        for (x=0; x<responseArray.length; x++) {
          responseHTML += "<li>" + responseArray[x].content + "</li>";
        }
        
        whereTo = "#" + fromList + " ul";
        if (fromList == "directions") whereTo = "#" + fromList + " ol";
        document.querySelector(whereTo).innerHTML = responseHTML;
				
			} else if ((this.readyState == 4) && (this.status != 200)) {
				console.log("Error: " + this.responseText);
				
			}
		
	} // end ajax.onreadystatechange

	// now that everything is set, initiate request
	ajax.send();

} 

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



SevenLayerBars = new pageSituation(
	"Seven Layer Bars", 
	"https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F5574746.jpg&w=596&h=596&c=sc&poi=face&q=85",
	"Tor",
	"SevenLayerBars"
);



