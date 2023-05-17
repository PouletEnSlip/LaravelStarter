<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Liste des livres</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#27232c">
</head>
<body>
    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#403948" fill-opacity="1" d="M0,128L40,133.3C80,139,160,149,240,138.7C320,128,400,96,480,122.7C560,149,640,235,720,261.3C800,288,880,256,960,208C1040,160,1120,96,1200,69.3C1280,43,1360,53,1400,58.7L1440,64L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
    </svg>
    <h1>Liste des livres</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Catégorie</th>
                <th>Année</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livres as $livre)
            <tr>
                <td>{{ $livre->id }}</td>
                <td>{{ $livre->title }}</td>
                <td>{{ $livre->author }}</td>
                <td>{{ $livre->category->label }}</td>
                <td>{{ $livre->year }}</td>
                <td>
                    <form action="{{ route('livres.edit', $livre->id) }}" method="GET">
                        @csrf
                        <button type="submit">Modifier</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('livres.destroy', $livre->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="/livres" method="POST">
        @csrf

        <h2>Ajouter un livre</h2>
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="author">Auteur :</label>
            <input type="text" name="author" id="author">
        </div>

        <div>
            <label for="category">Catégorie :</label>
            <select name="category" id="category">
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->label }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="year">Année :</label>
            <input type="number" name="year" id="year">
        </div>

        <button type="submit">Ajouter</button>
    </form>
    <a href="/categories">Liste des catégories</a>
    <a href="/">Accueil</a>
    <footer>
        Léo SEGUIN
    </footer>
</body>
</html>
