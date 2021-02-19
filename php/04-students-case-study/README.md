# A simple students management app
This is a very simple example without a database.
Students are hardcoded in a file which is included in order to be used by the several pages.

Files:
- **student**: Student class definition
- **student_repository**: Hardcodes a number of students in an array emulating a data repository like a Database. In the future the students' data will be retrieved from a Database.
- **index**: Provides a number of links to view students by major (links use the GET method to call display_students). There is also a Search form to search students by first name (form calls search_students with the POST method) 
- **display_students**: Displays the students as a list based on their major. Uses the GET method.
- **search_students**: Displays the students having the submitted name. Uses the POST method.