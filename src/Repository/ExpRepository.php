<?php

namespace App\Repository;

use App\Entity\Exp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Exp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Exp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Exp[]    findAll()
 * @method Exp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exp::class);
    }
    public function test()
    {
        $em = $this->getDoctrine()->getManager();
    }
}
