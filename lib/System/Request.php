<?php

namespace SAI\System;

/**
 * Implementing Request by direct superglobal and system calls.
 *
 * This implementation helps in refactoring a dirty application step by step, by using superglobal
 * access.
 */
class Request implements \SAI\Request {

  public function getQueryVariables() {
    return $_GET;
  }

  public function getQueryVariable($name) {
    $query_vars = $this->getQueryVariables();
    return isset($query_vars[$name]) ? $query_vars[$name] : null;
  }

  public function getPostVariables() {
    return $_POST;
  }

  public function getPostVariable($name) {
    $post_vars = $this->getPostVariables();
    return isset($post_vars[$name]) ? $post_vars[$name] : null;
  }

  public function getHeaders() {
    $headers = getallheaders();
    return array_change_key_case($headers); // Work with lower case.
  }

  public function getHeader($name) {
    $headers = $this->getHeaders(); // Get the lower case keyed array.
    $name = strtolower($name);
    return isset($headers[$name]) ? $headers[$name] : null;
  }

  public function getRemoteAddress() {
    return empty($_SERVER['REMOTE_ADDR']) ? null : $_SERVER['REMOTE_ADDR'];
  }

  /**
   * Return an array containing cookies.
   *
   * @return array
   */
  public function getCookies() {
    return $_COOKIE;
  }

  /**
   * Return the value of a cookie.
   *
   * @param  string  $name
   * @return mixed   String on success, null on failure
   */
  public function getCookie($name) {
    return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
  }
}
