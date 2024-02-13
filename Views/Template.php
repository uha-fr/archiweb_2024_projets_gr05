<?php
namespace Views;

class Template {
    private $templateFile;
    private $data = [];

    public function __construct() { 
        
    }

    public function setTemplateFile($templateFile){
        $this->templateFile = $templateFile;
    }

    public function set($key, $value) {
        $this->data[$key] = $value;
    }

    public function get($key) {
        if (!isset($this->data[$key])) {
            throw new \Exception("Variable '$key' is not set");
        }

        return $this->data[$key];
    }
    function getExtendedFileName($extendsDirective)
    {
        // Extract the file name enclosed in single quotes
        preg_match("/'([^']+)'/", $extendsDirective, $matches);
        
        // Return the matched file name
        return isset($matches[1]) ? $matches[1] : null;
    }
    public function output() {
        $templateContent = file_get_contents(dirname(__FILE__).'/'.$this->templateFile);
        preg_match('/@extends\((.*?)\)/', $templateContent, $matches);
        $templateContent = preg_replace('/@extends\((.*?)\)/', '', $templateContent);
        if(count($matches)){
            $extendedFileName = $this->getExtendedFileName($matches[1]);
            //echo $extendedFileName;
            $extendedFileContent = file_get_contents(dirname(__FILE__).'/'.$extendedFileName);
            $templateContent = str_replace('@content',$templateContent , $extendedFileContent);
        }
        foreach ($this->data as $key => $value) {
            if (is_array($value)) {
                $value = json_encode($value);
                $templateContent = str_replace("::$key", $value, $templateContent);
            } else{
                $templateContent = str_replace("::$key", $value, $templateContent);
            }  
        }
         eval('?>'.$templateContent.'<?php ');
        
    }  
}
?>