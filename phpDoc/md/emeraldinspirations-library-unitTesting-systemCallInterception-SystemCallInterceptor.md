emeraldinspirations\library\unitTesting\systemCallInterception\SystemCallInterceptor
===============

An abstraction layer decoupling classes and system calls

This class is an array of different system calls.

_Durring testing:_ These calls can be substituted with anonymous functions
that allow the test framework to verify that the system call was issued
correctly, and return mock results.

_Durring production:_ Simply pass null for the parameter of the with
function for each respective system call, and the default anonymous function
running the system call will be used.


* Class name: SystemCallInterceptor
* Namespace: emeraldinspirations\library\unitTesting\systemCallInterception
* Parent class: ArrayObject





Properties
----------


### $returnFor__class_exists

    private array $returnFor__class_exists = array()





* Visibility: **private**


### $returnFor__class_loader

    private array $returnFor__class_loader = array()





* Visibility: **private**


Methods
-------


### get__class_exists

    callable emeraldinspirations\library\unitTesting\systemCallInterception\SystemCallInterceptor::get__class_exists()

Create the anonymous function

Since anonymous functions inherit the scope in which they are created,
it is necesary to create the function in this scope.

* Visibility: **private**




### with__class_exists

    \emeraldinspirations\library\unitTesting\systemCallInterception\SystemCallInterceptor emeraldinspirations\library\unitTesting\systemCallInterception\SystemCallInterceptor::with__class_exists(null|array|callable $vParam)

Add support for the \class_exists system call

This function accepts 3 possible values for it's parameter:

1. _null_ - (default / production) The call is routed to the system

2. _array_ - (testing) The parameter in the system call is used to find
the respective key in the passed array and the respective value is
returned

3. _anonymous function_ - (custom) The call is routed to the passed
anonymous function

* Visibility: **public**


#### Arguments
* $vParam **null|array|callable** - &lt;p&gt;What to do when called&lt;/p&gt;



### get__class_loader

    callable emeraldinspirations\library\unitTesting\systemCallInterception\SystemCallInterceptor::get__class_loader()

Create the anonymous function

Since anonymous functions inherit the scope in which they are created,
it is necesary to create the function in this scope.

* Visibility: **private**




### with__class_loader

    \emeraldinspirations\library\unitTesting\systemCallInterception\SystemCallInterceptor emeraldinspirations\library\unitTesting\systemCallInterception\SystemCallInterceptor::with__class_loader(null|array|callable $vParam)

Add support for the new keyword

This function accepts 3 possible values for it's parameter:

1. _null_ - (default / production) A new object is created

2. _array_ - (testing) The parameter is used to find the respective key
in the passed array and the respective value (new object) is returned

3. _anonymous function_ - (custom) The call is routed to the passed
anonymous function

* Visibility: **public**


#### Arguments
* $vParam **null|array|callable** - &lt;p&gt;What to do when called&lt;/p&gt;


