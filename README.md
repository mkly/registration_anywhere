Registration Anywhere
=====================
A concrete5 addon to place a registration form as a block anyone on your site.

Installation
------------
1. Copy the registration_anywhere folder to your sites root packages directory
2. Install via 'Add Functionality'

Designer Note
-------------
If you would like to add this to your theme via the global scrapbook you will have to do it a little differently than the traditional way.

Display the block in your theme as you normally would
```php
$bl = Block::getByName("Global SB Block Name"); if(is_object($bl)) $bl--->display();
```
But then you need to add something else before
```php
Loader::element('header_required');
```
This
```php
$bl = Block::getByName("Glocal SB Block Name");
if(is_object($bl)) $bl->getController()->addRegistrationAnywhereHeaderItems();
```
