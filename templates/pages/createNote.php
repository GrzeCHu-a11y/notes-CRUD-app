<form action="/?action=createNote" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="example title">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Note Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <input class="btn btn-primary" type="submit" value="Submit">
</form>