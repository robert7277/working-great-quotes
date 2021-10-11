<?php
require_once("functions.php");

echo "<pre>";
print_r($_POST);
echo "<br>";
print_r($quotes);
//$quotes[$_POST['index']]['quote'] = $_POST['quote'];

$author_index = findAuthor($authors, $_POST['author_firstname'], $_POST['author_lastname']); //check if author is already in the list
if ($author_index > count($authors)) { // if author is not in the list, add author
    addLastCSV('authors.csv', $_POST['author_firstname'], $_POST['author_lastname']);
}
$quotes[$_POST['index']]['author_id'] = $author_index;
//writeCSV('quotes.csv', $quotes);
modifyLineCSV('quotes.csv', $_POST['index'], $_POST['quote'] . ";" . $author_index . "\n");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Great Quotes</title>
</head>
<body>
    <script>
        alert("Quote is modified successfully")    
    </script>
</body>
</html>