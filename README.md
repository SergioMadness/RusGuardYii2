# RusGuard-Yii2
[Yii2](http://www.yiiframework.com/) component for communication with [RusGuard](http://www.rgsec.ru/)

## Composer

RusGuard-Yii2 is available through [composer](https://getcomposer.org/)

    composer require professionalweb/rusguard-yii2 "*"
  
Alternatively you can add the following to the `require` section in your `composer.json` manually:

```json
"professionalweb/rusguard-yii2": "*"
```

Run `composer update` afterwards.

### In your PHP project
### Config
```php
return [
    'components' => [
        'skud' => [
            'class' => 'professionalweb\rusguard\Skud',
            'url' => 'http://skud/LNetworkServer/LNetworkService.svc?singleWsdl',
            'login' => 'admin',
            'password' => ''
        ],
    ]
];
```

### Show events
```php
$dataProvider = new \professionalweb\rusguard\DataProvider([
    'component' => Yii::$app->skud,
    'from' => date('c', strtotime($date.' 00:00:00')),
    'to' => date('c', strtotime($date.' 23:59:59')),
    'inout' => $inout
]);
return $this->render('index',
        [
        'dataProvider' => $dataProvider
]);
```

### Add person to SKUD
```php
$personInfo = Yii::$app->skud->addEmployee('75f918bf-24fc-445f-8ff5-8fd11e1ad361', 'John', 'Johnov');
Yii::$app->skud->assignKey($personInfo->ID, '9874566321154');
```

### Set key is lost
```php
Yii::$app->skud->setKeyIsLost('9874566321154', $personInfo->ID);
```

### Get groups
```php
Yii::$app->skud->getGroups();
```

### Get person by key
```php
Yii::$app->skud->getEmployeeIdByKey('9874566321154');
```

### Remove employee
```php
Yii::$app->skud->removeEmployee($personInfo->ID);
```

### Remove employee by key number
```php
Yii::$app->skud->removeEmployeeByCardNumber('9874566321154');
```

### Get variable
```php
Yii::$app->skud->getVariable($name);
```

### Add employee's photo
```php
Yii::$app->skud->addEmployeePhoto($personInfo->ID, null, $base64Data);
```

### Get employee info
    ```php
$skud->getEmployee($$personInfo->ID)
```

### Get events
```php
Yii::$app->skud->getEvents($fromDate = null, $toDate = null, $inoutEventType = null, $page = 1, $pageSize = 20)
```

### Listen for notifications
```php
$result = Yii::$app->skud->getNotification();
```

## The MIT License

The MIT License (MIT)

Copyright (c) 2016 Sergey Zinchenko, [Professional web](http://web-development.pw/)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.