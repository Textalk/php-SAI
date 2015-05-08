<?php

namespace SAI\System;

/**
 * A class to wrap global system calls.
 */
class System implements \SAI\System {
  public function call_exit($status = null) {
    if ($status === null) exit;
    exit($status);
  }
}
