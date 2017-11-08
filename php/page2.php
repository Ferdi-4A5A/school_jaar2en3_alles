<html>
<body>

<?php include 'ctrl.fileHandler.php'; ?>

    <form action='' method="post">

        Filename: <input type="text" name="fileName" value="<?php echo isset($_POST['readFile']) || isset($_POST['updateFile']) || isset($_POST['saveFile']) ? $_POST['fileName'] : '' ?>" />
        <br />
        Filename (multiple): <input type="text" name="fileNameMultiple" value="" />

        <br />

        <textarea rows="12" cols="100" name="textField1"><?php echo isset($_POST['readFile']) ? $handler->readFile() : ''; echo isset($_POST['updateFile']) ? $handler->updateFile() : '' ?></textarea>

        <br />

        <button type="submit" name="todo" value="create">Create</button>
        <button type="submit" name="todo" value="createMultiple">Create Multiple</button>
        <button type="submit" name="readFile" value="read">Read</button>
        <button type="submit" name="updateFile" value="update">Update</button>
        <button type="submit" name="todo" value="delete">Delete</button>
        <button type="submit" name="saveFile" value="save">Save</button>

    </form>

    <br />
    <br />
    <br />
    <br />
    <br />
    <br />

    <form method='post' action=''>

        <textarea rows='10' cols='50' name='fileContent'><?php echo isset($_POST['readFileContent']) ? $handler->readFile() : '' ?></textarea>

        <br />

        <select name='selectReadFileContent'>

            <?php foreach ($filesOnly as $value): ?>

                <option value="<?php echo $value; ?>" <?php if ($filesOnly == $value) {echo 'selected="selected"';} ?>><?php echo $value; ?></option>

            <?php endforeach; ?>

        </select>

        <button type='submit' name='readFileContent' value='readFileContent'>Read file content</button>

    </form>


<?php
foreach ($filesOnly as $value) {

var_dump($filesOnly);
var_dump($value);die;
}
?>

</body>
</html>


