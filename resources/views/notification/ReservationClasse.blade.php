<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th style="margin-inline: 20px; background-color:grey" scope="col"> Title</th>
                <th style="margin-inline: 20px; background-color:grey" scope="col">Description</th>
                <th style="margin-inline: 20px; background-color:grey" scope="col">Heure de début</th>
                <th style="margin-inline: 20px; background-color:grey" scope="col">Heure de fin</th>
                <th style="margin-inline: 20px; background-color:grey" scope="col">Commentaire</th>
                <th style="margin-inline: 20px; background-color:grey" scope="col">Status</th>
                <th style="margin-inline: 20px; background-color:grey" scope="col">past event</th>
                <th style="margin-inline: 20px; background-color:grey" scope="col">Utilisateur</th>
                <th style="margin-inline: 20px; background-color:grey" scope="col">Classe</th>
            </tr>
        </thead>
        <tbody align="middle">
            @foreach ($mailDataClasse as $key => $data)
            <tr>
        <td style="margin-inline: 20px ; background-color:lemonchiffon" ><p>{{ $data['name'] }}</p></td>
        <td style="margin-inline: 20px ; background-color:lemonchiffon" ><p>{{ $data['description'] }}</p></td>
        <td style="margin-inline: 20px ; background-color:lemonchiffon" ><p>{{ $data['start_time'] }}</p></td>
        <td style="margin-inline: 20px ; background-color:lemonchiffon" ><p>{{ $data['end_time'] }}</p></td>
        <td style="margin-inline: 20px ; background-color:lemonchiffon" ><p>{{ $data['comment'] }}</p></td>
        <td style="margin-inline: 20px ; background-color:lemonchiffon" ><p>{{ $data['canceled'] == 0 ? 'Active' : 'canceled' }}</p></td>
        <td style="margin-inline: 20px ; background-color:lemonchiffon" ><p>{{ $data['passed'] == 0 ? 'Not yet' : 'Passed' }}</p></td>
        <td style="margin-inline: 20px ; background-color:lemonchiffon" ><p>{{ $data['user_id'] }}</p></td>
        <td style="margin-inline: 20px ; background-color:lemonchiffon" ><p>{{ $data['classe_id'] }}</p></td>
    </tr>
    @endforeach
        </tbody>
    </table>



</body>

</html>

