<?php

namespace Tests;

use LaravelPhoenix\AutoFilesLocalizer\AutoTranslator;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Testing\TestCase;

class AutoTranslatorTest extends TestCase
{
    public function testCustomTranslation()
    {
        // Create an instance of AutoTranslator
        $translator = new AutoTranslator(app('translation.loader'), 'en');

        // Test custom translation logic
        $translation = $translator->get('messages.welcome');
        $this->assertEquals('Welcome', $translation);

        // Test translation replacement
        $translationWithPlaceholder = $translator->get('messages.greeting', ['name' => 'John']);
        $this->assertEquals('Hello, John', $translationWithPlaceholder);
    }

    public function testTranslationSavedToJson()
    {
        // Set the config to enable auto-translation
        config(['app.auto-translate' => true]);

        // Create an instance of AutoTranslator
        $translator = new AutoTranslator(app('translation.loader'), 'en');

        // Get a translation key to trigger saving to JSON
        $translation = $translator->get('messages.saved_to_json');

        // Check if the translation was saved to the JSON file
        $jsonPath = resource_path('lang/en.json');
        $this->assertTrue(File::exists($jsonPath));
        $translations = json_decode(File::get($jsonPath), true);
        $this->assertEquals('This translation was saved to JSON.', $translations['messages.saved_to_json']);
    }

    public function testTranslationNotSavedToJson()
    {
        // Set the config to disable auto-translation
        config(['app.auto-translate' => false]);

        // Create an instance of AutoTranslator
        $translator = new AutoTranslator(app('translation.loader'), 'en');

        // Get a translation key to check if it's not saved to JSON
        $translation = $translator->get('messages.not_saved_to_json');

        // Check if the translation was not saved to the JSON file
        $jsonPath = resource_path('lang/en.json');
        $this->assertFalse(File::exists($jsonPath));
    }
}