# Laravel Input Components for Livewire

[![Latest Version on Packagist](https://img.shields.io/packagist/v/daniellefence/inputs.svg?style=flat-square)](https://packagist.org/packages/daniellefence/inputs)
[![Total Downloads](https://img.shields.io/packagist/dt/daniellefence/inputs.svg?style=flat-square)](https://packagist.org/packages/daniellefence/inputs)
![GitHub Actions](https://github.com/daniellefence/inputs/actions/workflows/main.yml/badge.svg)

The `daniellefence/inputs` package provides a set of customizable, Livewire-compatible input components for Laravel applications. It supports a wide variety of input types including text, email, tel, textarea, select dropdowns, and fulltext (Trix-based rich text editor). These inputs are styled using Tailwind CSS and are optimized to work seamlessly inside Livewire components.

## Installation

You can install the package via composer:

```bash
composer require daniellefence/inputs
```

## Usage

```php
<!-- Basic text input -->
<x-df::input name="email" type="email" wire:model="email" label="Email Address" />

<!-- Textarea -->
<x-df::input variant="textarea" name="message" wire:model="message" label="Your Message" />

<!-- Select -->
<x-df::input variant="select" name="status" :options="['draft' => 'Draft', 'published' => 'Published']" wire:model="status" label="Status" />

<!-- Fulltext (Trix Editor) -->
<x-df::input variant="fulltext" name="body" wire:model="body" label="Article Body" />
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email sbarron@daniellefence.net instead of using the issue tracker.

## Credits

-   [Shane Barron](https://github.com/daniellefence)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Developed and Maintained By

Developed and maintained by the IT/Marketing department at Danielle Fence and Outdoor Living.
