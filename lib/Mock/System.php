<?php

namespace SAI\Mock;

class System implements \SAI\System {
  public $exit_calls = array();

  public function call_exit($status = null) {
    $this->exit_calls[] = $status;
  }
}
