<?php

namespace Inertia\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Renders the error page name.
     *
     * @var string
     */
    protected $errorPage = 'Error';

    /**
     * Returns the flash error message key name.
     *
     * @var string
     */
    protected $errorMessageKey = 'error_message';

    /**
     * Return a list of error messages.
     *
     * @param  \Throwable  $e
     * @return array<int, string>
     */
    public function messages(Throwable $e)
    {
        return [
            401 => 'Unauthorized',
            403 => $e->getMessage() ?: 'Forbidden',
            404 => 'Not Found',
            419 => 'The page expired, please try again.',
            429 => $e->getMessage() ?: 'Too Many Requests',
            500 => 'Server Error',
            503 => $e->getMessage() ?: 'Service Unavailable',
        ];
    }

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
        $messages = $this->messages($e);
        $message = __($messages[$code] ?? null);

        if (in_array($code, [419, 429])) {
            return back()->with($this->errorMessageKey, $message);
        }

        if (! config('app.debug') && array_key_exists($code, $messages)) {
            $response = Inertia::render($this->errorPage);
            $response = $this->transformInertiaErrorResponse($response, compact('message'));

            return $response
                ->with('code', $code)
                ->with('message', $message)
                ->toResponse($request)
                ->setStatusCode($code);
        }

        return $response;
    }

    /**
     * Transform the inertia error response.
     *
     * @param  \Inertia\Response  $response
     * @param  array  $params
     * @return \Inertia\Response
     */
    protected function transformInertiaErrorResponse(Response $response, array $params = []): Response
    {
        if (Response::hasMacro('title')) {
            $response->title($params['message']);
        }

        return $response;
    }
}
