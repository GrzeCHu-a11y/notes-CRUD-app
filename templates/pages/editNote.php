<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Edit note</h2>
    <br>
    <form action="/?action=editNote" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?? "" ?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">New title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="example title" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">New note description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
</body>

</html>