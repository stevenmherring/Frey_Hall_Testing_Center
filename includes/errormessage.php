<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

if (! $error) {
    $error = 'Oops! Most likely bad login!';
}
?>
    <body>
      <center>
        <meta charset="UTF-8">
        <title>Secure Login: Error</title>
        <h1>There was a problem</h1>
        <p class="error"><?php echo $error; ?></p>
      </center>
    </body>
