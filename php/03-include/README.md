# PHP include 

Including files with PHP can be done with the following functions:
- include
- include_once
- require
- require_once

The difference between **include** and **require** is that require produces an error and stops if the included file fails to load while include will just raise a warning.

The _once functions will include the file only once if for any reason is the file is included many times.