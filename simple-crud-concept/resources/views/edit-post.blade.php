<div style="border: 4px solid black; padding: 20px;">
    <h1>Edit Post</h1>
    <form action="/edit-post/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}" style="display: block; margin: 10px;">
        <label for="body">Body</label>
        <textarea id="body" name="body" style="display: block; margin: 10px;">{{ $post->body }}</textarea>
        <button type="submit" style="display: block; margin: 10px;">Update Post</button>
    </form>
</div>
