<?php
namespace App\Services\Image;

use Intervention\Image\Facades\Image;

class ImageService
{
    protected $path;
    protected $filesystem;

    public function __construct($path = null)
    {
        $this->path = $path ?? config('sleeping_owl.imagesUploadDirectory');
        $this->filesystem = app()->make('files');
    }

    public function createImage($filename, $dir, array $settings, $quality = 90)
    {
        $this->createDir("{$this->path}/{$dir}");

        if (class_exists('Intervention\Image\Facades\Image') && (bool) getimagesize(public_path($filename))) {
            $image = Image::make(public_path($filename));

            foreach ($settings as $method => $args) {
                call_user_func_array([$image, $method], $args);
            }

            $value = $dir ? "{$this->path}/{$dir}/{$image->basename}" : "{$this->path}/{$image->basename}";

            $image->save(public_path($value), $quality);
            //save webp
            $image->save("{$image->dirname}/{$image->filename}.webp", $quality + 20);

            return $value;
        }
    }

    public function createDir($dir = null)
    {
        if (!$dir) {
            return false;
        }

        if (! $this->filesystem->isDirectory(public_path($dir))) {
            return $this->filesystem->makeDirectory(public_path($dir), 0777, true);
        }

        return false;
    }

    public function removePublicPath($path)
    {
        return str_replace(public_path(), '', $path);
    }

    public function clearDir($dir = null)
    {
        if (!$dir) {
            return false;
        }
        $path = public_path("{$this->path}/{$dir}");
        return $this->filesystem->cleanDirectory($path);
    }

    public function removeFile($path)
    {
        $path = public_path($this->removePublicPath($path));
        return $this->filesystem->delete($path);
    }

    public function removeFileName($path)
    {
        $path = public_path($this->removePublicPath($path));
        $dirname = $this->filesystem->dirname($path);
        $filename = $this->filesystem->name($path);
        $files = $this->filesystem->glob("{$dirname}/{$filename}.*");

        return $this->filesystem->delete($files);
    }

    public function clearTempDir()
    {
        $this->clearDir('temp');
    }
}
