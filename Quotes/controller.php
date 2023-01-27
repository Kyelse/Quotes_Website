<?php
// This file contains a bridge between the view and the model and redirects
// back to the proper page with after processing whatever form this code
// absorbs (we'll learn that command later when we have several pages.
// This is the C in MVC, the Controller.
//
// Authors: Rick Mercer and Quan Nguyen
//
session_start(); // <-- Not really needed until a future iteration

require_once './DatabaseAdaptor.php';

$theDBA = new DatabaseAdaptor();

if (isset($_GET['todo']) && $_GET['todo'] === 'getQuotes') {
    $arr = $theDBA->getAllQuotations();
    unset($_GET['todo']);
    echo getQuotesAsHTML($arr);
}
if (isset($_POST['plus'])) { 
    $id = htmlspecialchars(intVal($_POST["ID"])); 
    $theDBA->raiseRating($id); 
    header("Location: view.php" );
} 
if (isset($_POST['minus'])) {
    $id = htmlspecialchars(intVal($_POST["ID"])); 
    $theDBA->lowerRating($id);
    header("Location: view.php" );
}
if (isset($_POST['delete'])) {
    $id = htmlspecialchars(intVal($_POST["ID"])); 
    $theDBA->deleteQuote($id);
    header("Location: view.php" );
}
if (isset($_POST['add'])) {
    $quote = htmlspecialchars($_POST["quote"]);
    $author = htmlspecialchars($_POST["author"]);
    $theDBA->addQuote($quote, $author);
    header("Location: view.php" );
}
if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST["usernameLog"]);
    $password = htmlspecialchars($_POST["passwordLog"]);
    if ($theDBA->verifyCredentials($username, $password)) {
        $_SESSION['user'] = $username; 
        header("Location: view.php" );
    } else {
        $_SESSION['invalid'] = true; 
        header("Location: login.php" );
    }
}
if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST["usernameReg"]);
    $password = htmlspecialchars($_POST["passwordReg"]);
    if ($theDBA->checkCredentials($username)) {
        $_SESSION['invalid'] = true; 
        header("Location: register.php" );
    } else {
        $theDBA->addUser($username, $password); 
        $_SESSION['user'] = $username; 
        header("Location: view.php" );
    }
}

function getQuotesAsHTML($arr)
{
    // TODO 6: Many things. You should have at least two quotes in table quotes.
    // Layout each quote using a combo of PHP code and HTML strings that includes
    // HTML for buttons along with the actual quote and the author, ~15 PHP statements.
    // You will need to add css rules to styles.css.
    $result = "";
    foreach ($arr as $quote) {
        $result .= '<div class="container">';
        $result .= '<q>' . $quote['quote'] . '</q><br><br>' . PHP_EOL;
        // Add more code below. You will need to hold the buttons in an HTML <form>
        // This is kind of like adding onclick in Best Reads Two
        $result .= "--" . $quote['author'] . "<br><br>" . PHP_EOL;
        $result .= "<form action='controller.php' method='post'> <input type='submit' name='plus' value='+'>&nbsp " . $quote['rating'] . " &nbsp<input type='submit' name='minus' value='-'>"; 
        if (isset($_SESSION['user'])) {
            $result .= "&nbsp<input type='submit' name='delete' value='Delete'>"; 
        }
        $result .= '<input type="hidden" name="ID" value="' . $quote ["id"] . '"</input></form>' . PHP_EOL; 
        $result .= '</div>' . PHP_EOL;
    }
    return $result;
}
?>