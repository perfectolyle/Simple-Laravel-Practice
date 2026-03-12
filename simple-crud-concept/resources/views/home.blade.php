<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

    @auth
        <p>Congrats, you are logged in</p>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <div style="border: 4px solid black; padding: 20px;">
            <h1>Create a Post</h1>
            <form action="/create-post" method="POST">
                @csrf
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Title" style="display: block; margin: 10px;">
                <label for="body">Body</label>
                <textarea id="body" name="body" placeholder="Body" style="display: block; margin: 10px;"></textarea>
                <button type="submit" style="display: block; margin: 10px;">Create Post</button>
            </form>
        </div>

        <div style="border: 4px solid black; padding: 20px;">
            <h2>All Posts</h2>
            @foreach($posts as $post)
                <div style="border: 2px solid black; padding: 10px; margin: 10px;">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                    <p>By {{ $post->user->name }}</p>
                    <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                    <form action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p>You are not logged in</p>
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
    <div style="border: 4px solid black; padding: 20px;">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="login_email">
            <label for="password">Password</label>
            <input type="password" id="password" name="login_password">
            <button type="submit">Login</button>
        </form>
    </div>
    @endauth
</body>
</html>