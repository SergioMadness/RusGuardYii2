<?php

namespace professionalweb\rusguard;

use Yii;
use yii\data\BaseDataProvider;

class DataProvider extends BaseDataProvider
{
    public $component;
    public $from;
    public $to;
    public $inout;

    protected function prepareKeys($models)
    {
        $result = [];

        foreach ($models as $o) {
            $result[] = $o->Id;
        }

        return $result;
    }

    protected function prepareModels()
    {
        $page = Yii::$app->request->get('page', 0);

        $serviceResult = $this->component->getEvents($this->from, $this->to,
            $this->inout, $page - 1, $this->getPagination()->getPageSize());

        $this->setTotalCount($serviceResult->Count);

        $this->setPagination([
            'totalCount' => $this->getTotalCount(),
            'page' => $page > 0 ? $page - 1 : 0
        ]);

        return isset($serviceResult->Messages) && isset($serviceResult->Messages->LogMessage)
                ? $serviceResult->Messages->LogMessage : [];
    }

    protected function prepareTotalCount()
    {

    }
}