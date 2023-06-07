<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Laravel connection to DB Mysql</title>
</head>
<body>
    <div>
        @foreach ($listToDos as $listToDo)
            <div class="flex">
                <p>{{ $listToDo-> name }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>