<?php
/**
 * @package Newscoop\CommunityTickerBundle
 * @author Rafał Muszyński <rafal.muszynski@sourcefabric.org>
 * @copyright 2013 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\CommunityTickerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/community-ticker")
     * @Template()
     */
    public function indexAction(Request $request)
    {   
        //$this->container->get('dispatcher')->dispatch('plugin.install.newscoop_ticker_plugin', new \Newscoop\EventDispatcher\Events\GenericEvent($this, array( 'plugin_name' => '' )));
        return array();
    }
}