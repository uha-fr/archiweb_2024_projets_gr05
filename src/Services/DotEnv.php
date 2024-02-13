<?php
namespace UHA\Services;
use UHA\Services\Database;

class DotEnv{    
    public function __construct(){
        
    }
    public function parseEnv()
    {
        $data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/.env');
        $lines = explode("\n", $data);
        $envVariables = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '#') === 0) {
                continue;
            }
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            $value = trim($value, "'\"");
            $envVariables[$key] = $value;
        }

        return $envVariables;
    }
}
?>