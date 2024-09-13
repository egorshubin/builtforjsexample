# Example with PrestaShop Integration Framework Components

## Installation

First use the following command to install all the packages from the composer.json file

```shell script
composer install --no-dev -o
```

Make sure you have node and npm installed
```shell script
node -v
npm -v
```
Go to dev folder and install dependencies
```shell script
cd /var/www/html/modules/builtforjsexample/dev/dependency_builder
npm install
```

In the vue.config.js file, ensure you replace the module name 'builtforjsexample' in the publicPath with your actual module name.
```shell script
publicPath: '../modules/builtforjsexample/views/js/dependency_builder/'
```

To run the project in development mode with file watching (live reloading upon saving files), use the following command:
```shell script
npm run dev
```

When you're ready to build the project for production (optimized files for performance), you can run:
```shell script
npm run build
```

## Changelog

### v2.0.0

- Remove old dependencies in composer.json
- Update [prestashop/module-lib-mbo-installer](https://github.com/PrestaShopCorp/module-lib-mbo-installer) to version 1.0
- Add new dependency management system

### v1.0.0

- Initial version

## Known issues

In some cases, merchants may encounter compatibility issues between the versions of libraries installed by different modules on PrestaShop. To solve this problem, you can use [php-scoper](https://github.com/humbug/php-scoper) to obtain a unique prefix for the namespaces in the vendor folder of your module.