<?php

/** Include helpers request file */
require_once ICEBERG_DIR_HELPERS . 'session.php';

/**
 * Session
 * 
 * Session management
 *  
 * @package Iceberg
 * @subpackage Session
 * @author Marc Mascort Bou
 * @version 1.0
 * @since 1.0
 */
class Session extends ObjectConfig
{
    
    /**
     * Configuration use language
     * @var boolean
     */
    public static $CONFIG_USE_LANGUAGE = false;
    
    /**
     * Configuration key
     * @var string
     */
    public static $CONFIG_KEY = 'session_config';
    
    /**
     * Configuration defaults
     * @var array
     */
    public static $CONFIG_DEFAULTS = array(
        'name' => '',
        'time' => 86400,
        'multisession' => true
    );
    
    /**
     * Key of last activity 
     */
    const SESSION_KEY_LAST_ACTIVITY = 'LAST_ACTIVITY';
    
    
    /**
     * Constructor 
     */
    public function __construct()
    {}

    /**
     * Start session
     * 
     * @uses action_event() for 'session_start'
     * @global string $__SESSION_ID
     * @return boolean 
     */
    static public function Start()
    {
        global $__SESSION_ID;
        $done = false;
        $__SESSION_ID = self::GetID();
        if (!$__SESSION_ID)
        {
            $session_name = static::GetConfigValue('name', ICEBERG_SESSION_NAME);
            $session_time = static::GetConfigValue('time', ICEBERG_SESSION_TIME);
            $session_name = 'iceberg_' . IcebergSecurity::MakeNonce($session_name);
            do_action('session_start', $session_name, $session_time);
            $last = self::GetValue(self::SESSION_KEY_LAST_ACTIVITY);
            if ($last && (time() - $last > $session_time))
            {
                self::Stop(true);
                $done = self::Start();
            }
            else
            {
                ini_set('session.gc_maxlifetime', $session_time);
                ini_set('session.gc_divisor', 10000);
                ini_set('session.gc_probability', 1);
                ini_set('session.cookie_lifetime', 0);
                session_name($session_name);
                $done = session_start();
                if ($done)
                {
                    $__SESSION_ID = session_id();
                }
            }
        }
        return $done;
    }
    
    /**
     * Load session 
     */
    static public function LoadSession()
    {
        $_SESSION = Request::StripSlashes($_SESSION);
    }

    /**
     * Stop session
     * 
     * @uses action_event() for 'session_stop'
     * @global string $__SESSION_ID
     * @param boolean $drop 
     */
    static public function Stop($drop=false)
    {
        global $__SESSION_ID;
        $__SESSION_ID = null;
        if ($drop) { $_SESSION=array(); session_unset(); }
        session_destroy();
        $_SESSION = array();
        do_action('session_stop', $drop);
    }

    /**
     * Restart session
     * 
     * @param boolean $drop
     * @return boolean 
     */
    static public function Restart($drop=false)
    {
        Session::Stop($drop);
        return Session::Start();
    }

    /**
     * Returns session ID
     * 
     * @return string|boolean 
     */
    static public function GetID()
    {
        return session_id();
    }
    
    /**
     * Retuns session name
     * 
     * @param boolean $from_config
     * @return strin|boolean 
     */
    static public function GetName($from_config=true)
    {
        return $from_config ? static::GetConfigValue('name', ICEBERG_SESSION_NAME) : session_name();
    }
    
    /**
     * Returns session lifetime
     * 
     * @return int
     */
    static public function GetLifeTime()
    {
        return static::GetConfigValue('time', ICEBERG_SESSION_TIME);
    }
    
    
    public static function Save($config)
    {
        return static::SaveConfig($config);
    }
    
    /*
    public static function GetLevels()
    {
        $arr = static::GetConfigValue('levels', array());
        ksort($arr);
        return $arr;
    }
    
    public static function GetMinimumLevel()
    {
        return static::GetConfigValue('minimum-level', 0);
    }
    
    public static function GetAdminLevel()
    {
        return static::GetConfigValue('admin-level', 100);
    }
    */

    /**
     * Set a session value for a key, if value is null unset the key
     * 
     * @param string $key
     * @param mixed $value
     * @return boolean 
     */
    static public function SetValue($key, $value=null)
    {
        if (is_null($value))
        {
            $_SESSION[$key] = null;
            unset($_SESSION[$key]);
        }
        else
        {
            $_SESSION[$key] = $value;
        }
        do_action('session_set', $key, $value);
        return true;
    }

    /**
     * Unset a session value for a key
     * 
     * @param string $key
     * @return boolean 
     */
    static public function UnsetValue($key) {
        return self::SetValue($key);
    }
    
    /**
     * Get value of session
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed 
     */
    static public function GetValue($key, $default=null)
    {
        $value = isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
        do_action('session_get', $value, $key, $default);
        return $value;
    }

    /**
     * Get is set key in SESSION
     * 
     * @uses action_event() for 'request_isset_s'
     * @param string $key
     * @return bool 
     */
    static function IssetKey($key)
    {
        $isset = isset($_SESSION[$key]) ? true : false;
        do_action('session_isset', $isset, $key);
        return $isset;
    }
}


