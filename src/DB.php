<?php 
namespace Src\DB;

use Medoo\Medoo;
use Src\GetEnv\GetEnv;

class DB extends GetEnv
{
    /**
     *
     * A DB unique instance.
     *
     * @var Object
     *
     */
    private static $_uniqueInstanceMysql;
    private static $_uniqueInstancePgsql;
    

    public function __construct() 
    {
        
        //parent::__construct();
    }

    
    public static function getInstance(string $type = '' ,array $options = []){
        $env = self::_getEnv();
        
        $settings['database_type'] = $type;

        /** 
         * @todo custom options, see offical document https://medoo.in/api/new
         */
        //if(isset($options['something'])){}    

        switch($type){
            case 'mariadb':
            case 'mysql':                
                $settings['server'] = $options['server']?? $env['DB_MYSQL_HOST'];
                $settings['database_name'] = $options['database_name']?? $env['DB_MYSQL_DATABASE'];
                $settings['username'] = $options['username']?? $env['DB_MYSQL_USERNAME'];
                $settings['password'] = $options['password']?? $env['DB_MYSQL_PASSWORD'];
                return self::$_uniqueInstanceMysql = new Medoo($settings);
                break;
            case 'mssql':
                break;
            case 'pgsql':
                $settings['server'] = $options['server']?? $env['DB_PGSQL_HOST'];
                $settings['database_name'] = $options['database_name']?? $env['DB_PGSQL_DATABASE'];
                $settings['username'] = $options['username']?? $env['DB_PGSQL_USERNAME'];
                $settings['password'] = $options['password']?? $env['DB_PGSQL_PASSWORD'];
                return self::$_uniqueInstancePgsql = new Medoo($settings);
                break;
            case 'oracle':
                break;
            case 'sqlite':
                break;
            default:
                exit('Please choose your database type');
        }
                        
        
    }
    
    
} 
