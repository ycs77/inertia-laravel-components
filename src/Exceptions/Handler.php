<?php

namespace Inertia\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Inertia\Inertia;
use Inertia\Response;
use Inertia\SSRHead\HeadManager;
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
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        $response = parent::render($request, $e);
        $code = $response->getStatusCode();
        $errorMessages = [
            401 => 'Unauthorized',
            403 => $e->getMessage() ?: 'Forbidden',
            404 => 'Not Found',
            419 => 'The page expired, please try again.',
            429 => $e->getMessage() ?: 'Too Many Requests',
            500 => 'Server Error',
            503 => $e->getMessage() ?: 'Service Unavailable',
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
        if (class_exists(HeadManager::class)) {
            $response->title($params['message']);
        }

        return $response;
    }
}
