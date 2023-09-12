<?php

namespace LaravelPhoenix\AutoFilesLocalizer;

use Illuminate\Support\Facades\File;
use Illuminate\Translation\Translator;

class AutoTranslator extends Translator
{
    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        if (config('auto-localizer.enabled') && !app()->environment('production')) {
            $this->saveTranslation($key, $locale ?: $this->locale);
        }
        
        return parent::get($key, $replace, $locale, $fallback);
    }

    private function saveTranslation($key = null, $locale = null): void
	{
        $langDir = config('auto-localizer.path');

        if (!is_dir($langDir)) {
            mkdir($langDir, 0755, true);
        }
        
        $fileName = $locale . '.json';
        $filePath = $langDir . DIRECTORY_SEPARATOR . $fileName;

        if (!File::exists($filePath)) {
            File::put($filePath, json_encode((object) [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
        
        $translations = (array) json_decode(File::get($filePath));

        if (!isset($translations[$key])) {
            $translations[$key] = $key;
            ksort($translations);
            File::put($filePath, json_encode((object)$translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
	} 
}