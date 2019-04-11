<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Strategy\Message;

/**
 * @Route("/messages")
 */
class MessageController
{
    private $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * @Route("/{type}", methods={"POST", "GET"})
     * @param Request $request
     * @param string $type
     * @return Response
     */
    public function index(Request $request, string $type)
    {
        $payload = json_decode($request->getContent(), true);

        $this->message->send($type, $payload);

        return new Response('OK');
    }
}