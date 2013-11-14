<?php
/**
 * @package Newscoop\CommunityTickerBundle
 * @author Rafał Muszyński <rafal.muszynski@sourcefabric.org>
 * @copyright 2013 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\CommunityTickerBundle\TemplateList;

use Newscoop\ListResult;
use Newscoop\TemplateList\BaseList;
/**
 * Community Feeds List
 */
class CommunityFeedsList extends BaseList 
{

    protected function prepareList($criteria)
    {   
        $service = \Zend_Registry::get('container')->get('newscoop_ticker_plugin.service');
        $lists = $service->findBy($criteria);
        foreach ($lists as $feed) {
            $lists->items[$key] = new \MetaCommunityFeed($feed);
        }

        return $lists;
    }

    protected function convertParameters($firstResult, $parameters)
    {
        $this->criteria->orderBy = array();
        // run default simple parameters converting
        parent::convertParameters($firstResult, $parameters);

        if (array_key_exists('length', $parameters)) {
            $parameter = (int)$parameters['length'];
            if ($parameter < 0) {
                \CampTemplate::singleton()->trigger_error("invalid value $value of parameter $parameter in statement list_article_authors");
            }

            $this->criteria->length = $parameter;
        }    
    }
}