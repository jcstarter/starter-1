<?php
/*

-= PHP Notes =-

- Ternary Operator
The expression (expr1) ? (expr2) : (expr3) evaluates to expr2 if expr1 evaluates to TRUE, and expr3 if expr1 evaluates to FALSE.
Ex: echo 'Hello '.($_COOKIE['first_name']!='' ? $_COOKIE['first_name'] : 'Guest'); // Hello David!
Side Notes: Since PHP 5.3, it is possible to leave out the middle part of the ternary operator. Expression expr1 ?: expr3 returns expr1 if expr1 evaluates to TRUE, and expr3 otherwise.
Source: https://davidwalsh.name/php-cookies
*/
?>
