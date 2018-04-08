<?php

namespace Drupal\country_music\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class CountrySingerSubscriber implements EventSubscriberInterface {
  public function onKernelRequest(GetResponseEvent $event) {
    drupal_set_message('Welcome to Music City USA');
  }

  public static function getSubscribedEvents() {
    return [
      'kernel.request' => 'onKernelRequest'
    ];
  }
}