<?php

namespace E7\MetaBundle\Repository;

use E7\MetaBundle\Entity\MetaType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 * @method MetaType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MetaType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MetaType[]    findAll()
 * @method MetaType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetaTypeRepository extends EntityRepository
{
}
