<?php

namespace App\Repository;

use App\Entity\Note;
use App\Enum\Priority;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Note>
 */
class NoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Note::class);
    }

    /**
     * @return Note[]
     */
    public function findByPriority(Priority $priority): array
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.priority = :priority')
            ->setParameter('priority', $priority)
            ->orderBy('n.id', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
