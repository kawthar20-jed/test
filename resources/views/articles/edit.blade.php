<!-- resources/views/articles/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
</head>
<body>
    <h1>Edit Article</h1>
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="{{ $article->author }}" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ $article->content }}</textarea>
        </div>
        <button type="submit">Update Article</button>
    </form>
</body>
</html>
