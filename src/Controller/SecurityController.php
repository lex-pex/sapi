<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Exception\AuthenticationException;


class SecurityController extends AbstractController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login(): JsonResponse
    {
        // This code will never be executed, as Symfony handles authentication automatically
        throw new AuthenticationException('Login failed');
    }

    #[Route('/api/logout', name: 'api_logout', methods: ['GET'])]
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }

    #[Route('/security_reserv', name: 'app_security_reserv')]
    public function index(): Response
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
}
