<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic, NP. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.com
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\FormBundle\Controller;

use Mautic\CoreBundle\Controller\FormController as CommonFormController;
use Mautic\FormBundle\Helper\PageTokenHelper;
use Symfony\Component\HttpFoundation\JsonResponse;

class PageTokenController extends CommonFormController
{

    public function indexAction($page = 1)
    {
        $tokenHelper = new PageTokenHelper($this->factory);

        $dataArray = array(
            'newContent'     => $tokenHelper->getTokenContent($page),
            'target'         => '#form-page-tokens',
            'replaceContent' => 'true',
            'mauticContent'  => 'pageEditor'
        );

        $response  = new JsonResponse($dataArray);
        $response->headers->set('Content-Length', strlen($response->getContent()));
        return $response;
    }
}