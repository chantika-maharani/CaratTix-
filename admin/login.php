<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - CaratTix</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #F7CAC9, #92A8D1);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #92A8D1;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #F7CAC9;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #92A8D1;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Admin</h2>

    <form action="proses_login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>