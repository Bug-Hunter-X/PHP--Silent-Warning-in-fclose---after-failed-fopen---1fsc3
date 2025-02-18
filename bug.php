```php
$file = fopen('somefile.txt', 'r');
if ($file) {
    // Process the file
    fclose($file);
}
```
This code has a subtle flaw. If `fopen` fails (e.g., the file doesn't exist), it returns `false`.  The `if ($file)` check will then evaluate to `false`, skipping the file processing. However, the crucial part is that  `fclose($file)` will still try to close a non-resource (false), leading to a warning. While not a fatal error, it is considered bad practice.

This can be particularly insidious if error reporting is turned off (common in production environments). The warning will be suppressed, making it hard to debug.