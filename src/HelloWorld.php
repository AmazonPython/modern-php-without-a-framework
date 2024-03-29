<?php

declare(strict_types=1);

namespace ModernPhpWithoutAFramework;

use Psr\Http\Message\ResponseInterface;

/**
 * @package ModernPhpWithoutAFramework
 */
class HelloWorld
{
    /**
     * @var string
     */
    private $foo;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * HelloWorld constructor.
     *
     * @param string $foo
     * @param ResponseInterface $response
     */
    public function __construct(string $foo, ResponseInterface $response)
    {
        $this->foo = $foo;
        $this->response = $response;
    }

    /**
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()->write(
            "<html><head></head><body>Hello, {$this->foo} world!</body></html>"
        );

        return $response;
    }
}
