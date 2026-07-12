<?php

namespace Controller;

class Controller {

    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    protected function data($variable, $data) {
        $this->data[$variable] = $data;
    }

    protected function display($title, $viewData = []) {
        if (!is_array($this->data)) {
            $this->data = [];
        }

        if (is_array($viewData)) {
            $this->data = array_merge($this->data, $viewData);
        }

        foreach ($this->data as $variable => $data) {
            $$variable = $data;
        }

        $viewPath = BASE_PATH . "/app/View/" . $title . ".php";

        if (file_exists($viewPath)) {
            include_once($viewPath);
        } else {
            throw new \Exception("View $title not found at $viewPath");
        }
    }

    protected function redirect($url, array $params = []) {
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        if (!headers_sent()) {
            header('Location: ' . $url);
            exit();
        } else {
            echo "<script>window.location.href = '" . htmlspecialchars($url) . "';</script>";
            exit();
        }
    }
}
