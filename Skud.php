<?php

namespace datalayerru\rusguard;

use yii\base\Component;

class Skud extends Component
{
    /**
     * Skud instance
     *
     * @var datalayerru\skud\Skud
     */
    private $instance;

    public function getInstance()
    {
        if ($this->instance === null) {
            $this->instance = new \datalayerru\skud\Skud();
        }
        return $this->instance;
    }

    public function __set($name, $value)
    {
        $instance = $this->getInstance();
        if (property_exists($instance, $name)) {
            $instance->$name = $value;
        } else {
            parent::__set($name, $value);
        }
    }

    public function __get($name)
    {
        $instance = $this->getInstance();
        if (property_exists($instance, $name) || method_exists($instance, $name)) {
            return $instance->$name;
        } else {
            return parent::__get($name);
        }
    }

    public function __call($name, $arguments)
    {
        $instance = $this->getInstance();
        return call_user_func_array([$instance, $name], $arguments);
    }
}