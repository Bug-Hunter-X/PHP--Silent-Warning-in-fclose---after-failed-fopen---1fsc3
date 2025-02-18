# PHP: Silent Warning in fclose() after failed fopen()

This repository demonstrates a subtle PHP bug related to file handling. If `fopen` fails, `fclose` will attempt to close a non-resource, resulting in a warning.  This warning might be missed if error reporting is suppressed.

The `bug.php` file shows the problematic code.  `bugSolution.php` provides a corrected version.

## How to Reproduce

1.  Create a file named `bug.php` with the contents from the `bug.php` file. 
2.  Run `php bug.php`.  If error reporting is enabled, you'll see a warning.
3. Run the fixed version in `bugSolution.php` to see how to avoid this issue.

## Bug Solution

Always check the return value of `fopen` before proceeding and only attempt to close the file if `fopen` was successful.