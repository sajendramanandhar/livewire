#!/bin/bash
composer outdated
composer update
npm outdated
npm update
npm run build
./vendor/bin/pint
php artisan test
git add composer.json
git add composer.lock
git add package.json
git add package-lock.json
git add public/
