<?php

namespace HoaPlugin;

use Composer\Autoload\AutoloadGenerator as BaseAutoloadGenerator;

/**
 * AutoloadGenerator
 *
 * @uses BaseAutoloadGenerator
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class AutoloadGenerator extends BaseAutoloadGenerator
{
    /**
     * Set hoa\core require in last position.
     *
     * @param array $packageMap packageMap
     */
    protected function sortPackageMap(array $packageMap)
    {
        $packageMap = parent::sortPackageMap($packageMap);

        foreach ($packageMap as $k => $item) {
            if ($item[0]->getName() === 'hoa/core') {
                unset($packageMap[$k]);
                $packageMap[] = $item;
                break;
            }
        }

        return $packageMap;
    }
}
