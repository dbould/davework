# davework
An opinionated Framework scaffolder.

Currently supports Slim Framework only.

## Commands
Create new file with associated files
```bash
bin/console slim:create-file -f fileName -t type
```

## Tests
Run all test suites
```bash
vendor/bin/phpunit
```

Run all functional tests
```bash
vendor/bin/phpunit tests/Functional
```

Run all unit tests
```bash
vendor/bin/phpunit tests/Unit
```

## Generate PHAR Archive
Generate through Box [https://github.com/box-project/box2](https://github.com/box-project/box2)
```bash
vendor/bin/box build -v
```
