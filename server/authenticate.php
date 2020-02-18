<?php
return $needsAuthentication ? (authenticate($hash, 'your_algo') ? TRUE : FALSE) : TRUE;

function authenticate(?string $hash = '', string $algo = 'your_algo'): bool {
	$authenticated = FALSE;
	// Depending on the hashing algo you chose in `key_generator.php` write the body of `authenticate` function so that its result depends
	// on the length of the hash.
	// Edit below this line
	
	// End
	return (bool) $authenticated;
}