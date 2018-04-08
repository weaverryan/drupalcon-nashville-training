<?php

namespace Drupal\country_music\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\country_music\Service\SongGenerator;
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
  private $songGenerator;

  public function __construct(SongGenerator $songGenerator, array $configuration, $plugin_id, $plugin_definition) {
    $this->songGenerator = $songGenerator;
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }


  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['song_block']['#markup'] = $this->songGenerator->generateSong('dog');

    return $build;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new self($container->get('country_music.song_generator'), $configuration, $plugin_id, $plugin_definition);
  }
}
