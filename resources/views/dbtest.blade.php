<div>
    <h1>Connecting to MySQL</h1>
    <?php
    $link = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT'], null);

    if (!$link) {
        echo 'Error: Unable to connect to MySQL.' . PHP_EOL;
        echo 'Debugging errno: ' . mysqli_connect_errno() . PHP_EOL;
        echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
        exit();
    }

    echo 'Success: A proper connection to MySQL was made! The docker database is great.' . PHP_EOL;

    mysqli_close($link);

    echo phpinfo();
    ?>

</div>