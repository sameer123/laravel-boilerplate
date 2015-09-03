## Laravel PHP Framework yet another Boilerplate

There are lots of Boilerplates available for laravel aready, but this one aims to be a Moduled and themeable base for most common applications now a days

##Features:

1. Base Laravel 5.1 almost untouched apart from one basic package, (Caffinated Modules by [Caffinated Ninja](https://github.com/caffeinated/modules) ), support added which in turn will allow to add further modular elements.

2. Package to update Module specific composer dependency so you can specify your modules's dependecies in its own composer files. Simply update a composer.json file at the root of your module. For achieving this Caffinated Modules uses [Wikimedia's Composer Merge Plugin](https://github.com/wikimedia/composer-merge-plugin)

##Contribution:

To contribute to the project, run the below commands once from the root of your project folder. This will ensure that the code is checked against the coding guidelines before each commit.

```bash
vendor/bin/phpcs --config-set installed_paths /home/mohin/laravel-boilerplate/vendor/socialengine/sniffer-rules/src/SocialEngine/SnifferRules/Standard

rm -rf .git/hooks
ln -s ../contrib/hooks .git/hooks
```

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
