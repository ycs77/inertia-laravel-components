<?php

namespace Inertia\Ui\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Inertia\Inertia;
use Inertia\Response;
use Inertia\SSRHead\InertiaSSRHeadServiceProvider;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The error page name.
     *
     * @var string
     */
    protected $error_page = 'Error';

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
        $response = parent::render($request, $exception);
        $code = $response->getStatusCode();
        $errorMessages = [
            401 => 'Unauthorized',
            403 => $exception->getMessage() ?: 'Forbidden',
            404 => 'Not Found',
            419 => 'The page expired, please try again.',
            429 => $exception->getMessage() ?: 'Too Many Requests',
            500 => 'Server Error',
            503 => $exception->getMessage() ?: 'Service Unavailable',
        ];
        $message = __($errorMessages[$code]);

        if (in_array($code, [419, 429])) {
            return back()->with('error_message', $message);
        }

        if (in_array($code, array_keys($errorMessages)) &&
            ! config('app.debug')
        ) {
            $response = Inertia::render($this->error_page);
            $response = $this->transformInertiaErrorResponse($response, compact('message'));

            return $response
                ->with('code', $code)
                ->with('message', $message)
                ->toResponse($request)
                ->setStatusCode($code);
        }

        return $response;
    }

    protected function transformInertiaErrorResponse(Response $response, array $params = [])
    {
        if (class_exists(InertiaSSRHeadServiceProvider::class)) {
            $response->title($params['message']);
        }

        return $response;
    }
}
