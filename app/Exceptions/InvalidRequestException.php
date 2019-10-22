<?php

namespace App\Exceptions;

use Exception;

class InvalidRequestException extends Exception
{
    protected $model;

    protected $action;

    protected $level;

    public function __construct($message, $model, $action, $level = 'error', $code = 400)
    {
        $this->model = $model;
        $this->action = $action;
        $this->level = $level;

        parent::__construct($message, $code);
    }

    /**
     * Report or log an exception.
     *
     * @param App\Services\LogService $log
     * @return void
     */
    public function report()
    {
        $content = [
            'message' => $this->getMessage(),
        ];

        // $log->write($content, $this->model, $this->action, $this->level);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return back()->withErrors($this->getMessage())->withInput();
    }
}
