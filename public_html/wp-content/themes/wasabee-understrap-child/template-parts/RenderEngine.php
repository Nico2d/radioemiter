<?php

class RenderEngine {
    private $template;
    private $postId;

    public function __construct($template, $postId = 0) {
        $this->template = $template;
        $this->postId = $postId;
        $this->template['className'] = $this->getClassName();
        $this->render();
    }

    private function getTemplateFilePath() {
        return get_stylesheet_directory() . "/template-parts/{$this->template['type']}/index.php";
    }

    private function render() {
        ob_start();
        if(include($this->getTemplateFilePath())) {
            $content = ob_get_contents();
        } else {
            $content = null;
        }
    
        ob_end_clean();
        echo $content;
    }

    private function getClassName() {
        $typeToPascal = str_replace('_', '', ucwords($this->template['type'], '_'));
        return !empty($this->template['wrapper']['class']) 
            ? "{$typeToPascal} {$this->template['wrapper']['class']}"
            : $typeToPascal;
    }

    private function get($path = '') {
        if (empty($path)) {
            return $this->template;
        }
        
        $path = explode('.', $path);
        $template = $this->template;
        foreach ($path as $property) {
            if(!isset($template[$property])) {
                return '';
            }
            $template = $template[$property];
        }

        return $template;
    }
}
