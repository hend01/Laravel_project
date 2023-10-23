<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des Réclamations</title>
</head>
<body>
    <h1>Liste des Réclamations</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Sujet</th>
                <th>Description</th>
                <th>Nom de  l'utilisateur</th>
                <th>Email de  l'utilisateur</th>
                <th>Date de Création</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reclamations as $reclamation)
                <tr>
                    <td>{{ $reclamation->sujet }}</td>
                    <td>{{ $reclamation->description }}</td>
                    <td>{{ $reclamation->user->name}}</td>
                    <td>{{ $reclamation->user->email}}</td>
                    <td>{{ $reclamation->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
