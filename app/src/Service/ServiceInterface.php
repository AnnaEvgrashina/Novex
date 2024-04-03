<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

interface ServiceInterface
{
    public function index();
    public function store($request);
    public function show(int $id);
    public function update(int $id, $request);
    public function delete(int $id);
}
