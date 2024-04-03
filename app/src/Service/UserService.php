<?php

namespace App\Service;

use App\Repository\UsersRepository;
use DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserService implements ServiceInterface
{
    public function __construct(private readonly UsersRepository $usersRepository)
    {
    }

    public function index()
    {
        $users = $this->usersRepository->findAll();

        $data = [];

        foreach ($users as $user) {
            $data[] = [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'age' => $user->getAge(),
                'email' => $user->getEmail(),
                'phone' => $user->getPhone(),
                'sex' => $user->getSex(),
                'birthday' => $user->getBirthday(),
            ];
        }

        return new JsonResponse($data);
    }

    public function store($request)
    {
        if (empty($request['name']) || empty($request['email']) || empty($request['phone']) || empty($request['age']) || empty($request['sex']) || empty($request['birthday'])) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $error = $this->usersRepository->store($request);

        return new JsonResponse(['status' => $error ?? 'Customer created!']);
    }

    public function show(int $id)
    {
        $user = $this->usersRepository->findOneBy(['id' => $id]);

        if (empty($user)) {
            return new JsonResponse(['status' => 'User not found']);
        }

        $data = [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'age' => $user->getAge(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone(),
            'sex' => $user->getSex(),
            'birthday' => $user->getBirthday(),
        ];

        return new JsonResponse($data);
    }

    public function update(int $id, $data)
    {
        $user = $this->usersRepository->findOneBy(['id' => $id]);

        if (empty($user)) {
            return new JsonResponse(['status' => 'User not found']);
        }

        empty($data['name']) ? true : $user->setName($data['name']);
        empty($data['email']) ? true : $user->setEmail($data['email']);
        empty($data['phone']) ? true : $user->setPhone($data['phone']);
        empty($data['age']) ? true : $user->setAge($data['age']);
        empty($data['sex']) ? true : $user->setSex($data['sex']);
        empty($data['birthday']) ? true : $user->setBirthday(DateTime::createFromFormat('Y-m-d', $data['birthday']));

        $updatedUser = $this->usersRepository->update($user);

        if (gettype($updatedUser) === 'string') {
            return new JsonResponse($updatedUser);
        }

        return new JsonResponse($updatedUser->toArray());
    }

    public function delete(int $id)
    {
        $user = $this->usersRepository->findOneBy(['id' => $id]);

        if (!empty($user)) {
            $this->usersRepository->delete($user);

            return new JsonResponse(['status' => 'User deleted']);
        }

        return new JsonResponse(['status' => 'User deleted']);
    }
}