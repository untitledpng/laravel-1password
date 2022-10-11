<?php

namespace Untitledpng\Laravel1Password\Exceptions;

use Illuminate\Http\Client\Response;
use Throwable;

class BaseNetworkException extends BaseException
{
    protected Response $response;

    /**
     * @param  Response $response
     * @param  string $message
     * @param  int $code
     * @param  null|Throwable $previous
     */
    public function __construct(Response $response, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $this->response = $response;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}
