<?php
// Excuse me for over-engineering here slightly to show a more TDD-like process.




//  List the files to check through, and run through each file, creating the output from each.
$files = array(
	'./romeo.txt',
	'./rain.txt',
	'./jabberwock.txt',
	'./alice.txt');
// I added an additional set of test cases just to make sure the process was working beyond the two examples.

$expected_results = array(
	'wherefore',
	'people',
	'jabberwock',
	'people');

// Simple function to take files in and return their most lettered word
function find_most_lettered_word($path){
	$contents = file_get_contents($path);
	assert(!empty($contents));
	/*
	The text sample will contain only the alphabetic characters ("a" through "z" and "A" through "Z"), 
	spaces, and punctuation marks. 
	A letter is considered to be the same letter regardless of whether it appears in uppercase or lowercase. 
	The words will be separated by spaces, and any punctuation marks should be disregarded.
	*/

	// Normalize the text first:
	// Make everything lowercase
	$normalized = strtolower($contents);
	// Strip multiple whitespaces
	$normalized = preg_replace('/\s+/', ' ',$normalized);
	// Filter to alphanumeric and spaces
	$normalized = preg_replace("/[^0-9a-zA-Z ]/", "", $normalized);

	// Just explode the string into words.
	$words = explode(' ', $normalized);
	assert(count($words) > 1);


	// Store the winning word (none to start)
	$winner = null;
	// Store the max character count (0 to start)
	$max_character_count = 0;
	// Get a character count per wordletter, store the max character count.
	foreach($words as $word){
		// Loop over each character for each word, and try to get more than the max character count
		foreach(count_chars($word, 1) as $i => $count){
			if($count>$max_character_count){
				$winner = $word; // Update the winner.
				$max_character_count = $count; // Update the max count.
			}
		}
	}

	// return the winning word
	return $winner;
}


$results = array();
// Loop over the text cases and get their outputs
foreach($files as $index=>$file){
	$winner = find_most_lettered_word($file);
	$results[$index] = $winner;
}

// Check each output against each expected result.
foreach($expected_results as $index=>$word){
	if($word !== $results[$index]){
		echo 'Test failed: expected ['.$word.'] but got ['.$results[$index].']'."\n";
	} else {
		echo 'Test of ['.$word.'] passed!'."\n";
	}
}