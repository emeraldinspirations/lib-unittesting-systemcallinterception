<?php

use emeraldinspirations\library\unitTesting\systemCallInterception\SystemCallIntercetor;

class example
{

    private static  $SystemCallIntercept = null;
    private         $SCI                 = null;

    public function executeAction($vAction)
    {

        $pClassName = __NAMESPACE__.'\\action\\'.$vAction;

        if(!$this->SCI['class_exists']($pClassName)) {
            throw new \UnexpectedValueException(
            'Action Not supported',
            1480489048);
        }

        return $this->SCI['class_loader']($pClassName);

    }

    static function prepSystemCallIntercept(
    ) : \ArrayObject {
        if(!isset(self::$SystemCallIntercept)) {
            self::$SystemCallIntercept = (new SystemCallInterceptor())
            ->with__class_exists()
            ->with__class_loader();
        }
        return self::$SystemCallIntercept;
    }

    static function fromUnitTester(
        \ArrayObject $vSystemCallIntercept = null
    ) : example {
        $pReturn = new example;
        $pReturn->SCI = $vSystemCallIntercept ??
            self::prepSystemCallIntercept();
        return $pReturn;
    }

    public function __construct()
    {

        $this->SCI = self::prepSystemCallIntercept();

    }

}
