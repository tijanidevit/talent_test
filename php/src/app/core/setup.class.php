<?php
    include_once 'db.class.php';

    class setup extends DB{
        function createStudentScoresTable(){
            return DB::execute("
            CREATE TABLE IF NOT EXISTS student_scores ( 
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
                student_id INT NOT NULL ,
                subject_id INT NOT NULL ,
                score INT NOT NULL ,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                )
            ", []);
        }

        function createStudentsTable(){
            return DB::execute("
            CREATE TABLE IF NOT EXISTS students ( 
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
                fullname VARCHAR(250) NOT NULL , 
                matric_no VARCHAR(250) NOT NULL , 
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                )
            ", []);
        }

        public function insertStudentsData()
        {
            try {
                return DB::execute("INSERT INTO users (fullname, matric_no) VALUES 
                    ('Tijani', 0001),
                    ('Mustapha', 0002),
                    ('Adekunle', 0003),
                    ('Ayobami', 0004),
                    ('Temi', 0005),
                    ('Abayomi', 0006)
                ;", []);
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }



        function dropUsersTable(){
            return DB::execute("
            DROP TABLE users;
            ", []);
        }

        function dropSubjectsTable(){
            return DB::execute("
            DROP TABLE subjects;
            ", []);
        }

        function dropStudentScoresTable(){
            return DB::execute("
            DROP TABLE student_scores;
            ", []);
        }

    }
?>