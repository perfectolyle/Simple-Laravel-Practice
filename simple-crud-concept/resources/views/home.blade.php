<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div style="border: 4px solid black; padding: 20px;">
        <h1>Register</h1>
        <form action="/register" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>