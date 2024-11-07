<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1>Test to do Phalcon</h1>
    <ul>
        <?php foreach ($todos as $todo) : ?>
            <li><?= $todo->description ?></li>
        <?php endforeach; ?>
    </ul>

    <?= $this->tag->a('todo/create', 'Create new to do', ['class' => 'btn btn-primary']) ?>
    <?= \Phalcon\Tag::linkTo(['/todo/create', 'Create new to do']) ?>
</body>
</html>