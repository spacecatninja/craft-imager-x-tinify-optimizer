# Tinify Optimizer for Imager X

## 2.0.0-beta.1 - 2026-11-20

> [!IMPORTANT]
> Version 2 requires Craft CMS 6, Imager X 7 and PHP 8.5, and there are breaking changes for code that uses the plugin's classes. See [UPGRADE.md](UPGRADE.md).

### Changed
- The plugin now requires Craft CMS 6, Imager X 7.0.0-beta.2 or later, and PHP 8.5, and uses Craft 6's native plugin APIs. It doesn't need the Yii 2 adapter.
- Classes moved to the `SpaceCatNinja\ImagerXTinifyOptimizer` namespace, and to Laravel-style folders.
- The optimizer is now registered with Imager X's `Optimizers` registry.

### Fixed
- Fixed errors from Tinify always being logged as a failed connection. The log now has Tinify's error message.

## 1.0.0 - 2026-03-06

### Added
- Initial release, refactored from Imager X core. 
