<?php

use BaseCodeOy\Standards\ConfigurationFactory;
use BaseCodeOy\Standards\Presets\Standard;

$config = ConfigurationFactory::createFromPreset(new Standard());
$config->getFinder()->in(__DIR__);

return $config;
