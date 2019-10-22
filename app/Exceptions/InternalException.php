<?php

namespace App\Exceptions;

use Exception;

class InternalException extends Exception
{
    protected $model;

    protected $action;

    protected $level;

    protected $exception;

    public function __construct($message, $model, $action, $exception = null, $level = 'error', $code = 500)
    {
        $this->model = $model;
        $this->action = $action;
        $this->level = $level;
        $this->exception = $exception;
        $message = '系统内部错误：' . $message;

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
            'exception' => $this->exception->getMessage(),
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
        if (config('app.debug')) {
            $this->message = $this->exception->getMessage();

            return false;
        } else {
            return back()->withErrors($this->getMessage())->withInput();
        }
    }
}
