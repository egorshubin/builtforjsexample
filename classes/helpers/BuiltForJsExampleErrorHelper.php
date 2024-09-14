<?php

require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/BuiltForJsExampleBasicHelper.php';

class BuiltForJsExampleErrorHelper extends BuiltForJsExampleBasicHelper
{
    public function throwError(Exception $exception)
    {
        $statusCode = $exception->getCode();

        $trace = $exception->getTraceAsString();

        if ($statusCode == 400) {
            $trace = '';
        }

        $return = [
            'detail' => $exception->getMessage(),
            'trace' => $trace,
        ];

        header("HTTP/1.1 $statusCode " . $this->getStatusCodeMessage($statusCode));
        header('Content-Type: application/json; charset=UTF-8');
        exit(json_encode($return));
    }

    protected function getStatusCodeMessage($statusCode)
    {
        $status = [
            400 => 'Bad Request',
            500 => 'Internal Server Error',
        ];

        return isset($status[$statusCode]) ? $status[$statusCode] : '';
    }
}
