<?php
require "FileHandler.php";

/**
 * Templating system class
 */
class TemplatingSystem {

    /**
     * the template to use
     *
     * @var string
     */
    public $path = "default.tpl";

    /**
     * errors
     *
     * @var string
     */
    private $errors = "";
    
    /**
     * the read template
     *
     * @var string
     */
    public $tpl = "";

    /**
     * if the template is read
     *
     * @var boolean
     */
    public $readTemplate = false;

    /**
     * the constructor
     *
     * @param string|boolean $template
     */
    public function __construct($template = false) {

        if(!empty($template)) {

            if(!preg_match("#(.+?).tpl#si", $template)) {
                $this->errors = "File extension not correct";
            } else {
                if(!file_exists($template)) {
                    $this->errors = "File does not exist";
                } else {
                    $this->path = $template;
                }

            }

        } else {
            $this->errors = "Template variable is empty";
        }

        $this->fileHandler = new FileHandler();

    }

    /**
     * reads a template
     *
     * @return string the template
     */
    public function readTemplate() {

        if(!file_exists($this->path)) {
            $this->errors = "File does not exist";
        }

        $this->tpl = $this->fileHandler->read($this->path);
        $this->readTemplate = true;
    }

    /**
     * replaces the template {key} with the value
     *
     * @param array|string $pattern
     * @param string $replacement
     * @return void
     */
    public function setTemplateData($pattern, $replacement = null) {

        if(gettype($pattern) == "array" && empty($replacement)) {
            foreach($pattern as $key => $value) {
                $this->setTemplateData($key, $value);
            }
            return;
        }
        
        if($this->readTemplate == false) {
            $this->readTemplate();
        }

        $this->tpl = preg_replace("#\{\s*$pattern\s*\}#si", $replacement, $this->tpl);

    }

    public function parseTemplate() {
        return $this->tpl;
    }

}
