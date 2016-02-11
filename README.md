## Sun Country

Sun Country is the package that helps you to get the country name and dialing code by the country ISO 3166-1 Alpha-2 code.

## Installation Process
 
Just copy Country folder somewhere into your project directory. Then include Sun Country autoload file.        
 
```php
require_once('/path/to/Country/autoload.php');
```

Sun Country is also available via Composer/Packagist.

```
composer require sun/country
```
 
## Basic Uses

#### Get All Countries Name and Dialing Code

```php
$country = new Sun\Country;
$country->get();
```

#### Get a Country Name and Dialing Code

```php
$country = new Sun\Country;
$country->get('BD');
```

#### Get Multiple Countries Name and Dialing Code

```php
$country = new Sun\Country;
$country->get(['BD', 'US']);
```

#### Get a Country Name and Dialing Code using Alpha 2 code as property

```php
$country = new Sun\Country;
$country->bd;
```


#### Get a Country Name

```php
$country = new Sun\Country;
$country->getName('BD');
```

#### Get a Country Dialing Code

```php
$country = new Sun\Country;
$country->getDialingCode('BD');
```

## Integration In Laravel Framework

Add the ServiceProvider to the providers array in config/app.php

```php
Sun\Provider\CountryServiceProvider::class,
```

Add the facade to the aliases array in config/app.php

```php
'Country'   =>  Sun\Facade\CountryFacade::class,
```

## Integration In Planet Framework

Add the provider in the config/provider.php file.

```php
Sun\Provider\CountryProvider::class,
```

Add the alien in the config/alien.php file.

```php
'Country'   =>  Sun\Alien\CountryAlien::class,
```


## License
This package is licensed under the [MIT License](https://github.com/iftekhersunny/Country/blob/master/LICENSE)
