<?php // Do not put any HTML above this line
if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

// You are to use a "salted hash" for the password. The "plaintext" of the password is not to be present in your application source code except in comments. For this assignment, we will be using the following values for the salt and stored hash: 
// $salt = 'XyZzy12*_';
// $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is meow123

$failure = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['who']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
        //The login screen needs to have some error checking on its input data. If either the name or the password field is blank, you should put up a message of the form: User name and password are required
        $failure = "User name and password are required";
    } else {
        // The stored_hash is the MD5 of the salt concatenated with the plaintext of php123 - which is the password. This is computed using the following PHP:
        
        // In order to check an incoming password you must concatenate the salt plus password together and then run that through the hash() function and compare it to the stored_hash.
        
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
            // Redirect the browser to game.php
            // If there are errors, you should come back to the login screen (login.php) and show the error with blank input fields (i.e. don't carry over the values for name="who" and name="pass" fields from the previous post).
            // If the incoming password, properly hashed matches the stored stored_hash value, the user's browser is redirected to the game.php page with the user's name as a GET parameter using:
            header("Location: game.php?name=".urlencode($_POST['who']));
            return;
        } else {
            // If the password is non-blank and incorrect, you should put up a message of the form: Incorrect password
            $failure = "Incorrect password";
        }
    }
}

// Fall through into the View
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
<title>Abhay Singh 421d3a03 Login Page</title>
</head>
<body>
<div class="container">
<h1>Please Log In</h1>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if ( $failure !== false ) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>
    
<!--
//The login.php should be a login screen should present a field for the person's name (name="who") and their password (name="pass"). Your form should have a button labeled "Log In" that submits the form data using method="POST" (i.e. these should not be GET parameters).-->
<form method="POST">
<label for="nam">User Name</label>
<input type="text" name="who" id="nam"><br/>
<label for="id_1723">Password</label>
<input type="text" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>
For a password hint, view source and find a password hint in the HTML comments.
<!-- Hint: The password is the four character sound a cat makes (all lower case) followed by 123. -->
</p>
</div>
</body>
