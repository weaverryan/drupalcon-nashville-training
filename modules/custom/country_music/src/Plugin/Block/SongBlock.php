<?php

namespace Drupal\country_music\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'SongBlock' block.
 *
 * @Block(
 *  id = "song_block",
 *  admin_label = @Translation("Song block"),
 * )
 */
class SongBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['song_block']['#markup'] = 'Implement SongBlock.';

    return $build;
  }

}
