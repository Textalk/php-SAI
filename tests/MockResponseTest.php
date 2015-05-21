<?php

class MockResponseTest extends PHPUnit_Framework_TestCase {

  private $response_mock;

  public function setUp() {
    $this->response_mock = new SAI\Mock\Response;
  }

  public function testSetHeader() {
    $this->response_mock->setHeader('nAmE', 'value');
    $this->assertArrayHasKey('name', $this->response_mock->headers);
    $this->assertEquals('value',  $this->response_mock->headers['name']);
  }

  public function testResponseCode() {
    $this->assertEquals(200, $this->response_mock->response_code);

    $this->response_mock->setResponseCode('HTTP/1.1 303 See Other');
    $this->assertEquals(
      'HTTP/1.1 303 See Other',
      $this->response_mock->response_code
    );
  }

  public function testSetCookie() {
    $this->response_mock->setCookie('name', 'value');
    $this->assertArrayHasKey('name', $this->response_mock->cookies);
    $this->assertEquals('value', $this->response_mock->cookies['name']);
  }

  public function testDeleteCookie() {
    $this->response_mock->setCookie('name', 'value');
    $this->response_mock->deleteCookie('name');

    $this->assertArrayNotHasKey('name', $this->response_mock->cookies);
    $this->assertContains('name', $this->response_mock->cookies_deleted);
  }

  public function testOutput() {
    $this->response_mock->output('Test output');
    $this->assertEquals('Test output', $this->response_mock->output);

    $this->response_mock->output(' is continued.');
    $this->assertEquals(
      'Test output is continued.',
      $this->response_mock->output
    );
  }
}
