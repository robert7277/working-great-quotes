<?php
    require_once("functions.php");

    $users[] = ['name' => $_POST['name'], 'username' => $_POST['username']];
    $author_index = findAuthor($authors, $_POST['author']);
    $quotes[] = ['quote' => $_POST['quote'], 'author_index' => $author_index];
    if ($author_index > count($authors))
    echo "<pre>";
    print_r($users);
    echo "<hr>";
    print_r($quotes);
    //echo "author_index: " . findAuthor($authors, $_POST['author']);
    die();
    var_dump($_POST);
    if (count($_POST) == 0) { //check if user "post" anything
        //process information here
        echo "Nothing here!";
        die();
    }
?>
<form action="https://www.example.com/signup.php" method="POST">
    <label for="email">E-mail address</label>
    <input type="email" id="email" name="email" required />
    <br />
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required />
    <br />
    <button type="submit">Create your account</button>
</form>