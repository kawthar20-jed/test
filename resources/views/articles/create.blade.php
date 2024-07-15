<!-- resources/views/articles/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Article</title>
</head>
<body>
    <h1>Create New Article</h1>
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <button type="submit">Create Article</button>
    </form>
</body>
</html>
