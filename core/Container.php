<?php

namespace core;

class Container
{
  protected $bindings = [];

  public function bind($key, $resolver)  // add to container
  {
    $this->bindings[$key] = $resolver;
  }

  public function resolve($key)  // remove from container
  {
    if (!array_key_exists($key, $this->bindings)) {
      throw new \Exception("No matching binding found for {$key}");
    }
    $resolver = $this->bindings[$key];

    return call_user_func($resolver);
  }
}
