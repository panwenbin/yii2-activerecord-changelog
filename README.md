### migration
```bash
php yii migrate --migrationPath=@panwenbin/yii2/activerecord/changelog/migrations
```

### Usage

#### Config on ActiveRecord Model
```php
    public function behaviors()
    {
        return [
            [
                'class' => ActiveRecordChangeLogBehavior::className(),
                'ignoreAttributes' => ['updated_at'],
            ],
        ];
    }
```

#### Module for view changelogs, access at route /ar/log as the following config.
```php
    'modules' => [
        'ar' => [
            'class' => 'panwenbin\yii2\activerecord\changelog\Module',
        ],
    ]
```