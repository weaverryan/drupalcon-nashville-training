<?php

namespace Drupal\country_music\Controller;

use Symfony\Component\HttpFoundation\Response;

class SongController {
  public function writeSong($noun) {
    return new Response(sprintf('I rode my %s, through some mud.', $noun));
  }
}
