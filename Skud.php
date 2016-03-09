<?php

namespace professionalweb\rusguard;

use yii\base\Component;

class Skud extends Component
{
    /**
     * Skud instance
     *
     * @var professionalweb\skud\Skud
     */
    private $instance;

    public function getInstance()
    {
        if ($this->instance === null) {
            $this->instance = new \professionalweb\skud\Skud();
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
        if (method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        } else {
            $instance = $this->getInstance();
            return call_user_func_array([$instance, $name], $arguments);
        }
    }
}