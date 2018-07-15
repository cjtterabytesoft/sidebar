Getting Started with cjtterabytesoft/sidebar.
=============================================

#### 1.- Installation:

You can then install this project template using the following command:

##### Linux:

```
    php composer.phar require --prefer-dist cjtterabytesoft/sidebar "@dev"
```

##### Windows:

```
    composer require --prefer-dist cjtterabytesoft/sidebar "@dev"
```

##### Or add to composer.json:

```
    "cjtterabytesoft/sidebar": "@dev"
```

#### 2.- Usage:

Sidebar allows you to create a sidebar type menu.

```php
<?php

use cjtterabytesoft\widgets\Sidebar;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<!- SIDEBAR-MENU -!>

<!- DEFINITION MENU OPTIONS [label - icon - url - linkOptions, options] -!>

<?php

$sidebar_menu[0] = [
                    'label' => Html::tag(
                        'span',
                        Html::encode(
                            Yii::t('adminator', 'Dashboard')
                        ),
                        ['class' => 'title']
                    ),
                    'icon' => Html::tag(
                        'span',
                        Html::tag(
                            'i',
                            '',
                            ['class' => 'c-blue-500 ti-home']
                        ),
                        ['class' => 'icon-holder']
                    ),
                    'url' => \Yii::$app->homeUrl,
                    'linkOptions'=> ['class'=>'sidebar-link'],
                    'options' =>['class' => 'nav-item']
                   ];

echo Sidebar::widget([
    'options'         => ['class' => 'sidebar-menu scrollable pos-r'],
    'labelTemplate'   => '<a href="#">{icon}{label}{right-icon}</a>',
    'linkTemplate'    => '<a href="{url}" {linkOptions}>{icon}{label}{right-icon}</a>',
    'submenuTemplate' => '<ul class=\"dropdown-menu\">{items}</ul>',
    'activateParents' => true,
    'encodeLabels'    => false,
    'items'           => $sidebar_menu,
    'activeCssClass'  => 'active open',
]);

?>
<!- END - SIDEBAR-MENU -!>
```