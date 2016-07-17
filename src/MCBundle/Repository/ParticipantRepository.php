<?php

namespace MCBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ParticipantRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ParticipantRepository extends EntityRepository
{
    /**
     * @param $user
     * @param null $limit
     * @return mixed
     */
    public function findParticipant($user, $limit = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("
                    SELECT p
                    FROM MCBundle:Participant p
                    JOIN p.seance s 
                    JOIN s.creator c
                    WHERE s.date > :today AND c.id = :id
                    ORDER BY s.date ASC")
            ->setParameter("today", new \DateTime())
            ->setParameter("id", $user)
            ->setMaxResults($limit);

        return $query->getResult();

    }
    
    
    
    
    
    /**
     * @param $user
     * @param null $limit
     * @return mixed
     */
    public function findParticipation($user, $limit = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("
                    SELECT p
                    FROM MCBundle:Participant p
                    JOIN p.seance s 
                    JOIN p.user u
                    WHERE s.date > :today AND u.id = :id
                    ORDER BY s.date ASC")
            ->setParameter("today", new \DateTime())
            ->setParameter("id", $user)
            ->setMaxResults($limit);

        return $query->getResult();

    }
}
