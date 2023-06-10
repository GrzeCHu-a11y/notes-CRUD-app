<?php

$selectOptions = [
    'option' => $_GET['select'] ?? 'ASC',
];

htmlentities($selectedOption = $selectOptions['option']);

?>
<div class="container text-center">
    <h2>Notes List</h2>
    <br>
    <form action="/" method="GET">
        <select class="form-select" aria-label="Default select example" name="select">
            <option name="ASC" id="optionASC" <?php echo $selectedOption === 'ASC' ? 'selected' : '' ?>>ASC</option>
            <option name="DESC" id="optionDESC" <?php echo $selectedOption === 'DESC' ? 'selected' : '' ?>>DESC</option>
        </select>
        <br>
        <input class="btn btn-primary" type="submit" value="SORT" style="float:left">
        <br>
        <br>
    </form>
    <br>
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
                    <td><?php echo htmlentities($note['title']) ?></td>
                    <td><?php echo htmlentities($note['created']) ?></td>
                    <td>
                        <p><a href="/?action=showNoteDescription&id=<?php echo (int) $note['id'] ?>" class="link-primary" style="text-decoration: none;">Show description</a></p>
                        <p><a href="/?action=editNote&id=<?php echo (int) $note['id'] ?>" class="link-primary" style="text-decoration: none;">Edit note</a></p>
                        <p><a href="/?action=deleteNote&id=<?php echo (int) $note['id'] ?>" class="link-primary" style="text-decoration: none;">Delete note</a></p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>