<?php
require_once 'controller.php';

function getCourse()
{
    global $course;
    require_once 'data.php';
    return array_values($course);
}

function findBySemester($semester)
{
    require_once 'data.php';
    global $course;
    return (array_key_exists($semester, $course)? $course[$semester] :'Invalid course');
}