<?php
  include_once 'core/enums.class.php';
  $enum_obj = new Enums();

  $students = $enum_obj::STUDENTS;
  $subjects = $enum_obj::SUBJECTS;
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>App Development</title>
  </head>

  <body class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <h2>Welcome to students scores app</h2>

    <a href="reports.php" class="btn btn-info">View Reports</a>

    <form id="scoreForm" class="m-5 w-50">
      <div class="form-group mb-2" id="result"></div>
      <div class="form-group mb-2">
        <label for="">Select student</label>
        <select required class="form-control" name="student_id" id="student_id">
          <?php foreach ($students as $student): ?>
            <option value="<?php echo $student['id'] ?>"><?php echo $student['name'] ?></option>
          <?php endforeach ?>
        </select>
      </div>

      
      <div class="form-group mb-2">
        <label for="">Select subject</label>
        <select required class="form-control" name="subject_id" id="subject_id">
          <?php foreach ($subjects as $subject): ?>
            <option value="<?php echo $subject['id'] ?>"><?php echo $subject['subject'] ?></option>
          <?php endforeach ?>
        </select>
      </div>

      
      <div class="form-group mb-2">
        <label for="">Enter scores</label>
        <input type="number" min="0" max="100" required class="form-control" name="score" id="score" />
      </div>
      
      <div class="form-group mb-2">
        <button class="btn btn-info">
          <span class="spinner" id="spinner" style="display: none;">
              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
          </span>
          Submit
        </button>
      </div>
    </form>
  </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $('#scoreForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax/add_student_score.php',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            beforeSend: function() {
              $('#spinner').show();
              $('#result').hide();
              $('#btnText').hide();
            },
            success: function(data){
              data = JSON.parse(data);
              if (data.success == false) {
                $('#result').html(`<div class="alert alert-warning">${data.message}</div>`);
              } else {
                $('#result').html(`<div class="alert alert-success">${data.message}</div>`);
              }
              
              $('#result').fadeIn();
              $('#spinner').hide();
              $('#btnText').show();
            }
        })
    })
</script>