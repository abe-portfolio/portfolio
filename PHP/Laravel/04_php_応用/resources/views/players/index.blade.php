{{ $params['test'] }}<br>
{{ $params['sample'] }}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>背番号</th>
            <th>ポジション</th>
            <th>所属</th>
            <th>名前</th>
            <th>誕生日</th>
            <th>身長</th>
            <th>体重</th>
        </tr>
        @foreach($players as $player)
        <tr>
            <td>{{ $player->id }}</td>
            <td>{{ $player->uniform_num }}</td>
            <td>{{ $player->position }}</td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->club }}</td>
            <td>{{ $player->birth }}</td>
            <td>{{ $player->height }}</td>
            <td>{{ $player->weight }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>