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

### Fork by egorshubin
- Create another JS interface in dependency_builder.tpl. Its previous version with external script had bugs and couldn't be fixed
- This fork always requires ps_eventbus module

## Known issues

In some cases, merchants may encounter compatibility issues between the versions of libraries installed by different modules on PrestaShop. To solve this problem, you can use [php-scoper](https://github.com/humbug/php-scoper) to obtain a unique prefix for the namespaces in the vendor folder of your module.