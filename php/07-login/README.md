# Authentication

This is a basic approach to user authentication.
There is a ```dashboard.php``` page which is 
for registered users only.

SESSION is used in order to keep information about a successful login.
Additionally, session is used to pass data among a "do" controller and forms in case of an error, in versions 2 and 3.

## version 1
login and register forms check if the request is a POST request and login or register respectively.
If there is no POST request or if there is any error with the submitted data, the respective form is displayed.

## version 2
The POST request from login and register forms is processed by a separate file (login_do and register_do, respectively).
In case of error the "do" page redirects back to the form, otherwise it redirects to the appropriate page.

## version 3
This is version 2 with Bootstrap applied.