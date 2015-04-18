<?php

namespace Fashion;

/**
 * Interface for fetching data
 */
interface DataFetcherInterface {

    /**
     * fetches data
     * 
     * @param $offset    the offset of the data
     * @param $size      the number of items to retrieve
     * @throws \Exception
     */
    public function fetch($offset, $size);
}