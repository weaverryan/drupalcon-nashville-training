<?php

namespace Drupal\country_music\Service;

use Drupal\Core\Config\ConfigFactoryInterface;

class SongGenerator {

  private $configFactory;

  public function __construct(ConfigFactoryInterface $configFactory)
  {
    $this->configFactory = $configFactory;
  }

  public function generateSong($noun)
  {
    if ($noun === null) {
      $noun = $this->configFactory->get('country_music.default')
        ->get('noun');
    }

    $verbs = ['drive', 'drink', 'dance'];
    $adjectives = ['Honky Tonk', 'country', 'back road', 'boot scootin'];
    $templates = [
      'I %noun% my %adjective% %noun%',
      '%adjective% %noun%, let\'s %verb%!',
      '%verb%ing my %adjective% %noun%'
    ];

    $title = strtr($templates[array_rand($templates)], [
      '%noun%' => $noun,
      '%adjective%' => $adjectives[array_rand($adjectives)],
      '%verb%' => $verbs[array_rand($verbs)]
    ]);
    $title = ucwords($title);

    return $title;
  }
}