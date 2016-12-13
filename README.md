Kina Base Vhost
===============

This repository is example how install Kina Vhost or Plugin by composer.

In composer json you need specify only basic, name is not only composer package name but also
plugin name for Kina.

```json
{
	"name": "Base",
	"description": "Base Kina vhost for first run test"
}
```

All classes have to be in Namespace named in composer.json (property "name"), this namespace start in root repository, after installation
by composer is folder for this namespace created.

```php
<?php
namespace Base;
class Vhost extends \Vhost{
}
```

After first installation of package is "data" folder from root repository copied in to plugin data directory, you can
put here some inicialization data (configuration, ...), after next installation on update package data is not changed.

After all installation or updates is "data/static" from root repository copied in to vhost data directory /static,
it is allow you to update you html, css, js, images.