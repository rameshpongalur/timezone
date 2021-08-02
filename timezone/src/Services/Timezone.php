<?php

namespace Drupal\timezone\Services;

use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class Timezone.
 *
 * @package Drupal\timezone\Services.
 */
class Timezone {

  /**
   * Configuration Factory.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  protected $config;

  /**
   * Construct new config object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config service.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->config = $config_factory->get('timezone.settings');
  }

  /**
   * Returns the timezone values.
   *
   * @return array
   *   Return markup array.
   */
  public function timezone() {
    $dateTime = new DrupalDateTime();
    // Getting the timezone value.
    $timezone = $this->config->get('timezone');
    $dateTime->setTimezone(new \DateTimeZone($timezone));
    $build = [
      '#markup' => $dateTime->format("dS M Y - h:i A"),
    ];
    return $build;

  }

}
