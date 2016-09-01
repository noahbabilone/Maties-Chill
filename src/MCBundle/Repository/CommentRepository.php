<?php

namespace MCBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentRepository extends EntityRepository
{
    
     public function findCommentSeance($seance, $limit = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("
                    SELECT c
                    FROM MCBundle:Comment c
                    JOIN c.seance s 
                    WHERE s.id = :id 
                    ORDER BY c.date ASC")
            ->setParameter("id", $seance)
            ->setMaxResults($limit);

        return $query->getResult();

    }
}
