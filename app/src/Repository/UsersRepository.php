<?php

namespace App\Repository;

use App\Entity\Users;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @extends ServiceEntityRepository<Users>
 *
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private EntityManagerInterface $em, private readonly ValidatorInterface $validator)
    {
        parent::__construct($registry, Users::class);
    }

    public function update(Users $user): Users|string
    {
        $errors = $this->validator->validate($user);

        if (count($errors) > 0) {
            return (string) $errors;
        }

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

    public function store($value)
    {
        $user = (new Users())
            ->setName($value['name'])
            ->setEmail($value['email'])
            ->setAge($value['age'])
            ->setBirthday(DateTime::createFromFormat('Y-m-d', $value['birthday']))
            ->setSex($value['sex'])
            ->setPhone($value['phone']);

        $errors = $this->validator->validate($user);
        if (count($errors) > 0) {
            return (string) $errors;
        }

        $this->em->persist($user);
        $this->em->flush();

    }

    public function delete(Users $user): void
    {
        $this->em->remove($user);
        $this->em->flush();
    }
}
