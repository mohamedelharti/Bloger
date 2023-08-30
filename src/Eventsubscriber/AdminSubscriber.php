<?php
namespace App\Eventsubscriber;

use App\Model\TimesTempedInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents():array
    {
        return [
            BeforeEntityPersistedEvent::class => ['setEntityCreatedAt'],
            BeforeEntityUpdatedEvent::class=> ['setEntityUpdatedAt']
        ];
    }

    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event):void
    {
         $entity = $event -> getEntityInstance();

         if (!$entity instanceof TimesTempedInterface){
            return;
         }

         $entity -> setCreatedAt(new \DateTime());
    }

    public function setEntityUpdatedAt(BeforeEntityUpdatedEvent $event):void
    {
         $entity = $event -> getEntityInstance();

         if (!$entity instanceof TimesTempedInterface){
            return;
         }

         $entity -> setUpdateAt(new \DateTime());
    }               
}