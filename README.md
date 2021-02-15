# Facade

## 安装

```
composer require limingxinleo/hyperf-facade
```

## 使用

```php
<?php

use HFacade\Config;

Config::get('xxx');
```

当配置 `BootListener` 到 `listeners.php` 后

```php
<?php
use HFacade\Listener\BootListener;

return [
    BootListener::class
];
```

便可以不带命名空间使用门面

```php
<?php

Config::get('app');
```
