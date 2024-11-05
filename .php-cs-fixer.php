<?php

use BaseCodeOy\PhpCsFixer\ConfigurationFactory;
use BaseCodeOy\PhpCsFixer\Preset\Standard;

$config = ConfigurationFactory::fromPreset(new Standard());
$config->getFinder()->in(__DIR__);

return $config;
