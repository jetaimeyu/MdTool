<?php

namespace App\Exceptions;

use App\Http\Controllers\JsonResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    use JsonResponse;
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {

        //如果接口是api请求
        if ($request->is('api/*')) {
//            if ($exception instanceof \Illuminate\Validation\ValidationException) {
//                $result = [
//                    'message' => $exception->getMessage()
//                ];
//                return response()->json($result);
//            }
            return $this->jsonFail($exception->getMessage());
//            return response()->json(['message'=>$exception->getMessage()], 403);
        }
        return parent::render($request, $exception);

    }
}
