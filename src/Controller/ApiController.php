<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class ApiController extends AbstractController
{
/**
 * Cette méthode fait appel à la route https://api.github.com/repos/symfony/symfony-docs
 * récupère les données et les transmets telles quelles.
 *
 * Pour plus d'information sur le client http:
 * https://symfony.com/doc/current/http_client.html
 *
 * @param HttpClientInterface $httpClient
 * @return JsonResponse
 * 
 */
#[Route('/', name: 'handle_api', methods: 'GET')]
        public function getApiData(HttpClientInterface $httpClient): JsonResponse
{
    $response = $httpClient->request(
        'GET',
        'http://127.0.0.1:8000/api/ennemis'
    );
    return new JsonResponse($response->getContent(), $response->getStatusCode(), [], true);
}
}