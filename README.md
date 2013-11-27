# Laravel 4 Assets

Laravel 4 assets package provides simple script and stylesheet management per application environment.

## Configuration

Add an `assets.php` to your `app/config` directory. Specify environment configurations by adding an `assets.php` to each environment directory in your `app/config` directory.

At least one `media` type is required as a key in the `styles` array. But there is no limit to the number of stylesheets.

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

The following example includes all stylesheets and scrtips defined in `assets.php`.

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

But what if you need specific stylesheets or combination of stylesheets for different templates? The next exaample shows how to use the media type or dot notation to include specific stylesheets.

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

### Example

Local: `app\local\assets.php`

```php
<?php

return array(

	'scripts' => array(
		'/assets/libs/requirejs/require.js',
		'/assets/core/lib/main.js',
	),

	'styles' => array(
		'screen' => array(
			'/assets/core/css/style.css',
		)
	),
);
```

Default: `app\assets.php`

```php
<?php

return array(

	'scripts' => array(
		'/assets/build/lib/main.js',
	),

	'styles' => array(
		'screen' => array(
			'/assets/build/css/style.css',
		)
	),
);
```