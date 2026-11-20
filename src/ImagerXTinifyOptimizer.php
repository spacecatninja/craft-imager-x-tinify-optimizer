<?php
/**
 * Tinify optimizer for Imager X
 *
 * @link      https://www.spacecat.ninja/
 * @copyright Copyright (c) 2026 André Elvan
 */

namespace SpaceCatNinja\ImagerXTinifyOptimizer;

use CraftCms\Cms\Plugin\Plugin;
use SpaceCatNinja\ImagerX\Optimizers\Optimizers;
use SpaceCatNinja\ImagerXTinifyOptimizer\Optimizers\TinifyOptimizer;

/**
 * @author    SpaceCatNinja
 * @package   ImagerXTinifyOptimizer
 * @since     1.0.0
 *
 */
class ImagerXTinifyOptimizer extends Plugin
{
    public function boot(Optimizers $optimizers): void
    {
        // Register optimizer in Imager X
        $optimizers->register('tinify', TinifyOptimizer::class);
    }
}
