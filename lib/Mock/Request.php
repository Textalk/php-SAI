<?php

namespace SAI\Mock;

class Request implements \SAI\Request {
  public $headers = array(), $cookies = array(), $query = array(), $post = array();
  public $remote_address;

  public function getQueryVariables() {
    return $this->query;
  }

  public function getQueryVariable($name) {
    return isset($this->query[$name]) ? $this->query[$name] : null;
  }

  public function getPostVariables() {
    return $this->post;
  }

  public function getPostVariable($name) {
    return isset($this->post[$name]) ? $this->post[$name] : null;
  }

  /// Get all request headers as associative array.  Matches PHP's getallheaders().
  public function getHeaders() {
    return array_change_key_case($this->headers); // Work with lower case.
  }

  public function getHeader($name) {
    $headers = $this->getHeaders(); // Get the lower case keyed array.
    $name = strtolower($name);
    return isset($headers[$name]) ? $headers[$name] : null;
  }

  public function getRemoteAddress() { return $this->remote_address; }

  public function getCookies() { return $this->cookies; }

  public function getCookie($name) {
    return isset($this->cookies[$name]) ? $this->cookies[$name] : null;
  }
}
