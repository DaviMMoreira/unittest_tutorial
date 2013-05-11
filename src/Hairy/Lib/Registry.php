<?php
namespace Hairy\Lib
{
    class Registry
    {
        /**
         * Our registry data
         * @var array
         */
        protected static $data = [];

        /**
         * Put a value in the registry
         * @param string $name
         * @param mixed $value
         */
        public static function set($name, $value)
        {
            self::$data[(string)$name] = $value;
        }

        /**
         * Returns the value from the registry, or $default if not found. If no
         * default is set, null we be returned.
         * @param string $name
         * @param mixed $default the default value to return if it's not set
         * @return mixed
         */
        public static function get($name, $default=null)
        {
            if (array_key_exists($name, self::$data))
            {
                return self::$data[$name];
            }
            else
            {
                return null;
            }
        }
    }
}