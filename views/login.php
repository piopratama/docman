<?php 
    include 'templates/header.php';
?>

<form action="authenticate" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>

    <button type="submit">Login</button>
</form>

<?php include 'templates/footer.php'; ?>