<?php 
namespace Src\GetEnv;

abstract class GetEnv
{
    protected static function _getEnv() 
    {
        if (false === file_exists(dirname(__FILE__).'/../.env')) {
            exit('Please create your .env file first');
        }
        
        return parse_ini_file(dirname(__FILE__).'/../.env');
    }
}



