<?php

namespace Fashion;

class DataRendererJSON implements DataRendererInterface {
    private $data = null;
    public function __construct($data) {
        $this->data = $data;
    }

    public function render() {
        return json_encode($this->data);
    }
}