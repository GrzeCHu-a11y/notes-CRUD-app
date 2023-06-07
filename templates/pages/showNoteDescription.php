<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description</title>
</head>

<body>
    <div>
        <h2>Note description</h2>
        <br>
        <h5> <?php echo htmlentities($noteDescription) ?></h5>
        <br>
        <button type="button" class="btn btn-primary"><a href="/" style="color: white; text-decoration:none">back to notes</a></button>
    </div>
</body>

</html>