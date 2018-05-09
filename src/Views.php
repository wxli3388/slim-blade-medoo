<?php 
namespace Src\Views;

use duncan3dc\Laravel\BladeInstance;

/**
 * View instance of duncan3dc/Blade
 */
class Views extends BladeInstance
{
    /**
     * The application instance extends from BladeInstance.
     *
     * @var duncan3dc\Laravel\BladeInstance
     */
    private static $_uniqueInstance;

    public function __construct($path, $cache) 
    {
        parent::__construct($path, $cache);
    }

    /**
     * Create Views Instance
     * @param  array|string $paths 
     * @return object       static
     */
    public static function getInstance() 
    {
        if (null !== static::$_uniqueInstance) {
            return static::$_uniqueInstance;
        }

        $blade   = new static(
                    dirname(__FILE__).'/../views', 
                    dirname(__FILE__).'/../cache/views'
                );

        return static::$_uniqueInstance = $blade;
    }
} 
