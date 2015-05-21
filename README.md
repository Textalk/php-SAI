php-SAI
=======

Stand-Alone Interfaces and example implementations for PHP. Ideal for stubbing or mocking
individual PHP functionality without depending on any lib or framework.

So far, includes interfaces to stub:
* cURL extension
* Request
* Response
* System


Usage
-----

1. Add it as a dependency in require in composer.json: `"textalk/php-sai": "1.0"`
2. Let your applications bootstrap instantiate a system-implementation:
   `$curl = new SAI\System\Curl;`
3. Require a SAI instance in classes needing to call curl, system methods, get info from the
   request or affect the response: `public function myFooBar(SAI\Curl $curl) {…`
4. Use the SAI instance for the calls: `$ch = $curl->init('http://example.com/');`;
5. Use the mock-classes in test: `$curl = new SAI\Mock\Curl;`


Developer install
-----------------

```bash
# Will get composer, install dependencies and run tests
make test
```

Changelog
---------

1.1.0

* Added SAI\Response::setResponseCode.
* Added unit tests for SAI\Mock\Response.

1.0.0 - **BREAKING CHANGE**

* Namespaced to SAI:
  * `SAI_CurlInterface` -> `SAI\Curl`
  * `SAI_CurlStub`      -> `SAI\Mock\Curl`
  * `SAI_Curl`          -> `SAI\System\Curl`
* Licence and copyright clarified.
* Added interface, mock and implementation for Request, Response and System.

0.1.3

* Added composer and packagist.


Licence
-------

PHP-SAI is free software under the ISC License.

Copyright (c) 2012, Martin Büttner
Copyright (c) 2015, Textalk AB <fredrik.liljegren@textalk.se>

Permission to use, copy, modify, and/or distribute this software for any purpose with or without
fee is hereby granted, provided that the above copyright notice and this permission notice appear
in all copies.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH REGARD TO THIS
SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE
AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT,
NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF
THIS SOFTWARE.
