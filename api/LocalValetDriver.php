<?php

class LocalValetDriver extends LaravelValetDriver
{
    /**
    * Determine if the driver serves the request.
    *
    * @param  string  $sitePath
    * @param  string  $siteName
    * @param  string  $uri
    * @return bool
    */
    public function serves($sitePath, $siteName, $uri)
    {
        return true;
    }

    /**
    * Determine if the incoming request is for a static file.
    *
    * @param  string  $sitePath
    * @param  string  $siteName
    * @param  string  $uri
    * @return string|false
    */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        if (file_exists($staticFilePath = $sitePath.'/public'.$uri)
           && is_file($staticFilePath)) {
            return $staticFilePath;
        }
        $storageUri = $uri;
        if (strpos($uri, '/storage/') === 0) {
            $storageUri = substr($uri, 8);
        }
        if ($this->isActualFile($storagePath = $sitePath.'/storage/'.$storageUri)) {
            return $storagePath;
        }
        return false;
    }

    /**
    * Get the fully resolved path to the application's front controller.
    *
    * @param  string  $sitePath
    * @param  string  $siteName
    * @param  string  $uri
    * @return string
    */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        return $sitePath.'/public/index.php';
    }
}