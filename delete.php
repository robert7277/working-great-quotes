<?php
    require_once('csv_utils.php');
    echo "<pre>";
    deleteLineCSV('quotes.csv', $_GET['index']);
    deleteLineCSV('users.csv', $_GET['index']);