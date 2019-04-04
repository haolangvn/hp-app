# Yii2 Start Project Advanced Template

## INSTALLATION

Create a project:
```
composer create-project --prefer-dist --stability=dev hlv/web-skeleton
```

Init an environment:

```
cd advanced-project
php init
```

Create a database, default configure yii2_advanced_start in `common\config\main-local.php`

```
//...
'components' => [
    'db' => [
        'dsn' => 'mysql:host=localhost;dbname=yii2_advanced_start',
        //...
    ],
    //...
],
//...
```

Apply migration:

```
php yii migrate
```

Initialization RBAC:

```
Execute migrate/sql or php yii migrate --migrationPath=@yii/rbac/migrations
```

```
php yii users/user/create
```