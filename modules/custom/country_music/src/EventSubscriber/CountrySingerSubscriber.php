<?php

namespace Drupal\country_music\EventSubscriber;

use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class CountrySingerSubscriber implements EventSubscriberInterface {

  private $messenger;

  private $startTime;

  public function __construct(MessengerInterface $messenger) {
    $this->messenger = $messenger;
  }

  public function onKernelRequest(GetResponseEvent $event) {
    $this->startTime = microtime(true);
    $this->messenger->addStatus('Welcome to Music City USA');
  }

  public function onKernelResponse(FilterResponseEvent $event) {
    $duration = microtime(true) - $this->startTime;

    $event->getResponse()
      ->headers
      ->set('X-Song-Length', $duration * 1000);
  }

  public static function getSubscribedEvents() {
    return [
      'kernel.request' => 'onKernelRequest',
      'kernel.response' => 'onKernelResponse',
    ];
  }
}