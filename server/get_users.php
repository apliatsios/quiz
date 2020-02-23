<?php
// see sample-data.txt on what to return



$users = '[
	{
		"id": 1,
		"name": "John",
		"lastName": "Doe"
	},
	{
		"id": 2,
		"name": "Chris",
		"lastName": "Black"
	},
	{
		"id": 3,
		"name": "George",
		"lastName": "Best"
	}
]';

return json_decode($users);
?>
