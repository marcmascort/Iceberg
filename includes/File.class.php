<?php

/** Include helpers files file */
require_once ICEBERG_DIR_HELPERS . 'files.php';

/**
 * File
 * 
 * Files management
 *  
 * @package Iceberg
 * @subpackage Files
 * @author Marc Mascort Bou
 * @version 1.0
 * @since 1.0
 */
class File extends ObjectConfig
{
    /**
     * Configuration key
     * @var string
     */
    public static $CONFIG_KEY = 'files_config';
    
    /**
     * Configuration defaults
     * @var array
     */
    public static $CONFIG_DEFAULTS = array();
    
    const FILE_READ = 'r';
    const FILE_WRITE_OVERRIDE = 'w';
    const FILE_WRITE_CONTINUE_END = 'a';
    const FILE_WRITE_NEW = 'x';
    const FILE_WRITE_CONTINUE_BEGIN = 'c';
    
    
    static public function Write($file, $content, $type='w', $reading=false)
    {
        $done = false;
        if (is_file($file) && is_writable($file)) {
            $mode = $type . ( $reading ? '+' : '');
            $file = @fopen($file, $mode);
            if ($file !== false) {
                $done = @fwrite($file, $content);
                @fclose($file);
            }
        }
        return $done;
    }
    
    static public function GetExtension($filepath)
    {
        $done = preg_match('/[^?]*/', $filepath, $matches);
        if ($done === 1)
        {
            $string = $matches[0];
            $pattern = preg_split('/\./', $string, -1, PREG_SPLIT_OFFSET_CAPTURE);
            if(count($pattern) > 1)
            {
                $filenamepart = $pattern[count($pattern)-1][0];
                $done = preg_match('/[^?]*/', $filenamepart, $matches);
                if ($done === 1)
                {
                    return $matches[0];
                }
            }
        }
        return '';
    }
    
    static public function GetName($filepath)
    {
        $filename = '';
        $done = preg_match('/[^?]*/', $filepath, $matches);
        if ($done === 1)
        {
            $string = $matches[0];
            $pattern = preg_split('/\./', $string, -1, PREG_SPLIT_OFFSET_CAPTURE);
            $lastdot = $pattern[count($pattern)-1][1];
            $filename = basename(substr($string, 0, $lastdot-1));
        }
        return $filename;
    }
    
    static public function GetURL($path, $dir, $url)
    {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
        $dir = str_replace('\\', DIRECTORY_SEPARATOR, $dir);
        return str_replace($dir, $url, $path);
    }
    
    
    static public function Upload($tmp, $name)
    {
        if (is_uploaded_file($tmp))
        {
            $file = ICEBERG_DIR_UPLOADS . $name;
            $file = self::RenameDuplicateFile($file);
            if (move_uploaded_file($tmp, $file)) {
                return $name;
            }
        }
        return false;
    }
    
    static public function RenameDuplicateFile($file, $count=1)
    {
        if ($count>1 || is_file($file))
        {
            $pathinfo = pathinfo($file);
            $name = $pathinfo['filename'];
            $name .= '(' . $count . ')';
            $newfile = $pathinfo['dirname'] . DIRECTORY_SEPARATOR . $name . '.' . $pathinfo['extension'];
            if (is_file($newfile))
            {
                return self::RenameDuplicateFile($file, $count+1);
            }
            return $newfile;
        }
        return $file;
    }
    
}