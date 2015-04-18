<?php

namespace Fashion;

/**
 * Data Renderer for JSON
 */
class DataRendererJSON implements DataRendererInterface {
    private $data = null;

    /**
     * Constructor
     * 
     * @param $data    the input array of data
     */
    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * JSON encode the data
     */
    public function render() {
        print_r(json_encode($this->data));
    }
}