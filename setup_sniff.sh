#! /bin/bash

echo -e "Setting up codesniffer..."

# set variables
PHPCS_BIN=./vendor/bin/phpcs
INSTALLED_PATHS="./vendor/socialengine/sniffer-rules/src/SocialEngine/SnifferRules/Standard"

$PHPCS_BIN --config-set installed_paths $INSTALLED_PATHS
rm -rf .git/hooks
ln -s ../contrib/hooks .git/hooks

echo -e "Setting complete."