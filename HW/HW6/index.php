<?php

class Autoloader
{
    protected $prefixes = [];

    public function addNamespace(string $prefix, string $dir)
    {
        $prefix = trim($prefix, '\\') . '\\';
        $dir = rtrim($dir, DIRECTORY_SEPARATOR) . '/';

        if (isset($this->prefixes[$prefix]) === false) {
            $this->prefixes[$prefix] = array();
        }
    }

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class)
    {
        $parts = explode('\\', $class);

        if (isset($this->classspaces[$parts[0]])) {
            $path = $this->classspaces[$parts[0]];

            array_shift($parts);

            $fileName = $path . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $parts) . '.php';

            if (file_exists($fileName)) {
                require_once $fileName;
            }
        }
    }
}

$autoloader = new Autoloader();
$autoloader->addNamespace('hw', 'src');
$c = new \hw\User();


