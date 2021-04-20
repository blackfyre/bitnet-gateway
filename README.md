# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/blackfyre/bitnet-gateway.svg?style=flat-square)](https://packagist.org/packages/blackfyre/bitnet-gateway)
[![Build Status](https://img.shields.io/travis/blackfyre/bitnet-gateway/master.svg?style=flat-square)](https://travis-ci.org/blackfyre/bitnet-gateway)
[![Quality Score](https://img.shields.io/scrutinizer/g/blackfyre/bitnet-gateway.svg?style=flat-square)](https://scrutinizer-ci.com/g/blackfyre/bitnet-gateway)
[![Total Downloads](https://img.shields.io/packagist/dt/blackfyre/bitnet-gateway.svg?style=flat-square)](https://packagist.org/packages/blackfyre/bitnet-gateway)

Laravel/Lumen Service provider for the BitNet SMS Service.

## Installation

You can install the package via composer:

```bash
composer require blackfyre/bitnet-gateway
```

### Lumen

In your `bootstrap/app.php` add the service provider:

``` php
$app->register(\Blackfyre\BitnetGateway\BitnetGatewayServiceProvider::class);
```

### .env

```
BITNET_USERNAME=YOUR_BITNET_USER
BITNET_PASSWORD=YOUR_BITNET_PWD
```

## Usage

### Lumen

``` php
$smsId = app('bitnet-gateway')->sendSMS('36#########', 'test');
$smsStatus = app('bitnet-gateway')->queryStatus($smsId)
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email gnick666@gmail.com instead of using the issue tracker.

## Credits

- [Meki](https://github.com/blackfyre)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
