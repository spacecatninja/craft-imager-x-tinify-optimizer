# Upgrading to Imager X Tinify Optimizer 2 (Craft 6)

This guide lists what changed in version 2 of the Tinify optimizer for Imager X, and what you need to update in your project and custom code. It applies when upgrading from version 1 (Craft 5 and Imager X 6).

The optimizer is still enabled and configured in Imager X's `optimizers` and `optimizerConfig` settings, with the same options. Imager X 7 reads its config from `config/craft/imager-x.php`, see Imager X's upgrade guide. The class changes only affect custom code that uses the plugin's classes directly.

## Requirements

- Craft CMS 6.0.0 or later
- Imager X 7.0.0-beta.2 or later
- PHP 8.5 or later
- The plugin doesn't need the Yii 2 adapter (`craftcms/yii2-adapter`).

## Upgrade steps

1. Upgrade your project to Craft 6, and Imager X to version 7.
2. Update the plugin: `composer require spacecatninja/imager-x-tinify-optimizer:^2.0.0`.
3. Review the breaking changes below, and update your code.

## Breaking changes

### Namespace and classes

The plugin moved from `spacecatninja\imagerxtinifyoptimizer` to the `SpaceCatNinja\ImagerXTinifyOptimizer` namespace, with Laravel-style folders.

| Before | After |
| --- | --- |
| `spacecatninja\imagerxtinifyoptimizer\ImagerXTinifyOptimizer` | `SpaceCatNinja\ImagerXTinifyOptimizer\ImagerXTinifyOptimizer` |
| `spacecatninja\imagerxtinifyoptimizer\optimizers\TinifyOptimizer` | `SpaceCatNinja\ImagerXTinifyOptimizer\Optimizers\TinifyOptimizer` |

`TinifyOptimizer` implements Imager X 7's `SpaceCatNinja\ImagerX\Optimizers\ImagerOptimizeInterface`.

### Registering the optimizer under another handle

The plugin registers the optimizer with Imager X's `Optimizers` registry when it boots, instead of with Imager X's `EVENT_REGISTER_OPTIMIZERS` event. If your code also registers the optimizer, for example under another handle, use the registry.

Before:

```php
use spacecatninja\imagerx\events\RegisterOptimizersEvent;
use spacecatninja\imagerx\ImagerX;
use spacecatninja\imagerxtinifyoptimizer\optimizers\TinifyOptimizer;
use yii\base\Event;

Event::on(ImagerX::class, ImagerX::EVENT_REGISTER_OPTIMIZERS, static function(RegisterOptimizersEvent $event) {
    $event->optimizers['mytinify'] = TinifyOptimizer::class;
});
```

After:

```php
use SpaceCatNinja\ImagerX\Optimizers\Optimizers;
use SpaceCatNinja\ImagerXTinifyOptimizer\Optimizers\TinifyOptimizer;

app(Optimizers::class)->register('mytinify', TinifyOptimizer::class);
```
