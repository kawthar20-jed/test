<!-- resources/views/articles/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Articles</title>
    <style>
        /* Facultatif : Style pour les boutons */
        .action-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Liste des Articles</h1>

    <table>
        <thead>
            <tr>
                <th>Auteur</th>
                <th>Contenu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->author }}</td>
                <td>{{ $article->content }}</td>
                <td class="action-buttons">
                    
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p><a href="{{ route('articles.create') }}" class="btn btn-success">Ajouter un nouvel article</a></p>
    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
</body>
</html>
