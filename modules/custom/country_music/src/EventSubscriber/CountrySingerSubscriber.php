<?php

namespace Drupal\country_music\EventSubscriber;

use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class CountrySingerSubscriber implements EventSubscriberInterface {

  private $messenger;

  public function __construct(MessengerInterface $messenger) {
    $this->messenger = $messenger;
  }

  public function onKernelRequest(GetResponseEvent $event) {
    $this->messenger->addStatus('Welcome to Music City USA');
  }

  public static function getSubscribedEvents() {
    return [
      'kernel.request' => 'onKernelRequest'
    ];
  }
}