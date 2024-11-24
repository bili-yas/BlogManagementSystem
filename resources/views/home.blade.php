<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
    <p>You are logged in</p>
    <form action="/logout" method="post">
        @csrf
        <button>Log Out</button>
    </form>

    <div style= "border: 3px solid black;">
        <h2>Create a new Post</h2>
        <form action="/create-post" method="post">
            @csrf
            <input type="text" name="title" placeholder="Post Title">
            <textarea name="body" placeholder="Body content......."></textarea>
            <button>Save Post</button>
        </form>
    </div>
    <br>
    <div style= "border: 3px solid black;">
        <h2>All Posts:</h2>
        @foreach($posts as $post)
        <div style = "background-color:gray; padding:10px; margin:10px;">
            <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                {{$post['body']}}
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
        </div>
        @endforeach
    </div>


    @else
    <div style= "border: 3px solid black;">
        <h2>Register</h2>
        <form action ='/register' method="POST">
            @csrf
            <input type="text" placeholder="Name" name="name">
            <input type="text" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <button>Register</button>
        </form>
    </div>
    <br><br>
    <div style= "border: 3px solid black;">
        <h2>Login</h2>
        <form action ='/login' method="POST">
            @csrf
            <input type="text" placeholder="Name" name="loginName">
            <input type="password" placeholder="Password" name="loginPassword">
            <button>Login</button>
        </form>
    </div>
    @endauth
    
</body>
</html>