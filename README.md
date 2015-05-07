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

1. Let your applications bootstrap instantiate a system-implementation:
   `$curl = new SAI\System\Curl;`
2. Require a SAI instance in classes needing to call curl, system methods, get info from the
   request or affect the response: `public function myFooBar(SAI\Curl $curl) {…`
3. Use the SAI instance for the calls: `$ch = $curl->init('http://example.com/');`;
4. Use the mock-classes in test: `$curl = new SAI\Mock\Curl;`


Developer install
-----------------

```bash
# Will get composer, install dependencies and run tests
make test
```
