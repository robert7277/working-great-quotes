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

function addLastCSV($file, $key1, $key2) {
    if (($handle = fopen($file, "a")) === FALSE) {
        echo "Cannot open file ($file)";
        return;
    }
    $content = "\n" . $key1 . ";" . $key2;
    echo "Content" . $content;
    if (fwrite($handle, $content) === FALSE) {
        echo "Cannot write to file ($file)";
        return;
    }
    fclose($handle);
}

/*function writeCSV($file, $array) {
    if (($handle = fopen($file, "w")) === FALSE) {
        echo "Cannot open file ($file)";
        return;
    }
    for ($i = 1; $i <= count($array); $i++) {
        fputs($handle, implode(';', $array[$i]) . "\n");
    }
    fclose($handle);
}*/

function modifyLineCSV($file, $index, $data) {
    if (($handle = fopen($file, "a+")) === FALSE) {
        echo "Cannot open file ($file)";
        return;
    } else {
        if (($handle1 = fopen('temp.csv', 'w')) === FALSE) {
            echo "Cannot open file ($handle1)";
            return;
        } else {
            $count =  1;
            while (!feof($handle)) {
                $line = fgets($handle);
                if ($count != $index) fputs($handle1, $line);
                else fputs($handle1, $data);
                $count++;
            }
        }
    }
    fclose($handle);
    rename('temp.csv', $file);
    fclose($handle1);
}

function deleteLineCSV($file, $index) {
    if (($handle = fopen($file, "a+")) === FALSE) {
        echo "Cannot open file ($file)";
        return;
    } else {
        if (($handle1 = fopen('temp.csv', 'w')) === FALSE) {
            echo "Cannot open file ($handle1)";
            return;
        } else {
            $count =  1;
            while (!feof($handle)) {
                $line = fgets($handle);
                if ($count != $index) fputs($handle1, $line);
                $count++;
            }
        }
    }
    fclose($handle);
    rename('temp.csv', $file);
    fclose($handle1);
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
