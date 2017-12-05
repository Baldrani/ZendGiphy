<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PingController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function pingAction()
    {
        /*
        echo '<pre>';
        passthru("ping -c 3 www.google.com");
        echo '</pre>';
        */

        $view = new viewModel(array(
            'message' => 'Hello world',
        ));

        // php
        echo '<pre>';
        $url = "http://api.giphy.com/v1/gifs/search?q=ryan+gosling&api_key=M8vdi0NvkM4iU6Hg6ZKX0W1Fx9mbfSsi&limit=5";
        //print_r(json_decode(file_get_contents($url)));
        echo '</pre>';


        foreach (json_decode(file_get_contents($url), true) as $key => $ur){
            //var_dump($ur);
            foreach ($ur as $u){
                echo ('<img src="'.$u['images']['fixed_height']['url'].'">');
            }
            if($key == 4) break;
        }

        exit;
        $view->setTemplate('Application/index/index');
        return $view;
    }
}
