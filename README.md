# Facade

```
composer require limingxinleo/hyperf-facade
```

## 使用

```php
<?php

use HFacade\Config;

Config::get('xxx');
```

当配置 `BootListener` 后，可以不带命名空间使用

```php
<?php
use HFacade\Listener\BootListener;

return [
    BootListener::class
];
```

```php
<?php

Config::get('app');
```
