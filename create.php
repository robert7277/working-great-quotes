<?php
    require_once('functions.php');

    $users[] = ['name' => $_POST['name'], 'username' => $_POST['username']];
    $author_index = findAuthor($authors, $_POST['author_firstname'], $_POST['author_lastname']);
    $quotes[] = ['quote' => $_POST['quote'], 'author_id' => $author_index];
    //if ($author_index > count($authors))
    echo '<pre>';
    print_r($users);
    echo '<hr>';
    print_r($authors);
    echo '<hr>';
    print_r($quotes);
    //echo 'author_index: ' . findAuthor($authors, $_POST['author']);
    echo '<hr>';
    print_r($_POST);
    if (count($_POST) == 0) {
        echo 'Nothing here!';
        die();
    }
    addLastCSV('users.csv', $_POST['name'], $_POST['username']);
    if ($author_index > count($authors)) {
        addLastCSV('authors.csv', $_POST['author_firstname'], $_POST['author_lastname']);
    }
    addLastCSV('quotes.csv', $_POST['quote'], $author_index);
?>