<?php 

session_start();
include_once '../core/core.function.php';
include_once '../core/StudentScores.class.php';

echo add_StudentScore();
function add_StudentScore(){
	try {
		$StudentScore_obj = new StudentScores();

		if (!isset($_POST['score']) || $_POST['score']=="") {
			return response(false,'Score is required and cannot be empty');
		}
		if (!isset($_POST['student_id']) || $_POST['student_id']=="") {
			return  response(false,'Please select a student');
		}
		if (!isset($_POST['subject_id']) || $_POST['subject_id']=="") {
			return  response(false,'Please select a subject');
		}

		$student_id = $_POST['student_id'];
		$subject_id = $_POST['subject_id'];
		$score = $_POST['score'];

		if ($StudentScore_obj->IsStudentScoreAddedBefore($student_id,$subject_id)) {
			return  response(false,'Score already added for the selected student and subject');
		}


		if ($StudentScore_obj->AddStudentScores($student_id,$subject_id,$score)){
			return  response(true,'Student score added successfuly!');
		}
		else{
			return response(false,'Unable to add');
		}
	} catch (Exception $ex) {
		return response(false,$ex->getMessage());
	}
}
?>