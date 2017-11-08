<?php

require_once('class.fileHandler.php');

 class TemplatingSystem
 {
     public $templateFile; // Default file
     public $templateExtension; // Default file extension
     private $errors = ""; // Error handler
     public $readTemplate = false; // (past tence)Success or nah
     public $tpl = ""; // Templatecontainer
     public $blockcontent = array(); // TODO

     public function __construct($templateFile, $templateExtension) {
         $this->fileHandler = new fileHandler($templateFile, $templateExtension);
         $this->templateFile = $templateFile;
         $this->templateExtension = $templateExtension;
     }

     public function parseTemplate() {
         if ($this->errors == "") { // Check for errors
//             if ($this->readTemplate == false) { // Template read or not (voor $blockcontent wel handig in deze method)
//                 $this->readTemplate();
//             }
             if ($this->templateExtension != '.tpl') {
                 $this->errors = "The filename " . $this->templateFile . $this->templateExtension . " doesn't have the .tpl extension"; // Return errors
                 return $this->errors; // Return errors
             }
         } else {
             $this->readTemplate();
             return $this->errors; // Return errors
         }
     }

     public function readTemplate() {
         $this->tpl = $this->fileHandler->readFile($this->templateFile, $this->templateExtension);
     }

    public function setTemplateData($pattern, $replacement) {
//        if ($this->readTemplate() == false) { //Check...dry?
//            $this->readTemplate();
//        }
        $this->tpl = preg_replace("#\{" . $pattern . "\}#si", $replacement, $this->tpl); // (blabla) changed to...
        $fp = fopen('default.tpl', 'w');
        fwrite($fp, $this->tpl);
    }
}