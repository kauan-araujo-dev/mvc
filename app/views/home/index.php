
<?php /** @var User[] $data */?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/collect_os/public/assets/styles.css">
</head>

<body>
    <h1>Home Page</h1>
    <hr>
    <h2>Users</h2>
    <?php 
    foreach($data[0] as $user):?>
        <p>Nome: <?=  $user->getName() ?></p>
    <?php endforeach; ?>

    
    <script src="/collect_os/public/assets/script.js"></script>
</body>

</html>