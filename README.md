# talent_test

### Setup Guide

- **Please ensure docker is running and you have a good internet connection before anything**
- Then build docker images by running the code below:

```
docker-compose build
```

- Then run docker by running the code below:

```
docker-compose up
```

or to run in detached

```
docker-compose up -d
```

- While docker and the service are running, run the command below. The container name is php-apache. This will install PDO to run in the app development task

```
    docker exec php-apache docker-php-ext-install pdo pdo_mysql
```

- Then open _localhost:8000_ in your browser

#### Please note that all code assumes all constraints are met. So, constraints were not checked

### Explanation of solution

Open your browser and load the url below:

```
localhost:8000
```

The homepage includes the links to all tasks

#### The App Development Explanation

##### Steps to set up

- Please note that the app runs in the same docker app, so localhost:8000/app should work
- PhpMyAdmin run on localhost:8080
- PhyMyAdmin login details can be found in the db environment in docker-compose file or use
  (
  MYSQL_DATABASE: MY_DATABASE
  MYSQL_USER: MYSQL_USER
  MYSQL_PASSWORD: MYSQL_PASSWORD
  )
- To setup the database table student_scores, go to localhost:8000/app/setup.php
- Please note tables (students, subjects) were not used, Arrays were used for them instead the tables.
