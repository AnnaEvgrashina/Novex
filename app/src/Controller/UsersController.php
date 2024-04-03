<?php

namespace App\Controller;

use App\Service\ServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\RequestStack;

#[Route('/api/v1')]
class UsersController
{
    public function __construct(private readonly ServiceInterface $userService, private RequestStack $requestStack)
    {
    }

    #[Route('/users', name: 'index', methods: ['GET'])]
    public function index()
    {
        return new Response($this->userService->index());
    }

    #[Route('/users', name: 'store', methods: ['POST'])]
    public function store(): JsonResponse
    {
        $request = $this->requestStack->getCurrentRequest();
        return JsonResponse::fromJsonString($this->userService->store($request->toArray()));
    }

    #[Route('/users/{id}', name: 'show', methods: ['GET'])]
    public function show(): JsonResponse
    {
        $request = $this->requestStack->getCurrentRequest();
        return JsonResponse::fromJsonString($this->userService->show($request->get('id')));
    }

    #[Route('/users/{id}', name: 'update', methods: ['PATCH', 'PUT'])]
    public function update(): JsonResponse
    {
        $request = $this->requestStack->getCurrentRequest();
        return JsonResponse::fromJsonString($this->userService->update($request->get('id'), $request->toArray()));
    }

    #[Route('/users/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(): JsonResponse
    {
        $request = $this->requestStack->getCurrentRequest();
        return JsonResponse::fromJsonString($this->userService->delete($request->get('id')));
    }
}
