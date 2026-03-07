<?php
/**
 * Tinify optimizer for Imager X
 *
 * @link      https://www.spacecat.ninja/
 * @copyright Copyright (c) 2026 André Elvan
 */

namespace spacecatninja\imagerxtinifyoptimizer\optimizers;

use Craft;
use craft\helpers\App;
use spacecatninja\imagerx\optimizers\ImagerOptimizeInterface;
use Tinify\Exception;
use function Tinify\fromFile;
use function Tinify\setKey;
use function Tinify\validate;

class TinifyOptimizer implements ImagerOptimizeInterface
{
    public static function optimize(string $file, ?array $settings): void
    {
        try {
            setKey(App::parseEnv($settings['apiKey']));
            validate();
            fromFile($file)->toFile($file);
        } catch (Exception) {
            Craft::error('Could not validate connection to TinyPNG, image was not optimized.', __METHOD__);
        }
    }
}
