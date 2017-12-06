<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function giphyAction()
    {

        $search = str_replace(' ', '+', $this->params('giphy'));
        $url = "http://api.giphy.com/v1/gifs/search?q=".$search."&api_key=M8vdi0NvkM4iU6Hg6ZKX0W1Fx9mbfSsi";
        (null !== $this->params('number')) ? $url .= "&limit=".$this->params('number') : $url .="&limit=1";


        foreach (json_decode(file_get_contents($url), true)['data'] as $image){
            echo ('<img src="'.$image['images']['fixed_height']['url'].'">');
        }

        return new ViewModel();
    }

}
