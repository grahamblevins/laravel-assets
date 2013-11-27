# Laravel 4 Assets

This Laravel 4 package utilizes the framework's environment configuration for simple script and stylesheet management.

## Configuration

Add assets.php to your app/config directory. Specify per environment configurations by adding an assets.php to each environment directory in your app/config directory.

```php
<?php

return array(

	'scripts' => array(
		'/path/to/script/file-1.js',
		'/path/to/script/file-2.js',
		[ ..., ]
	),

	'styles' => array(
		'all' => array(
			'/path/to/stylesheet/file-1.js',
			'named' => '/path/to/stylesheet/file-2.js',
			[ ..., ]
		),
		'screen' => array(
			'/path/to/stylesheet/file-3.js',
			[ ..., ]
		),
		'print' => array(
			'/path/to/stylesheet/file-4.js',
			[ ..., ]
		),
	),
);
```

## Example

Include all stylesheets and scripts for the current environment.

```html
<html>
	<head>
		{{ styles() }}
		{{ scripts() }}
	</head>
</html>
```

```html
<html>
	<head>
		<link media="all" type="text/css" rel="stylesheet" href="/path/to/stylesheet/file-1.js">
		<link media="all" type="text/css" rel="stylesheet" href="/path/to/stylesheet/file-2.js">
		<link media="screen" type="text/css" rel="stylesheet" href="/path/to/stylesheet/file-3.js">
		<link media="print" type="text/css" rel="stylesheet" href="/path/to/stylesheet/file-4.js">
		<script src="/path/to/script/file-1.js"></script>
		<script src="/path/to/script/file-2.js"></script>
	</head>
</html>
```

## Example

Include specific stylesheets using the media key or dot notation for named stylesheets.

```html
<html>
	<head>
		{{ styles(array('all.named', 'print')) }}
	</head>
</html>
```

```html
<html>
	<head>
		<link media="all" type="text/css" rel="stylesheet" href="/path/to/stylesheet/file-2.js">
		<link media="print" type="text/css" rel="stylesheet" href="/path/to/stylesheet/file-4.js">
	</head>
</html>
```