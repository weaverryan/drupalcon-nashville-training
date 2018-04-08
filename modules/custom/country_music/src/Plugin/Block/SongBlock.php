<?php

namespace Drupal\country_music\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'SongBlock' block.
 *
 * @Block(
 *  id = "song_block",
 *  admin_label = @Translation("Song block"),
 * )
 */
class SongBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $songGenerator = \Drupal::getContainer()
      ->get('country_music.song_generator');

    $build = [];
    $build['song_block']['#markup'] = $songGenerator->generateSong('dog');

    return $build;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new self($configuration, $plugin_id, $plugin_definition);
  }
}
