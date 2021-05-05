<?

// This file contains one function to generate a table of information of data

// output a table of results, including a checkbox if $includeCheckbox is true
// receive the situations as a database object into $allSit
function outputSitResults($allSit, $includeCheckbox = false) {
	
	$counter = 0;
	$output = "";
	$output .= "<table cellpadding='10'>\n";
	
	// loop through $allSit with each $row available as $sit
	foreach ($allSit as $sit) {
		
		$counter++;
		
		$output .= "\t<tr style='background-color: #ddd;'>\n";
		
		if ($includeCheckbox) {
			$checkboxID = "situation[" . $counter . "]";
			$checkboxValue = $sit["id"];
			$output .= "\t\t<td><input type='checkbox' id='$checkboxID' name='$checkboxID' value='$checkboxValue'></td>\n";
		}
		$output .= "\t\t<td>" . $sit["situation"] . "</td>\n";
		$output .= "\t\t<td>" . $sit["question"] . "</td>\n";
		$output .= "\t\t<td>" . $sit["1option"] . "</td>\n";
		$output .= "\t\t<td>" . $sit["2option"] . "</td>\n";
    $output .= "\t\t<td>" . $sit["3option"] . "</td>\n";
		$output .= "\t\t<td>" . $sit["file_name"] . "</td>\n";
		
		$output .= "\t</tr>\n";
	}
	$output .= "</table>";
	
	// if there is at least 1 record, output the button
	if ($counter > 0) $output .= '<button type="submit">Delete Checked Rows</button>';
	
	return $output;
}

// function for second table
// output a table of results, including a checkbox if $includeCheckbox is true
// receive the outcomes as a database object into $allOut
function outputOutResults($allOut, $includeCheckbox = false) {
	
	$counter = 0;
	$output = "";
	$output .= "<table cellpadding='10'>\n";
	
	// loop through $allOut with each $row available as $out
	foreach ($allOut as $out) {
		
		$counter++;
		
		$output .= "\t<tr style='background-color: #ddd;'>\n";
		
		if ($includeCheckbox) {
			$checkboxID = "outcome[" . $counter . "]";
			$checkboxValue = $out["id"];
			$output .= "\t\t<td><input type='checkbox' id='$checkboxID' name='$checkboxID' value='$checkboxValue'></td>\n";
		}
		$output .= "\t\t<td>" . $out["outcome"] . "</td>\n";
		$output .= "\t\t<td>" . $out["try_again"] . "</td>\n";
		$output .= "\t\t<td>" . $out["file_name"] . "</td>\n";
		
		$output .= "\t</tr>\n";
	}
	$output .= "</table>";
	
	// if there is at least 1 record, output the button
	if ($counter > 0) $output .= '<button type="submit">Delete Checked Rows</button>';
	
	return $output;
}
