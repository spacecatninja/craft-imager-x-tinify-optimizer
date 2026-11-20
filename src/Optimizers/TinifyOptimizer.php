<?php
/**
 * Tinify optimizer for Imager X
 *
 * @link      https://www.spacecat.ninja/
 * @copyright Copyright (c) 2026 André Elvan
 */

namespace SpaceCatNinja\ImagerXTinifyOptimizer\Optimizers;

use CraftCms\Cms\Support\Env;
use Illuminate\Support\Facades\Log;
use SpaceCatNinja\ImagerX\Optimizers\ImagerOptimizeInterface;
use Tinify\Exception;
use function Tinify\fromFile;
use function Tinify\setKey;
use function Tinify\validate;

class TinifyOptimizer implements ImagerOptimizeInterface
{
    public static function optimize(string $file, ?array $settings): void
    {
        try {
            setKey(Env::parse($settings['apiKey']));
            validate();
            fromFile($file)->toFile($file);
        } catch (Exception) {
            Log::error('Could not validate connection to TinyPNG, image was not optimized.');
        }
    }
}
