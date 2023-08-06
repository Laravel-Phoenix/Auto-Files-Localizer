<?php

$envFile = base_path('.env');
$envContents = file_get_contents($envFile);

if (strpos($envContents, 'AUTO_TRANSLATE=true') === false) {
    $envContents .= "\nAUTO_TRANSLATE=true\n";
    file_put_contents($envFile, $envContents);
}