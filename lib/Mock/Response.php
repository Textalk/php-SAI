<?php

namespace SAI\Mock;

class Response implements \SAI\Response {
  public $headers = array(), $cookies = array(), $cookies_deleted = array();
  public $output = '', $response_code = 200;

  public function setHeader($name, $value, $replace = true) {
    // Imitating the format you get from http_parse_headers
    $key = strtolower($name);
    if ($replace === false && isset($this->headers[$key])) {
      if (!is_array($this->headers[$key])) {
        $this->headers[$key] = array($this->headers[$key]);
      }
      $this->headers[$key][] = $value;
    }
    else $this->headers[$key] = $value;
  }

  public function setResponseCode($code) {
    $this->response_code = $code;
  }

  public function setCookie(
    $name, $value, $expire = 0, $path = '/', $domain = null, $secure = false, $httponly = false
  ) {
    $this->cookies[$name] = $value; /// @todo Capture time, path etc.
  }

  public function deleteCookie(
    $name, $path = null, $domain = null, $secure = false, $httponly = false
  ) {
    if (isset($this->cookies[$name])) {
      unset($this->cookies[$name]);
    }
    if (!in_array($name, $this->cookies_deleted)) {
      $this->cookies_deleted[] = $name;
    }
  }

  public function output($string) {
    $this->output .= $string;
  }
}
