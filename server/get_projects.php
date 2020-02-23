<?php
// see sample-data.txt on what to return

$projects = ' [
	{
		"name": "Wordpress",
		"user": 1
	},
	{
		"name": "Blog",
		"user": 1
	},
	{
		"name": "Wiki",
		"user": 2
	},
	{
		"name": "Magento",
		"user": 3
	},
	{
		"name": "Codeigniter",
		"user": 1
	},
	{
		"name": "Slim",
		"user": 3
	},
	{
		"name": "Laravel",
		"user": 2
	},
	{
		"name": "Drupal",
		"user": 1
	},
	{
		"name": "Joomla",
		"user": 4
	}
]';

return json_decode($projects);
?>
