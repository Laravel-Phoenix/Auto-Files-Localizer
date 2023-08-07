<?php

$envFile = base_path('.env');
$envContents = file_get_contents($envFile);

if (strpos($envContents, 'AUTO_LOCALIZER_ENABLED=true') === false) {
    $envContents .= "\nAUTO_LOCALIZER_ENABLED=true\n";
    file_put_contents($envFile, $envContents);
}