<?php

namespace SAI;

/**
 * Encapsulates incoming request.
 *
 * Interface is modelled after Phalcon\Http\RequestInterface, but also gives access to incoming
 * cookies.
 *
 * @todo Add all other relevant methods.
 */
interface Request {

  /**
   * Returns all data sent as parameters in the query string
   *
   * @return array
   **/
  public function getQueryVariables();

  /**
   * Returns a specific parameter from the query string. If no data is provided under the
   * specified name, null should be returned.
   *
   * @param string $name
   * @return mixed
   **/
  public function getQueryVariable($name);

  /**
   * Returns all data sent as parameters in a POST request. If the request is not a POST request,
   * an empty array should be returned.
   *
   * @return array
   **/
  public function getPostVariables();

  /**
   * Returns a specific parameter in a POST request. If the request is not a POST request, null
   * should be returned.
   *
   * @param string $name
   * @return mixed
   **/
  public function getPostVariable($name);

  /// Get all request headers as associative array.  Matches PHP's getallheaders().
  public function getHeaders();

  /**
   * Get all request headers as associative array.  Matches PHP's getallheaders().
   *
   * @param  string       $name  Header name, case insensitive
   *
   * @return string|null  Header value or null
   */
  public function getHeader($name);

  /**
   * Get the remote address, where the connection to our webserver was made from.
   *
   * This might be a proxy address rather than actual client address.
   *
   * Matches $_SERVER['REMOTE_ADDR'].
   */
  public function getRemoteAddress();

  /**
   * Get the cookies from the request headers.
   *
   * Matches PHP's $_COOKIE.
   */
  public function getCookies();

  /**
   * Get the value of a cookie.
   *
   * @param  string  $name
   * @return mixed   String on success, null on failure.
   */
  public function getCookie($name);
}
