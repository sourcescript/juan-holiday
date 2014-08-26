Juan Holiday API
======

## Developing / Testing ##

### To run locally: ###

```javascript
npm install -g bower gulp karma karma-jasmine karma-chrome-launcher browserify browserify vinyl-source-stream
npm install
bower install

php artisan migrate
php artisan db:seed
````

### To run all gulp tasks / watcher: ###

```javascript
gulp
```

### To compile all libraries (gulp): ###

```javascript
gulp concat-libs
```

### To bnndle all scripts (gulp): ###

```javascript
gulp bundle-app
```

### To run the unit-tests: ###

```javascript
karma start
```

All script unit-tests are in ```/public/app/tests/```