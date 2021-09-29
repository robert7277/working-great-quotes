<?php
$authors = [];

function readCSV($file, $key1, $key2) {
    $row = 1;
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $sub_array = array($key1 => $data[0], $key2 => $data[1]);
            $array[$row] = $sub_array;
            $row++;
        }
        fclose($handle);
        return $array;
    }
}


$authors = readCSV("authors.csv", "first_name", "last_name");
$quotes = readCSV("quotes.csv", "quote", "author_id");
$users = readCSV("users.csv", "name", "username");

/*
echo '<pre>';
print_r($authors);
echo '<hr>';
print_r($quotes);
echo '<hr>';
print_r($users);
*/
