<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/hello", methods={"GET"})
     *
     * @OA\Get(
     *     path="/api/hello",
     *     summary="Returns a welcome message",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string")
     *         )
     *     )
     * )
     */
    public function hello(): JsonResponse
    {
        return new JsonResponse(['message' => 'Hello, API!']);
    }
}
