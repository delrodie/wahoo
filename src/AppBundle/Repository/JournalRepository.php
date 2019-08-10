<?php

namespace AppBundle\Repository;

/**
 * JournalRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JournalRepository extends \Doctrine\ORM\EntityRepository
{
    public function findList()
    {
        return $this->createQueryBuilder('j')
                    ->where('j.statut = 1')
                    ->andWhere('j.dateEvent >= :date')
                    ->orderBy('j.dateEvent', 'ASC')
                    ->addOrderBy('j.debut', 'ASC')
                    ->setParameters([
                        'date'=> date('Y-m-d', time()),
                    ])
                    ->getQuery()->getResult()
            ;
    }
}
