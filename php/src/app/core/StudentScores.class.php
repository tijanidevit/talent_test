<?php
    include_once 'db.class.php';

    class StudentScores extends DB{

        function AddStudentScores($student_id,$subject_id,$score){
            return DB::execute("INSERT INTO student_scores(student_id,subject_id,score) VALUES(?,?,?)", [$student_id,$subject_id,$score]);
        }
        function IsStudentScoreAddedBefore($student_id,$subject_id){
            return DB::num_row("SELECT id FROM student_scores WHERE student_id = ? AND subject_id = ? LIMIT 1",[$student_id, $subject_id]);
        }
        function FetchStudentScores($student_id){
            return DB::fetchAll("SELECT score FROM student_scores WHERE student_id = ? ",[$student_id]);
        }
        function FetchStudentScoresSum($student_id){
            return DB::fetch("SELECT sum(score) AS score FROM student_scores WHERE student_id = ? ",[$student_id]);
        }
        function FetchStudentSubjectScores($student_id, $subject_id){
            return DB::fetch("SELECT score FROM student_scores WHERE student_id = ? AND subject_id = ? ",[$student_id, $subject_id]);
        }

        function FetchStudentMeanScores($student_id){
            $scores = $this->FetchStudentScoresSum($student_id);
            if ($scores) {
                return ceil($scores['score']/5);
            }
            else{
                return 0;
            }
        }

        function FetchStudentMedianScores($student_id){
            $scores = $this->FetchStudentScores($student_id);
            if ($scores) {
                $scs = [];
                foreach ($scores as $score) {
                    array_push($scs, $score['score']);
                }
                sort($scs);
                return $scs[ceil(count([$scs])/2)];
            }
            else{
                return 0;
            }
        }

        function FetchStudentModeScores($student_id){
            $scores = $this->FetchStudentScores($student_id);
            if ($scores) {

                $scs = [];
                foreach ($scores as $score) {
                    array_push($scs, $score['score']);
                }
                $arr_vals_count = array_count_values($scs);
                arsort($arr_vals_count);
                return array_slice(array_keys($arr_vals_count), 0, 1, true)[0];
            }
            else{
                return 0;
            }
        }
        
    }
?>