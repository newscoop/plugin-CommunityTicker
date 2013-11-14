<?php
/**
 * @package Newscoop\CommunityTickerBundle
 * @copyright 2013 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\CommunityTickerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Newscoop\CommunityTickerBundle\Entity\CommunityTickerEvent;

/**
 * Community Ticker Event Repository
 */
class CommunityTickerEventRepository extends EntityRepository
{
    /**
     * Save event
     *
     * @param  CommunityTickerEvent $event
     * @param  array                $values
     * @return void
     */
    public function save(CommunityTickerEvent $event, array $values)
    {
        $event->setEvent($values['event']);
        $event->setParams(isset($values['params']) ? $values['params'] : array());

        if (!empty($values['user'])) {
            $user = is_int($values['user']) ?
                $this->getEntityManager()->getReference('Newscoop\Entity\User', $values['user']) : $values['user'];
            $event->setUser($user);
        }

        $this->getEntityManager()->persist($event);
    }
}
