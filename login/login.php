<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Login Page</title>
  </head>
  <body>
    <div class="login-container">
      <h1>Login</h1>
      <hr>
      <br>
      <form action="proses_login.php" method="post" autocomplete="off">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autocomplete="off" placeholder="Username | NIS">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" autocomplete="off" placeholder="Password">
        <br>
        <button type="submit">Masuk</button>
      </form>
    </div>
  </body>
</html>
