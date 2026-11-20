# Tinify Optimizer for Imager X

An optimizer plugin for [Imager X](https://plugins.craftcms.com/imager-x) that compresses images using the [Tinify API](https://tinypng.com/developers) (TinyPNG/TinyJPG).

## Requirements

- Craft CMS 6.0.0 or later
- Imager X 7.0.0-beta.2 or later
- PHP 8.5 or later

Version 1.x of this plugin supports Craft CMS 5 and Imager X 6. See [UPGRADE.md](UPGRADE.md) when moving to Craft 6.

## Installation

```bash
composer require spacecatninja/imager-x-tinify-optimizer
php artisan craft:plugin:install imager-x-tinify-optimizer
```

## Configuration

Add `tinify` to the `optimizers` array and configure it in `optimizerConfig` in your `config/craft/imager-x.php`:

```php
'optimizers' => ['tinify'],
'optimizerConfig' => [
    'tinify' => [
        'extensions' => ['png', 'jpg'],
        'apiKey' => '$TINIFY_API_KEY',
    ],
],
```

## Configuration options

| Option | Description |
|---|---|
| `extensions` | File extensions to optimize. Tinify supports `png` and `jpg`/`jpeg`. |
| `apiKey` | Your Tinify API key. Supports environment variables (e.g. `$TINIFY_API_KEY`). Get one at [tinypng.com/developers](https://tinypng.com/developers). |

## Price, license and support

The plugin is released under the MIT license. It requires Imager X, which is a commercial plugin [available in the Craft plugin store](https://plugins.craftcms.com/imager-x). If you need help or found a bug, please post an issue in this repo or in the Imager X repo.
