<?php

/**
 * A container for SystemCallInterceptor class
 *
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @version   GIT: $Id$ In development.
 * @copyright 2016 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @category  library
 * @package   lib-unittesting-systemcallinterception
 */

namespace emeraldinspirations\library\unitTesting\systemCallInterception;

/**
 * An abstraction layer decoupling classes and system calls
 *
 * This class is an array of different system calls.
 *
 * _Durring testing:_ These calls can be substituted with anonymous functions
 * that allow the test framework to verify that the system call was issued
 * correctly, and return mock results.
 *
 * _Durring production:_ Simply pass null for the parameter of the with
 * function for each respective system call, and the default anonymous function
 * running the system call will be used.
 *
 * @license MIT
 */
class SystemCallInterceptor extends \ArrayObject {

    // {{{

    /**
     * @var array A storage space for return values
     * @see self::with__class_exists
     */
    private $returnFor__class_exists = [];

    /**
     * Create the anonymous function
     *
     * Since anonymous functions inherit the scope in which they are created,
     * it is necesary to create the function in this scope.
     *
     * @see http://php.net/manual/en/functions.anonymous.php PHP Reference
     * @see self::with__class_loader
     * @return callable
     */
    private function get__class_exists() {
        return function($vClassName) {
            return $this->returnFor__class_exists[$vClassName] ?? FALSE;
        };
    }

    /**
     * Add support for the \class_exists system call
     *
     * This function accepts 3 possible values for it's parameter:
     *
     * 1. _null_ - (default / production) The call is routed to the system
     *
     * 2. _array_ - (testing) The parameter in the system call is used to find
     * the respective key in the passed array and the respective value is
     * returned
     *
     * 3. _anonymous function_ - (custom) The call is routed to the passed
     * anonymous function
     *
     * @param null|array|callable $vParam What to do when called
     * @return self
     */
    public function with__class_exists($vParam = null) {
        $pReturn = clone $this;

        if(!isset($vParam)) {
            $pReturn['class_exists'] = function($vClassName) {
                return \class_exists($vClassName);
            };
        } elseif (is_callable($vParam)) {
            $pReturn['class_exists'] = $vParam;
        } elseif (is_array($vParam)) {
            $pReturn->returnFor__class_exists = $vParam;
            $pReturn['class_exists'] = $pReturn->get__class_exists();
        }

        return $pReturn;
    }

    // }}}
    // {{{

    /**
    * @var array A storage space for return values
    * @see self::with__class_exists
    */
    private $returnFor__class_loader = [];

    /**
     * Create the anonymous function
     *
     * Since anonymous functions inherit the scope in which they are created,
     * it is necesary to create the function in this scope.
     *
     * @see http://php.net/manual/en/functions.anonymous.php PHP Reference
     * @see self::with__class_loader
     * @return callable
     */
    private function get__class_loader() {
        return function($vClassName) {
            if(!isset($this->returnFor__class_loader[$vClassName])) {
                trigger_error(
                    "Simulated Fatal error: Class '".$vClassName."' not found,".
                    " add class instance to array paramiter passed in".
                    " SystemCallIntercept->with__class_loader",
                    E_ERROR);
            }
            return $this->returnFor__class_loader[$vClassName];
        };
    }

    /**
     * Add support for the new keyword
     *
     * This function accepts 3 possible values for it's parameter:
     *
     * 1. _null_ - (default / production) A new object is created
     *
     * 2. _array_ - (testing) The parameter is used to find the respective key
     * in the passed array and the respective value (new object) is returned
     *
     * 3. _anonymous function_ - (custom) The call is routed to the passed
     * anonymous function
     *
     * @param null|array|callable $vParam What to do when called
     * @return self
     */
    public function with__class_loader($vParam = null) {
        $pReturn = clone $this;

        if(!isset($vParam)) {
            $pReturn['class_loader'] = function($vClassName) {
                return new $vClassName;
            };
        } elseif(is_callable($vParam)) {
            $pReturn['class_loader'] = $vParam;
        } elseif(is_array($vParam)) {
            $returnFor__class_loader = $vParam;
            $pReturn['class_loader'] = $this->get__class_loader();
        }

        return $pReturn;
    }
    
    // }}}

}
