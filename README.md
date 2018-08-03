# davework
A Framework scaffolder.

Currently supports Slim Framework only.

## Installation
```bash
composer require --dev dbould/davework
cp vendor/dbould/davework.json.example myProjectRoot/davework.json
```
I'm currently still working on fixing the Phar archive, but I'll add a link and instructions when that's finished.

## Configuration
### topLevelNamespace
eg:
```json
{
    "topLevelNamespace": "Dbould\\Davework"
}
```

### rootDirectory
Top level code directory
eg:
```json
{
    "rootDirectory": "src/"
}
```

### testNamespace
eg:
```json
{
    "testNamespace": "Test"
}
```

### testsDirectory
eg:
```json
{
    "testsDirectory": "test/"
}
```

### factoriesLiveWithClasses
Optional. If set to true, factory files will be created in the same directory as the class files they're associated 
with. If set to false, factories go into a separate Factory/ directory.
eg: 
```json
{
    "factoriesLiveWithClasses": false
}
```

## Commands
Create new file with associated files
```bash
vendor/bin/davework slim:create-file fileName type [moduleName]
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
