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
    public $instance;

    public function init()
    {
        $this->instance = new \datalayerru\skud\Skud();
    }

    public function __set($name, $value)
    {
        if (isset($this->instance->$name)) {
            $this->instance->$name = $value;
        } else {
            parent::__set($name, $value);
        }
    }

    public function __get($name)
    {
        if (isset($this->instance->$name)) {
            return $this->instance->$name;
        } else {
            return parent::__get($name);
        }
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array($this->instance->$name, $arguments);
    }
}