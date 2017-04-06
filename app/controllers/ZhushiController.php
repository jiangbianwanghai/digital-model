<?php

use Phalcon\Annotations\Adapter\Memory as MemoryAdapter;

class zhushiController extends ControllerBase
{

    public function indexAction()
    {
        $reader = new MemoryAdapter();

        // 反射在Example类的注释
        $reflector = $reader->get('Example');

        // 读取类中注释块中的注释
        $annotations = $reflector->getClassAnnotations();

        // 遍历注释
        foreach ($annotations as $annotation) {

            // 打印注释名称
            echo $annotation->getName(), PHP_EOL;

            // 打印注释参数个数
            echo $annotation->numberArguments(), PHP_EOL;

            // 打印注释参数
            print_r($annotation->getArguments());
        }
        $this->view->disable();
    }

}

