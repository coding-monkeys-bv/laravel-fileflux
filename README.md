# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codingmonkeys/fileflux.svg?style=flat-square)](https://packagist.org/packages/codingmonkeys/fileflux)
[![Total Downloads](https://img.shields.io/packagist/dt/codingmonkeys/fileflux.svg?style=flat-square)](https://packagist.org/packages/codingmonkeys/fileflux)
![GitHub Actions](https://github.com/codingmonkeys/fileflux/actions/workflows/main.yml/badge.svg)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require codingmonkeys/laravel-fileflux
```

## Usage

```php
$response = (new FileFlux)
    ->project('{project-id}')
    ->webhook('https://{yourdomain.com}/file-flux/webhooks')
    ->workflow('ConvertAudioWorkflow')
    ->source('source/89-test copy.wav')
    ->target([
        'extension' => 'mp3',
        'filename' => 'target/converted2222.mp3',
        'channels' => 2,
        'bitrate' => 128,
    ])
    ->convert();
```

```php
// Example with preset.
$response = (new FileFlux)
    ->source('source/large.wav')
    ->preset('my-preset')
    ->target('target/large.mp3')
    ->convert();
```

```php
$response = (new FileFlux)
    ->project('{project-id}')
    ->webhook('https://{yourdomain.com}/file-flux/webhooks')
    ->workflow('ConvertAudioWorkflow')
    ->source('source/89-test copy.wav')
    ->target([
        'format' => 'webp',
        'quality' => 100,
        'folder' => 'target/folder',
        'pages' => 'all',
        'resolution' => 150,
    ])
    ->convert();
```

```php
// Example with preset.
$response = (new FileFlux)
    ->source('source/my-pdf-file.pdf')
    ->preset('pdf-to-image')
    ->target('target/folder')
    ->convert();
```

### Security

If you discover any security related issues, please email michael@codingmonkeys.nl instead of using the issue tracker.