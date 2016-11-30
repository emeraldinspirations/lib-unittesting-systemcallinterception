# systemCallInterception
> An abstraction layer decoupling classes and system calls

When doing unit tests, it can be difficult to isolate a class when it is
dependent on information gained directly from PHP libraries.  This class allows
for the interception of these calls, re-directed to the testing framework.

## Installing / Getting started

This project has no dependencies, so can be cloned directly from the git repo

### Clone with HTTPS

```shell
git clone https://github.com/emeraldinspirations/lib-unittesting-systemcallinterception.git
```

### Clone with SSH

```shell
git clone git@github.com:emeraldinspirations/lib-unittesting-systemcallinterception.git
```

### Require with Composer

Add the following lines to your `composer.json` file

```
    "repositories" : [
        {
            "type" : "vcs",
            "url" : "https://github.com/emeraldinspirations/lib-unittesting-systemcallinterception.git"
        },
    ],
    "require": {
        "emeraldinspirations/lib-unittesting-systemcallinterception":"*"
    },    
```

## Features

Currently, this class can intercept
* class_exists
* new [class]

## Example

Here is an example use-case for this class:
* [Class](examples/example.php)
* [Unit Test](examples/exampleTest.php)

## Documentation
Further documentation is available thanks to [phpDocumentor2](https://www.phpdoc.org/) and [PHPDocumentor Markdown generator](https://github.com/evert/phpdoc-md):
* [ApiIndex](phpDoc/md/ApiIndex.md)
* [SystemCallInterceptor](phpDoc/md/emeraldinspirations-library-unitTesting-systemCallInterception-SystemCallInterceptor.md)

## Contributing

I hope to expand this class to include other system calls.  If you'd like to
contribute, please fork the repository and use a feature branch.  I am new to
gitHub and am eager to receive a Pull request to learn how it is done.

I am also open to feedback about how well I am being compliant with standards
and "best practices."  I have written software solo for years, and am trying to
learn how to work better with others.

## Licensing

The code in this project is licensed under [MIT license](LICENSE).
