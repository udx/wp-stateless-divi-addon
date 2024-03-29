<?php

namespace wpCloud\StatelessMedia;

class Compatibility {
}

class WPStatelessStub {

  private static $instance = null;

  public static function instance() {
    return static::$instance ? static::$instance : static::$instance = new static;
  }

  public $options = [];

  public function set($key, $value): void {
    $this->options[$key] = strval($value);
  }

  public function get($key): ?string {
    return $this->options[$key];
  }

  public function get_gs_host(): string {
    return 'https://google.com';
  }
}

class Utility {
  private static $callStackMatches = true;

  public static function isCallStackMatches (): bool {
    return self::$callStackMatches;
  }

  public static function setCallStackMatches (bool $value) {
    self::$callStackMatches = $value;
  }

  public static function randomize_filename (): string {
    return '';
  }
}
