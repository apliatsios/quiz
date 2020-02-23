<?php
// Given a username and a password that both are not blank, return their concatenation as a hash key (md5 or sha256) or `NULL`
// **DO NOT USE** more than 2 lines of code.
// Comments and blank lines are not getting counted
// Edit file below this line.

return  hash("sha256",$username.$password)
?>
