<?php
namespace TwitchPress\Webhooks;

/**
 * Handles caching for incoming webhook notifications.
 */
class Caching
{
    protected $location;
    protected $filename;
    protected $extension;
    protected $name;

    /**
     * Create a new cache object
     *
     * @param string $location
     * @param string $name Unique ID for the cache
     * @param string $extension
     */
    public function __construct($location, $name, $extension = 'txt')
    {
        $this->location = $location;
        $this->filename = $name;
        $this->extension = $extension;
        $this->name = "$this->location/$this->filename.$this->extension";
    }

    /**
     * Save data to a file
     *
     * @param mixed $data
     * @return bool
     */
    public function save($data)
    {
        if ((file_exists($this->name) && is_writable($this->name)) || (file_exists($this->location) && is_writable($this->location))) {
            if (is_object($data) && get_class($data) === 'SimplePie') {
                $data = $data->data;
            }
            $data = serialize($data);
            return (bool) file_put_contents($this->name, $data);
        }
        return false;
    }

    /**
     * Retrieve the data saved to the cache file
     *
     * @return mixed
     */
    public function load()
    {
        if (file_exists($this->name) && is_readable($this->name)) {
            return unserialize(file_get_contents($this->name));
        }
        return false;
    }

    /**
     * Retrieve the last modified time for a file
     *
     * @return int|false
     */
    public function mtime()
    {
        return @filemtime($this->name);
    }

    /**
     * Set the last modified time to the current time
     *
     * @return bool
     */
    public function touch()
    {
        return @touch($this->name);
    }

    /**
     * Remove the cache
     *
     * @return bool
     */
    public function unlink()
    {
        if (file_exists($this->name)) {
            return unlink($this->name);
        }
        return false;
    }
}
