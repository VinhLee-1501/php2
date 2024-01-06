<?php
require_once 'model.php';

//controller
$listOfCourse = getCourse();
$semester = (!empty($_GET['semester']) ? $_GET['semester'] : '');
$courseName = findBySemester($semester);
$pageContent = $courseName;

require_once 'view.php';