<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link href=" https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: cursive;
    }

    label {
        position: absolute;
        left: 8%;
        top: 50%;
        transform: translateY(-50%);
    }

    label span {
        display: inline-block;
        transition: transform 0.2s, color 0.3s;
    }

    input:focus+label span,
    input:not(:placeholder-shown)+label span {
        transform: translateY(-40px);
        color: #fff;
    }
    </style>
</head>

<body
    class="min-h-screen bg-gradient-to-r from-pink-200 to-indigo-200 text-gray-700 flex justify-center items-center p-6">
    <div
        class="max-w-lg w-full bg-purple-600 bg-opacity-20 flex flex-col justify-center items-center font-bold shadow-lg rounded-lg text-center space-y-6 py-8">
        <h1 class="text-4xl">Register Here!</h1>
        <form class="text-gray-600" name="reg" action="reg.php" method="POST" onsubmit="return checkPassword()">
            <?php include('errors.php'); ?>
            <div class="relative my-8">
                <input class="bg-purple-300 border border-purple-500 rounded-lg max-w-full px-4 py-2" type="text"
                    name="name" placeholder=" " required>
                <label>Name</label>
            </div>

            <div class="relative my-8">
                <input class="bg-purple-300 border border-purple-500 rounded-lg max-w-full py-2 px-4" type="email"
                    placeholder=" " name="email" required>
                <label>Email</label>
            </div>

            <div class="relative my-8">
                <input class="bg-purple-300 border border-purple-500 rounded-lg max-w-full py-2 px-4" type="password"
                    placeholder=" " name="password" required>
                <label>Password</label>
            </div>

            <div class="relative my-8">
                <input class="bg-purple-300 border border-purple-500 rounded-lg max-w-full py-2 px-4" type="password"
                    placeholder=" " name="cpassword" required>
                <label>Confirm&nbsp;Password</label>
            </div>

            <div class="relative mt-8 mb-4">
                <input class="bg-purple-300 border border-purple-500 rounded-lg max-w-full py-2 px-4" type="text"
                    placeholder=" " name="institution" required>
                <label>Institution</label>
            </div>
            <button type="submit" name="register"
                class="bg-black text-base mb-6 py-2 px-6 rounded-full text-gray-200">Register</button>
            <h4>Already have an account? <a href="login.php" class="text-blue-700 underline hover:text-blue-500">Login
                    here</a></h4>
        </form>
    </div>

    <script src="mn.js"></script>
</body>
<script>
function checkPassword() {
    var p1 = document.forms["reg"]["password"].value;
    var p2 = document.forms["reg"]["cpassword"].value;
    if (p1 != p2) {
        alert("Sorry, the passwords didn't match!");
        return false;
    }
}
</script>

</html>