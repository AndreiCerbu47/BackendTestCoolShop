<?php

    global $argv, $argc;
    
    // If there not sufficient arguments the program prints an error message and stops
    if($argc != 4)
        die("Insert the name of the csv file, the number of the column and the parameter");

    // Assigning the arguments to variables
    $file_path = $argv[1];
    $column = $argv[2];
    $parameter = $argv[3];

    // If the column isn't a correct number the program stops
    if($column < 1 && $column > 4)
        die("Insert a column number from 1 to 4");

    // Opening the file
    $file = fopen($file_path, "r") or die("Can't open file");

    // Search and print
    while (($data = fgetcsv($file, 100, ";")) !== false) {

        // Finding and printing the row
        $tk = explode(",", $data[0]);
        if ($tk[$column-1] === $parameter){
            echo "$data[0];\n";
        }
            
    }  
    fclose($file);

?>