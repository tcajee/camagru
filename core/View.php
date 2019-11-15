<?php

class View {

    protected $_head;
    protected $_header;
    protected $_body;
    protected $_footer;
    protected $_siteTitle = SITE_TITLE;
    protected $_outputBuffer;
    protected $_layout = DEF_LAYOUT;

    public function __construct() {
        dump("Constructing instance of class View with no parameters:");
    }

    public function render($viewName) {
        $viewArray = explode('/', $viewName);
        $viewString = implode(DS, $viewArray);
        if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
            include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
            dump("included " . ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
            include(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php');
            dump("included " . ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php');
        } else {
            die('The view \"' . $viewName . '\" does not exists.');
        }
    }

    public function content($type) {
        if ($type == 'head') {
            return $this->_head;
        } else if ($type == 'body') {
            return $this->_body;
        } else if ($type == 'header') {
            return $this->_header;
        } else if ($type == 'footer') {
            return $this->_footer;
        } else {
            return false;
        }
    }

    public function start($type) {
        dump("Starting output buffer for: " . $type);
        $this->_outputBuffer = $type;
        ob_start();
    }
    
    public function end() {
        if ($this->_outputBuffer == 'head') {
            dump("Cleaning buffer for head");
            $this->_head = ob_get_clean();
        } else if ($this->_outputBuffer == 'body') {
            dump("Cleaning buffer for body");
            $this->_body = ob_get_clean();
        } else if ($this->_outputBuffer == 'header') {
            dump("Cleaning buffer for header");
            $this->_header = ob_get_clean();
        } else if ($this->_outputBuffer == 'footer') {
            dump("Cleaning buffer for footer");
            $this->_footer = ob_get_clean();
        } else {
            die('You must first run the start method');
        }
    }

    public function siteTitle() {
        return SITE_TITLE . ' | ' . $this->_siteTitle;
    }

    public function setSiteTitle($title) {
        $this->_siteTitle = $title;
        dump("Setting site title to: " . $this->_siteTitle);
    }

    public function setLayout($path) {
        $this->_layout = $path;
        dump("Setting layout to: " . $this->_layout);
    }
}