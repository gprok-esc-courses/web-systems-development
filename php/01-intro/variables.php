<?php

// A variable is defined by the $ in front of the variable name.
// PHP is untyped so the type of the variable depends on the data assigned to it

$name = "Peter";    // string (can be defined with double (") or single (') quotes
$age = 34;          // integer
$salary = 1450.34;  // float
$married = false;   // boolean

// Arrays
$children = array('Mary', 'Tom', 'Alice');                  // simple
$books_per_month = [2, 4, 4, 2, 3, 5, 1, 3, 1, 1, 3, 4];    // simple
$friends = [                                                // key-value pairs
    "Paul" => "6978-345672",
    "Sara" => "6922-109872",
    "Vic" => "6991-090912",
];
$last_game = [                                              // 2d
    ['x', 'o', 'x'],
    ['x', 'x', 'o'],
    ['o', 'o', 'x'],
];

// Now let's display Peter's data on the web

// The dot . operator concatenates strings
echo "<h1>" . $name . "</h1>";
// But also we can put the variable in the string, if it is defined by double (") quotes
echo "<p>Age: $age, Salary: $salary, Married: " . ($married ? "yes" : "no") . "</p>";

echo "<b>Children</b>:<br>";
echo "<ul>";
foreach($children as $child) {
    echo "<li>$child</li>";
}
echo "</ul>";

$total_books = 0;
for($i = 0; $i < count($books_per_month); $i++) {
    $total_books += $books_per_month[$i];
}
echo "<p>He read $total_books books during last year!</p>";

echo "<b>Friends phone numbers</b>:";
echo "<ol>";
foreach($friends as $key => $value) {
    echo("<li>$key, tel: $value</li>");
}
echo "</ol>";

echo "<p>$name plays Tic Tac Toe, his last game:</p>";
for($i = 0; $i < 3; $i++) {
    for($j = 0; $j < 3; $j++) {
        echo $last_game[$i][$j] . " ";
    }
    echo("<br>");
}


