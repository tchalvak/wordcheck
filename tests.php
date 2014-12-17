<?php

//  List the files to check through, and run through each file, creating the output from each.
$files = array(
	'./romeo.txt',
	'./rain.text',
	'./jabberwock.txt',
	'./alice.txt');
// I added an additional set of test cases just to make sure the process was working beyond the two examples.

$expected_results = array(
	'wherefore',
	'people',
	'',
	'',

// Simple function to take files in and return their most lettered word
function find_most_lettered_word($path){
	$contents = file_get_contents($path);
	/*
	The text sample will contain only the alphabetic characters ("a" through "z" and "A" through "Z"), spaces, and punctuation marks. A letter is considered to be the same letter regardless of whether it appears in uppercase or lowercase. The words will be separated by spaces, and any punctuation marks should be disregarded.
	*/

}