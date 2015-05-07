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

1. Typehint the interface: `public function myFooBar(SAI\Curl $curl) {…`
2. Let your applications bootstrap instantiate a system-implementation:
   `$curl = new SAI\System\Curl;`
3. Use the mock-classes in test: `$curl = new SAI\Mock\Curl;`


Developer install
-----------------

```bash
# Will get composer, install dependencies and run tests
make test
```
