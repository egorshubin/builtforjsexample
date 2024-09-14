<?php

class BuiltForJsExampleException extends Exception
{
    protected $code = 400;

    public function __construct($message = '', $code = 400)
    {
        parent::__construct($message, $code);
    }
}
