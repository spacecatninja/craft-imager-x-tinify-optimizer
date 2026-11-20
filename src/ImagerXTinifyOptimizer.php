<?php
/**
 * Tinify optimizer for Imager X
 *
 * @link      https://www.spacecat.ninja/
 * @copyright Copyright (c) 2026 André Elvan
 */

namespace SpaceCatNinja\ImagerXTinifyOptimizer;

use craft\base\Plugin;
use SpaceCatNinja\ImagerXTinifyOptimizer\Optimizers\TinifyOptimizer;
use yii\base\Event;

/**
 * @author    SpaceCatNinja
 * @package   ImagerXTinifyOptimizer
 * @since     1.0.0
 *
 */
class ImagerXTinifyOptimizer extends Plugin
{
    public function init(): void
    {
        parent::init();

        Event::on(\spacecatninja\imagerx\ImagerX::class,
            \spacecatninja\imagerx\ImagerX::EVENT_REGISTER_OPTIMIZERS,
            static function(\spacecatninja\imagerx\events\RegisterOptimizersEvent $event) {
                $event->optimizers['tinify'] = TinifyOptimizer::class;
            }
        );
    }
}
