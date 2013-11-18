<?php
/**
 * @package CommunityTickerBundle
 * @author Rafał Muszyński <rafal.muszynski@sourcefabric.org>
 * @copyright 2013 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\CommunityTickerBundle\EventListener;

use Newscoop\EventDispatcher\Events\ListObjectsEvent;

class ListObjectsListener
{
    /**
     * Register plugin list objects in Newscoop
     * 
     * @param  ListObjectsEvent $event
     */
    public function registerListObject(ListObjectsEvent $event)
    {
        $event->registerListObject('newscoop\communitytickerbundle\templatelist\communityfeeds', array(
            'class' => 'Newscoop\CommunityTickerBundle\TemplateList\communityfeeds',
            'list' => 'community_ticker',
            'url_id' => 'ctid',
        ));
    }
}