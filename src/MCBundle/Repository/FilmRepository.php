<?php

namespace MCBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FilmRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FilmRepository extends EntityRepository
{
    /**
     * @param $genre
     * @return array
     */
    public function getByGenre($genre)
    {
        $query = $this->createQueryBuilder('a');
        $query
            ->innerJoin('a.genre', 'g')
            ->addSelect('g')
            ->where('g.id = :genre')
            ->setParameter('genre', $genre);
        $query->orderBy('a.id', 'DESC');
        return $query
            ->getQuery()
            ->getResult();

    }

    /**
     * @return array
     */
    public function getLastFilm()
    {
        $query = $this->createQueryBuilder('a');
        $query->orderBy('a.id', 'DESC');
        return $query
            ->getQuery()
            ->getResult();

    }

    /**
     * @param null $limit
     * @return array
     */
    public function lastFilm($limit = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("
                    SELECT DISTINCT f  
                    FROM MCBundle:Film f
                    WHERE f.id in ( SELECT flm.id 
                                   FROM MCBundle:Seance s
                                   JOIN s.film flm
                                   WHERE s.date >= :today)
                    GROUP BY f.id
                    ORDER BY f.id DESC")
            ->setParameter("today", new \DateTime())
            ->setMaxResults($limit);

        return $query->getResult();

    }

    /**
     * @param null $limit
     * @return array
     */
    public function newFilm($limit = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("
                    SELECT DISTINCT f  
                    FROM MCBundle:Film f
                    WHERE f.id in ( SELECT flm.id 
                                   FROM MCBundle:Seance s
                                   JOIN s.film flm
                                   WHERE s.date >= :today)
                    GROUP BY f.id
                    ORDER BY f.releaseDate DESC")
            ->setParameter("today", new \DateTime())
            ->setMaxResults($limit);

        return $query->getResult();

    }

    /**
     * @param null $limit
     * @return array
     */
    public function recentFilm($limit = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("
                    SELECT DISTINCT f  
                    FROM MCBundle:Film f
                    WHERE f.id in ( SELECT flm.id 
                                   FROM MCBundle:Seance s
                                   JOIN s.film flm
                                   WHERE s.date >= :today)
                    GROUP BY f.id
                    ORDER BY f.releaseDate DESC AND f.id DESC")
            ->setParameter("today", new \DateTime())
            ->setMaxResults($limit);

        return $query->getResult();

    }

    public function filmSeance($film, $limit = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("
                SELECT s AS seance, (
                      SELECT COUNT (p)
                      FROM MCBundle:Participant p 
                      JOIN p.seance sc 
                      WHERE sc.id = s.id) AS participants 
                FROM MCBundle:Seance s
                JOIN s.film f
                WHERE s.date >= :today AND f.id = :id 
                ORDER BY s.date ASC")
            ->setParameter("today", new \DateTime())
            ->setParameter("id", $film)
            ->setMaxResults($limit);

        return $query->getResult();
    } 
    
    public function filmSeanceParticipant ($film, $limit = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("
                      SELECT p
                      FROM MCBundle:Participant p 
                      JOIN p.seance sc 
                      WHERE sc.id = :id")
            ->setParameter("id", $film)
            ->setMaxResults($limit);

        return $query->getResult();
    } 
    
    public function filmIDSeance($film, $limit = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT s 
                FROM MCBundle:Seance s
                JOIN s.film f
                WHERE f.id = :id 
                ORDER BY s.date ASC")
            ->setParameter("id", $film)
            ->setMaxResults($limit);

        return $query->getResult();
    }


    /**
     * @param null $limit
     * @return array
     */
    public function topFilm($limit = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("
                    SELECT DISTINCT f  
                    FROM MCBundle:Film f
                    WHERE f.id in ( SELECT flm.id 
                                   FROM MCBundle:Seance s
                                   JOIN s.film flm
                                   WHERE s.date >= :today)
                    GROUP BY f.id
                    ORDER BY f.userRating DESC")
            ->setParameter("today", new \DateTime())
            ->setMaxResults($limit);

        return $query->getResult();
    }

    /**
     * @param Film $film
     * @return array
     */
    public function search(Film $film)
    {
        $query = $this->createQueryBuilder('a');
        $query
            ->where('a.title LIKE :title')
            ->setParameter('title', '%' . $film->getTitle() . '%')
            ->orderBy('a.id', 'DESC');

        return $query
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $keyword
     * @return array
     */
    public function searchDB($keyword)
    {
        $query = $this->createQueryBuilder('a');
        $query
            ->where('a.title LIKE :title')
            ->setParameter('title', '%' . $keyword . '%')//  ->orderBy('a.id', 'DESC')
        ;
        return $query
            ->getQuery()
            ->getResult();
    }


}
