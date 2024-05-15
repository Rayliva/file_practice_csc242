<?php
//************************************************************/
//* Author: Rachel Alden
//* Major: Computer Science
//* Creation Date: 2/15/2024
//* Due Date: 2/21/2024
//* Course: CSC 242
//* Professor Name: Carelli
//* Assignment: #2
//* Filename: proj2.php
//* Purpose: This program will read data stored in a file, 
//* convert the information into csv format, and write the
//* reformatted data to a second file.
//************************************************************/

ini_set ('display_errors', 1); // Let me learn from my mistakes!
error_reporting (E_ALL);

$iFName = readline("Enter the name of the input file: ");	//open file
$ihandle = fopen("$iFName","r");
fileExistAndOpen($iFName,$ihandle);

$oFName = readline("Enter the name of the output file: ");	//open file
$ohandle = fopen("$oFName","w");
fileExistAndOpen($oFName, $ohandle);

$bookInfo = array_fill(0, 4, null);	//create array to store data of one book
Example of  time decision?
fwrite($ohandle, "Title,Year,Category,Author\n");
while(!feof($ihandle)){
	for ($i = 0; $i < 4; $i++) {			//store data of one book in array
    		$bookInfo[$i] = trim(fgets($ihandle));
    	}
	if ($bookInfo[0] !== "") {			//if there's data to output, output
		$outputLine = combineData($bookInfo);
		fwrite($ohandle, $outputLine . "\n");
	}
}

//--------------------------------FUNCTIONS---------------------------------

//*************************************************************************/
//* Function name:  combineData
//* Description:    Takes in an array of 4 elements of book data and combines
//*		    the data into one string and returns it.
//* Parameters:     $arrayOfBookData
//* Return Value:   string - combined book data
//*************************************************************************/
function combineData($arrayOfBookData){
$combinedData = implode(',',$arrayOfBookData);
return $combinedData;
}


//*************************************************************************/
//* Function name:  fileExistAndOpen
//* Description:    Checks if a file exists. If it does it tries to open it.
//*                 It prints an error message and terminates the program if
//*		    anything goes wrong.
//* Parameters:     $fileName, $fileHandle
//* Return Value:   bool - returns true if it exists and is open
//*************************************************************************/
function fileExistAndOpen($fileName, $fileHandle){
if (!file_exists($fileName)){
	die ("File doesn't exist");
}
else {
	if (!$fileHandle){
		die ("Cannot open file");	
	}
	else {
		return true;
	}
}
}

?>
