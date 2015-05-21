<?php

namespace SAI;

/**
 * Encapsulates functions that forms the response.
 *
 * Interface is modelled after Phalcon\Http\ResponseInterface
 *
 * @todo Add all other relevant methods.
 */
interface Response {
  /**
   * Overwrites a header in the response.
   *
   * @param string $name
   * @param string $value
   */
  public function setHeader($name, $value);

  /**
   * Sets HTTP response code.
   * @param int $code The HTTP response code.
   */
  public function setResponseCode($code);

  public function setCookie(
    $name, $value, $expire = 0, $path = '/', $domain = null, $secure = false, $httponly = false
  );

  public function deleteCookie($name, $path = '/', $domain = null, $secure = false, $httponly = false);

  /**
   * Output text in the response.
   */
  public function output($string);
}
