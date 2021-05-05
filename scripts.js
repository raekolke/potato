


/*
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

} */


