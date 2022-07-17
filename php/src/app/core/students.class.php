<?php
    include_once 'db.class.php';

    class Students extends DB{

        function create($fullname,$matric_no){
            return DB::execute("INSERT INTO students(fullname,matric_no) VALUES(?,?)", [$fullname,$matric_no]);
        }
        function fetch_students(){
            return DB::fetchAll("SELECT * FROM students ORDER BY matric_no ",[]);
        }
        
    }
?>