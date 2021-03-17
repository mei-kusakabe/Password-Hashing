<?php include('server.php');

if (empty($_SESSION['email'])) {
    header('location: login.php');
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link href=" https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <title>Homepage for Registration</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: cursive;
    }
    </style>
</head>

<body
    class="min-h-screen bg-gradient-to-r from-pink-200 to-indigo-200 text-gray-700 flex flex-col justify-center items-center p-6">
    <div
        class="max-w-lg w-full bg-purple-600 bg-opacity-20 flex flex-col justify-center items-center font-bold shadow-lg rounded-lg text-center space-y-6 py-8">
        <h1 class="text-4xl">This is the homepage</h1>
        <?php if (isset($_SESSION['success'])) : ?>
        <h3>
            <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
        </h3>
        <?php endif ?>
        <?php if (isset($_SESSION["email"])) : ?>
        <p>Welcome <strong><?php echo $_SESSION["email"]; ?></strong></p>
        <!-- <p><a href="login.php?logout='1'" style="color: red;">Logout</a></p>-->
        <a href="login.php?logout='1'"
            class="m-4 px-4 py-1 border-2 border-purple-600 text-purple-600 rounded-lg hover:bg-indigo-400 text-bold">Logout</a>
        <?php endif ?>
    </div>
</body>

</html>