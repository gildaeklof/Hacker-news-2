<h2>Login</h2>
<?php

require '../functions.php';
logMessage();
// print_r($_SESSION);
?>
<form action="/Account/login.php" method="post">
    <Label for="Email">Email</Label>
    <input type="text" name="Email" id="Email">
    <Label for="Password">Password</Label>
    <input type="text" name="Password" id="Password">
    <input type="submit" value="Submit">
</form>

<h2>OR</h2>

<h2>Create account</h2>
<form action="/Account/create_account.php" method="post">
    <Label for="Email">Email</Label>
    <input type="text" name="Email" id="Email">
    <Label for="Password">Password</Label>
    <input type="text" name="Password" id="Password">
    <input type="submit" value="Submit">
</form>

<?php createMessage(3) ?>