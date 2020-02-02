## Quiz Completion
[x] Part 1
[x] Part 2 (saved as websysquiz2.sql)
[] Part 3
- I have not been able to query all projects from the projects table to list out in the section
[] Part 4
- I have not been able to add new projects to the database

# Questions

## Question 1
For design decisions I wanted to make sure I had a clean interface and that I was able to utilize user sessions for login purposes

## Question 2
If a user were to come to the site and there was no database yet, I would have a PHP script make a SQL query to initiate the new database and create all of the tables. It would then redirect the user to the login.php page

## Question 3
While each project has a unique ID, this does not prevent users from adding projects of the same name. A way to check against users from adding the same project would be to make a SQL query to check if a project of the same name already exists in the DB. If it does, then I would make an alert that says to not insert the new project

## Question 4
To vote on projects that the users liked, I would create a new table called "Votes" that has a foreign key to projects, and a vote_tally column that is an integer. Each time a user clicked the button, their u_id would be added to the vote_tally column. This would check against users votting multiple times because if the project the user is voting on has a table entry with that user's ID, then this is a duplicate vote.