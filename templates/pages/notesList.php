<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes List</title>
</head>

<body>
    <div class="container text-center">
        <h2>Notes List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notes as $note) : ?>
                    <tr>
                        <td><?php echo $note['id'] ?></td>
                        <td><?php echo $note['title'] ?></td>
                        <td><?php echo $note['created'] ?></td>
                        <td>
                            <p><a href="/?action=showNoteDescription&id=<?php echo (int) $note['id'] ?>" class="link-primary" style="text-decoration: none;">Show description</a></p>
                            <p><a href="/?action=editNote&id=<?php echo (int) $note['id'] ?>" class="link-primary" style="text-decoration: none;">Edit note</a></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>