<?php

namespace Drupal\country_music\Controller;

class SongController {
  public function writeSong($noun) {
    $title = sprintf('I rode my %s, through some mud.', $noun);

    return [
      '#type' => 'markup',
      '#markup' => $title,
    ];
  }
}
