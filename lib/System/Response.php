<?php

namespace SAI\System;

/**
 * Implementing Response interface by direct superglobal and system calls.
 *
 * This implementation helps in refactoring a dirty application step by step, by using superglobal
 * access.
 */
class Response implements \SAI\Response {
  public function setHeader($name, $value) {
    header("$name: $value");
  }

  public function setResponseCode($code) {
    http_response_code($code);
  }

  public function setCookie(
    $name, $value, $expire = 0, $path = null, $domain = null, $secure = false, $httponly = false
  ) {
    setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
  }

  public function deleteCookie($name, $path = null, $domain = null, $secure = false, $httponly = false) {
    setcookie($name, "", time() - 7200, $path, $domain, $secure, $httponly);
  }

  public function output($string) {
    echo $string;
  }
}
