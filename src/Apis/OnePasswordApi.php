<?php

namespace Untitledpng\Laravel1Password\Apis;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Untitledpng\Laravel1Password\Exceptions\InvalidInputException;
use Untitledpng\Laravel1Password\Exceptions\NotFoundRequestException;
use Untitledpng\Laravel1Password\Exceptions\UnauthorizedRequestException;

class OnePasswordApi extends \Illuminate\Support\Facades\Http
{
    /**
     * Initialize the request with pre-set request settings.
     *
     * @return PendingRequest
     */
    public static function init(): PendingRequest
    {
        $apiBaseUrl = rtrim(config('laravel-1password.credentials.base_url'), '/') . '/';

        return parent::baseUrl(
            $apiBaseUrl
        )->withToken(
            config('laravel-1password.credentials.authentication_token')
        )->withHeaders([
            'Accept' => 'application/json',
        ]);
    }

    /**
     * @param  Response $response
     * @return Response
     * @throws InvalidInputException|UnauthorizedRequestException|NotFoundRequestException
     */
    public static function handleResponse(Response $response): Response
    {
        try {
            $message = $response->json('message');
        } catch (\Exception) {
            //
        }

        if (400 === $response->status()) {
            throw new InvalidInputException($response, $message ?? __('The request body is invalid determined by 1Password!'));
        }

        if (403 === $response->status()) {
            throw new UnauthorizedRequestException($response, $message ?? __('You are not authorized on 1Password!'));
        }

        if (404 === $response->status()) {
            throw new NotFoundRequestException($response, $message ?? __('The requested resource can not be found!'));
        }

        return $response;
    }

    /**
     * @inheritDoc
     * @throws UnauthorizedRequestException|NotFoundRequestException|InvalidInputException
     */
    public static function get(string $url, array|string|null $query = null): Response
    {
        return self::handleResponse(
            self::init()->get($url, $query)
        );
    }

    /**
     * @inheritDoc
     * @throws UnauthorizedRequestException|NotFoundRequestException|InvalidInputException
     */
    public static function post(string $url, array $data = []): Response
    {
        return self::handleResponse(
            self::init()->post($url, $data)
        );
    }

    /**
     * @inheritDoc
     * @throws UnauthorizedRequestException|NotFoundRequestException|InvalidInputException
     */
    public static function delete(string $url, array $data = []): Response
    {
        return self::handleResponse(
            self::init()->delete($url, $data)
        );
    }

    /**
     * @inheritDoc
     * @throws UnauthorizedRequestException|NotFoundRequestException|InvalidInputException
     */
    public static function put(string $url, array $data = []): Response
    {
        return self::handleResponse(
            self::init()->put($url, $data)
        );
    }

    /**
     * @inheritDoc
     * @throws UnauthorizedRequestException|NotFoundRequestException|InvalidInputException
     */
    public static function patch(string $url, array $data = []): Response
    {
        return self::handleResponse(
            self::init()->patch($url, $data)
        );
    }
}
