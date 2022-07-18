<?php
  include_once 'core/enums.class.php';
  include_once 'core/StudentScores.class.php';
  include_once 'core/core.function.php';

  $enum_obj = new Enums();
  $student_score_obj = new StudentScores();

  $students = $enum_obj::STUDENTS;
  $subjects = $enum_obj::SUBJECTS;
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Reports - App Development</title>
  </head>

  <body class="d-flex container justify-content-center  flex-column" style="min-height: 100vh;">
    <h2 class="text-center">View Students' Scores Reports 
        <small><a href="./" class="btn btn-info w-25">Add Scores</a></small>
    </h2>

    

    <?php foreach($students as $student): ?>
        <div class="card mb-2">
            <div class="card-body">
                <div class="card-title">
                    <h5><?php echo $student['name'] ?>'s Reports</h5>
                </div>

                <div class="card-text">
                    <?php 
                        foreach($subjects as $subject): 
                    ?>
                        <p><?php echo $subject['subject'] ?> : <?php printResult($student_score_obj->FetchStudentSubjectScores($student['id'], $subject['id'])) ?></p>

                        
                    <?php endforeach ?>

                    <p><strong>Mean: <?php echo $student_score_obj->FetchStudentMeanScores($student['id']) ?></strong></p>
                    <p><strong>Mode: <?php echo $student_score_obj->FetchStudentModeScores($student['id']) ?></strong></p>
                    <p><strong>Median: <?php echo $student_score_obj->FetchStudentMedianScores($student['id']) ?></strong></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>

  </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>