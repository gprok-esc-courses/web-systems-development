# Todo List v.1

This is a very simple implementation aiming to demonstrate database connectivity and CRUD operations.
CRUD = Create, read, update and delete.

The ```database.sql``` file has the SQL statements to create the necessary table for this example.

Connection to the database is in a separate file, ```database.php``` which is included in any other file that needs DB connectivity.

File ```index.php``` displays the currently active tasks, with links to complete the task or delete it, and provides a form to add a new task.

File ```completed.php``` displays the completed tasks and provides links to undo completion and delete the task.

The remaining files, ```add_task.php```, ```complete_task.php```, ```undo_task.php```, and ```delete_task.php```, perform their task and then redirect to the index page.

