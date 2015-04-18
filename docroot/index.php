<?php

require_once("../vendor/autoload.php");

use Fashion\RequestKeys as RequestKeys;
use Fashion\DataFetcherRandom as DataFetcherRandom;
use Fashion\DataRendererJSON as DataRendererJSON;

$app = new \Slim\Slim();

/**
 * handle ajax calls to fetch cards
 */
$app->get("/api/v1/cards", function () use ($app) {
        $errorCode = Fashion\ReturnCodes::OK;
        $errorMessage = "";
        $results = array(Fashion\ResultKeys::KEY_STATUS_CODE => $errorCode,
                         Fashion\ResultKeys::KEY_ERROR_MESSAGE => $errorMessage);
        try {
            $offset = $app->request->get(RequestKeys::KEY_OFFSET);
            $size = $app->request->get(RequestKeys::KEY_SIZE);
            $fetcher = new DataFetcherRandom();
            $data = $fetcher->fetch($offset, $size);
            $results[Fashion\ResultKeys::KEY_RESULTS] = $data;
        }
        catch (Exception $e) {
            $results = array(Fashion\ResultKeys::KEY_STATUS_CODE => $e->getCode(),
                             Fashion\ResultKeys::KEY_ERROR_MESSAGE => $e->getMessage(),
                             Fashion\ResultKeys::KEY_RESULTS => null
                );
        }

        $renderer = new DataRendererJSON($results);
        $renderer->render();
    }
);

$app->run();



