<?php
/**
 * @package Newscoop\CommentListsBundle
 * @author Rafał Muszyński <rafal.muszynski@sourcefabric.org>
 * @copyright 2013 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\CommunityTickerBundle\Services;

use Doctrine\ORM\EntityManager;
use NNewscoop\CommunityTickerBundle\TemplateList\ListCriteria;
use Newscoop\CommunityTickerBundle\Entity\CommunityTickerEvent;
use Symfony\Component\EventDispatcher\GenericEvent;
/**
 * List Comment service
 */
class CommunityFeedService
{
    /** @var Doctrine\ORM\EntityManager */
    protected $em;

    /**
     * @param Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Update community ticker
     *
     * @param  sfEvent $event
     * @return void
     */
    public function update(GenericEvent $event)
    {
        $params = $event->getArguments();

        $user = array_key_exists('user', $params) ? $params['user'] : null;
        unset($params['user']);

        $this->getRepository()->save(new CommunityTickerEvent(), array(
            'event' => $event->getName(),
            'user' => $user,
            'params' => $params,
        ));

        $this->em->flush();
    }

    /**
     * Find by criteria
     *
     * @param  Newscoop\CommunityTickerBundle\TemplateList\ListCriteria $criteria
     * @return Newscoop\ListResult;
     */
    public function findBy(ListCriteria $criteria)
    {
        return $this->getRepository()->findBy($criteria);
    }

   
    /**
     * Count by given criteria
     *
     * @param array $criteria
     * @return int
     */
    public function countBy(array $criteria = array())
    {
        return count($this->getRepository()->findBy($criteria));
    }

    /**
     * Get repository
     *
     * @return CommunityTickerEvent
     */
    protected function getRepository()
    {
        return $this->em->getRepository('Newscoop\CommunityTickerBundle\Entity\CommunityTickerEvent');
    }
}