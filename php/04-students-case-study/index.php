<h1>Student Management System</h1>
<div>
    <ul>
        <li><a href="display_students.php?category=ALL">All</a></li>
        <li>By Major
        <ul>
            <li><a href="display_students.php?category=PSY">Psychology</a></li>
            <li><a href="display_students.php?category=CS">Computer Science</a></li>
            <li><a href="display_students.php?category=MGMT">Management</a></li>
            <li><a href="display_students.php?category=ELT">English</a></li>
        </ul>
        </li>
    </ul>
    <div>
        <form action="search_students.php" method="post">
            Search by name: <input name="student-name" type="text" />
            <input type="submit">
        </form>
    </div>
</div>
