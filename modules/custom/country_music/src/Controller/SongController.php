<?php

namespace Drupal\country_music\Controller;

use Symfony\Component\HttpFoundation\Response;

class SongController {
  public function writeSong() {
    return new Response('I rode my truck, through some mud.');
  }
}
