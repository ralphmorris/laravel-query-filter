# Laravel Request Filters

<!-- [![Latest Version on Packagist](https://img.shields.io/packagist/v/ralphmorris/laravel-request-filters.svg?style=flat-square)](https://packagist.org/packages/ralphmorris/laravel-request-filters) -->
<!-- [![Build Status](https://img.shields.io/travis/ralphmorris/laravel-request-filters/master.svg?style=flat-square)](https://travis-ci.org/ralphmorris/laravel-request-filters) -->
<!-- [![Quality Score](https://img.shields.io/scrutinizer/g/ralphmorris/laravel-request-filters.svg?style=flat-square)](https://scrutinizer-ci.com/g/ralphmorris/laravel-request-filters) -->
<!-- [![Total Downloads](https://img.shields.io/packagist/dt/ralphmorris/laravel-request-filters.svg?style=flat-square)](https://packagist.org/packages/ralphmorris/laravel-request-filters) -->

Easily add dedicated filters based on request parameters. Originally came from a great tutorial on Laracasts. After copying it from project to project a few times I've now put it into a little package and added a generator for ease of use.

## Installation

You can install the package via composer:

```bash
composer require ralphmorris/laravel-request-filters
```

## Usage

To allow a model to be filterable, first add the FilterableTrait to your model.

``` php
use RalphMorris\LaravelRequestFilters\FilterableTrait;

class Post
{
    use FilterableTrait;
}
```

Then to create your filter class run the command below.

```bash
php artisan make:filter PostFilters
```

This will place the filter class under an App\Filters namespace if you are using the default namespace/directory structure. It should look like this.

```php
namespace App\Filters;

use RalphMorris\LaravelRequestFilters\QueryFilter;

class PostFilters extends QueryFilter
{
	/**
	 * Example
	 * 
	 * The request parameter key as the method name.
	 * Passes the parameters value to the method 
	 * so we can apply a filter to the query.
	 * 
	 * @param  mixed $param Value of the request parameter
	 */
	public function example_request_param($param)
	{
        $this->builder->where('example_request_param', $param);
	}
}
```

If you wanted to add a filter on the title and author ID, yo umight d something like this.

```php
namespace App\Filters;

use RalphMorris\LaravelRequestFilters\QueryFilter;

class PostFilters extends QueryFilter
{
	public function title($title)
	{
        $this->builder->where('title', 'like', "%{$title}%");
	}

	public function author($authorId)
	{
        $this->builder->where('author_id', $authorId);
	}
}
```

Finally to add the filters to your query apply filter() query scope in the FilterableTrait to your query and pass the PostFilters class through. 

```php
public function index(PostFilters $filters)
{
    $posts = Post::filter($filters)->get();
}
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email ralph@bubblehubsolutions.co.uk instead of using the issue tracker.

## Credits

- [Ralph Morris](https://github.com/ralphmorris)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).