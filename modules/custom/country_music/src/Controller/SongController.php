<?php

namespace Drupal\country_music\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\country_music\Service\SongGenerator;

class SongController extends ControllerBase {
  public function writeSong($noun) {
    if ($noun === null) {
      $noun = $this->config('country_music.default')
        ->get('noun');
    }

    $songGenerator = new SongGenerator();
    $title = $songGenerator->generateSong($noun);

    return [
      '#type' => 'markup',
      '#markup' => $title,
    ];
  }
}
