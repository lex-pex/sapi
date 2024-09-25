<?php

namespace App\Controller;

use App\Entity\Role;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RoleController extends AbstractController
{
    #[Route('/api/roles/{id}/activate', name: 'activate_role', methods: ['PUT'])]
    public function activateRole(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        // Fetch the role by ID
        $role = $entityManager->getRepository(Role::class)->find($id);

        if (!$role) {
            return new JsonResponse(['error' => 'Role not found'], Response::HTTP_NOT_FOUND);
        }

        // Set role as active
        $role->setIsActive(true);
        $entityManager->flush();

        return new JsonResponse(['success' => 'Role activated successfully']);
    }

    #[Route('/api/roles/{id}/deactivate', name: 'deactivate_role', methods: ['PUT'])]
    public function deactivateRole(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        // Fetch the role by ID
        $role = $entityManager->getRepository(Role::class)->find($id);

        if (!$role) {
            return new JsonResponse(['error' => 'Role not found'], Response::HTTP_NOT_FOUND);
        }

        // Set role as inactive
        $role->setIsActive(false);
        $entityManager->flush();

        return new JsonResponse(['success' => 'Role deactivated successfully']);
    }
}
