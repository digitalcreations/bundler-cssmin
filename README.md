# CSSMin wrapper for dc/bundler

Enables you to minify CSS files using dc/bundler.

## Installation

```
composer require dc/bundler-cssmin
```

or in `composer.json`

```json
"require": {
    "dc/bundler-cssmin": "dev-master"
}
```

## Setup

This package depends on `dc/router`, but strongly suggests `dc/ioc`. This is how you register the transformer with
the IoC container so it is picked up automatically:

```php
\DC\Bundler\CSSMin\CSSMinTransformer::registerWithContainer($container, $filters, $plugins);
```

The `$filters` and `$plugins` variables are optional. They correspond to the 
[options to `CssMin::Minify()`](https://code.google.com/p/cssmin/).
