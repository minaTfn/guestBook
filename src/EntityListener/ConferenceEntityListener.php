<?php

namespace App\EntityListener;

use App\Entity\Conference;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;


class ConferenceEntityListener {
    private $sluger;

    public function __construct(SluggerInterface $slugger) {
        $this->sluger = $slugger;
    }

    public function prePersist(Conference $conference, LifecycleEventArgs $event) {
        $conference->computeSlug($this->sluger);
    }

    public function preUpdate(Conference $conference, LifecycleEventArgs $event) {
        $conference->computeSlug($this->sluger);
    }
}