<?php

namespace App\Traits;

trait CreateRelativeImage
{
    public function setAttribute($key, $value)
    {
        if ($this->isUploadImageField($key)) {

            if ($this->hasSetMutator($key)) {
                $method = 'set'.Str::studly($key).'Attribute';

                return $this->{$method}($value);
            }

            return $this->allSetterImages($key, $value);
        }

        return parent::setAttribute($key, $value);
    }

    /**
     * Determine if a set mutator exists for an attribute.
     *
     * @param string $key
     *
     * @return bool
     */
    private function isUploadImageField($key)
    {
        return array_key_exists($key, $this->getUploadImagesSettings());
    }

    private function allSetterImages($key, $value)
    {
        if ($value && $this->{$key} !== $value) {
            $this->createUploadImages($value, $key);
        } else {
            $this->attributes[$key] = $value;
        }
    }

    private function createUploadImages($value, $key)
    {
        $settings = $this->getUploadImagesSettings();

        $this->createUploadImage($key, $value, $settings[$key]);

        // Remove tmp file
        $this->imageService->removeFile($value);
    }

    private function createUploadImage($key, $value, $settings) {
        // remove old images
        $this->imageService->removeFileName($this->{$key});
        // Set images
        $this->attributes[$key] = $this->imageService->createImage(
            $value,
            $settings['directory'] ?? '',
            $settings['settings'] ?? [],
            $settings['quality'] ?? 90
        );
        if (!empty($settings['relative'])) {
            foreach ($settings['relative'] as $relative_key => $relative_settings) {
                $this->createUploadImage($relative_key, $value, $relative_settings);
            }
        }
    }
}
