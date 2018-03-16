<?php

class MagicMethods
{
    public $var1;

    public $var2;

    /** @var int */
    private $number;

    /** @var string */
    private $text;

    /** @var array */
    private $array;

    /**
     * TestClass constructor.
     * @param int $number
     * @param string $text
     */
    public function __construct(int $number, string $text)
    {
        $this->number = $number;
        $this->text = $text;
    }

    public function __destruct()
    {
        echo "objektas sunaikintas ";
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'Vykdome __toString = ' . $this->text;
    }

    /**
     * @param $name
     * @param $city
     */
    public function __set($name, $city)
    {
        echo 'Creating parameter "' . $name . '" with value ' . $city . '</br>';
        $this->array[$name] = $city;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        echo 'Getting parameter "' . $name . '" value</br>';
        return $this->array[$name];
    }

    public function __isset($name)
    {
        return isset($this->array[$name]);
    }


    public function __unset($name)
    {
        echo 'unsetting ' . $this->array[$name] . '</br>';
        unset($this->array[$name]);
        print_r($this->array);
    }

    /**
     * @return array
     */
    public function __debugInfo(): array
    {
        return [
            'multiplication' => $this->number ** 2
        ];
    }

    public function __clone()
    {
        $this->number = ++$this->number;
    }

    /**
     * @param $method
     * @param $args
     */
    public function __call($method, $args)
    {
        echo "Call Method that doesn't exists- '$method' \n";
        echo '<pre>';
        var_dump($args);
        echo '<pre>';
    }

    /**
     * @param $method
     * @param $args
     */
    public static function __callStatic($method, $args)
    {
        echo "Call static Method that doesn't exists- '$method' \n";
        echo '<pre>';
        var_dump($args);
        echo '<pre>';
    }

    /**
     * @param $an_array
     * @return MagicMethods
     */
    public static function __set_state($an_array)
    {
        $obj = new MagicMethods(5, 'labas');
        $obj->var1 = $an_array['var1'];
        $obj->var2 = $an_array['var2'];

        return $obj;
    }

    /**
     * @param $xvar
     */
    public function __invoke($xvar)
    {
        var_dump($xvar);
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return array('number');
    }

    public function __wakeup()
    {
        echo '__Wakeup metodas iškviečiamas panadojant unserialized.';
    }


}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone()
    {
        $this->object1 = clone $this->object1;
    }
}