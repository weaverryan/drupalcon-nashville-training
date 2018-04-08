<?php

namespace Drupal\country_music\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\country_music\Service\SongGenerator;

class SongController extends ControllerBase {
  public function writeSong($noun) {
    $songGenerator = \Drupal::getContainer()
      ->get('country_music.song_generator');
    $title = $songGenerator->generateSong($noun);

    return [
      '#type' => 'markup',
      '#markup' => $title,
    ];
  }
}
