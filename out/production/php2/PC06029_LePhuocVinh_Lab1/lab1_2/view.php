<?=$pageContent;?>
<select name="course">
    <?php foreach ($listOfCourse as $courseName): ?>
        <option><?=$courseName;?></option>
    <?php endforeach;?>
</select>