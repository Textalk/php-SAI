<?php

namespace SAI;

interface System {
  /// Call exit.  Prefixed since "exit" a reserved word.
  public function call_exit($status = null);
}
