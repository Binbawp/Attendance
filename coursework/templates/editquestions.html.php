<h2>Add Question</h2>

<form action="" method="post">
    <input type="hidden" name="id" value="<?=$questions['id'];?>">
    <label for='text'>Edit your questions here;</label>
    <textarea name="text" rows="3" cols="40">
    <?=$questions['text']?>
    </textarea>
    
    <input type="submit" name="submmit" value="Save">
</form>