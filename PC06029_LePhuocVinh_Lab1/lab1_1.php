<?php
$course = [
    's1' => 'course1',
    's2'=> 'course2',
    's3'=> 'course3'
];

// model
function getCourse()
{
    global $course;
    return array_values($course);
}

function find_by_semester($semester)
{
    global $course;
    return (array_key_exists($semester, $course) ? $course[$semester] :'Invalid course');
}

// Controller
$list_of_course = getCourse();
$semester = (!empty($_GET['semester']) ? $_GET['semester'] : '');
$course_name = find_by_semester($semester);
$page_content = $course_name;
?>

<!--view-->
<?php $page_content;?>
<select name="course">
    <?php foreach ($list_of_course as $course_name): ?>
        <option><?= $course_name ?></option>
    <?php endforeach;?>
</select>