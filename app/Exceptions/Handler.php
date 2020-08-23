<?php

namespace App\Exceptions;

use Throwable;
use Exception;
use Mail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\Debug\ExceptionHandler as SymfonyExceptionHandler;
use App\Mail\ExceptionOccured;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
      //parent::report($exception);
      if ($this->shouldReport($exception)) {
        $this->sendEmail($exception); // sends an email
      }
      return parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function sendEmail(Throwable $exception)
    {
        try {
          $e = FlattenException::create($exception);

          $handler = new SymfonyExceptionHandler();

          $html = $handler->getHtml($e);
          Mail::to('wmalahaideb@pnu.edu.sa')->send(new ExceptionOccured($html));
        } catch (Exception $ex) {
            dd($ex);
        }
    }

}
