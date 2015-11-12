# WPApi
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/labzone/WPApi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/labzone/WPApi/?branch=master)

Wordpress.org API

## Examples

### Plugin

#### Search
```php
$response = WPApi\WPApi::plugin()->search('wordpress seo');

```

#### Slug
```php
$response = WPApi\WPApi::plugin()->slug('wordpress-seo');

```


### Theme

#### Search
```php
$response = WPApi\WPApi::theme()->search('simple');

```

#### Slug
```php
$response = WPApi\WPApi::theme()->slug('simpler');

```

#### Author
```php
$response = WPApi\WPApi::theme()->slug('fontethemes');

```