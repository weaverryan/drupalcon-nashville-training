<?php

namespace Drupal\country_music\Controller;

use Drupal\Core\Controller\ControllerBase;

class SongController extends ControllerBase {
  public function writeSong($noun) {
    if ($noun === null) {
      $noun = $this->config('country_music.default')
        ->get('noun');
    }

    $title = sprintf('I rode my %s, through some mud.', $noun);

    return [
      '#type' => 'markup',
      '#markup' => $title,
    ];
  }
}
