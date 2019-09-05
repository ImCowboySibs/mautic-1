<?php

/*
 * @copyright   2018 Mautic Inc. All rights reserved
 * @author      Mautic, Inc.
 *
 * @link        https://www.mautic.com
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
namespace MauticPlugin\IntegrationsBundle\Sync\SyncProcess;

use MauticPlugin\IntegrationsBundle\Helper\RelationsHelper;
use MauticPlugin\IntegrationsBundle\Sync\DAO\Mapping\MappingManualDAO;
use MauticPlugin\IntegrationsBundle\Sync\Helper\MappingHelper;
use MauticPlugin\IntegrationsBundle\Sync\Notification\Notifier;
use MauticPlugin\IntegrationsBundle\Sync\SyncDataExchange\SyncDataExchangeInterface;
use MauticPlugin\IntegrationsBundle\Sync\Helper\SyncDateHelper;
use MauticPlugin\IntegrationsBundle\Sync\SyncProcess\Direction\Integration\IntegrationSyncProcess;
use MauticPlugin\IntegrationsBundle\Sync\SyncProcess\Direction\Internal\MauticSyncProcess;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class SyncProcessFactory
 */
final class SyncProcessFactory implements SyncProcessFactoryInterface
{
    /**
     * @param SyncDateHelper            $syncDateHelper
     * @param MappingHelper             $mappingHelper
     * @param RelationsHelper           $relationsHelper
     * @param IntegrationSyncProcess    $integrationSyncProcess
     * @param MauticSyncProcess         $mauticSyncProcess
     * @param EventDispatcherInterface  $eventDispatcher
     * @param Notifier                  $notifier
     * @param SyncDataExchangeInterface $internalSyncDataExchange
     * @param SyncDataExchangeInterface $integrationSyncDataExchange
     * @param MappingManualDAO          $integrationMappingManual
     * @param                           $isFirstTimeSync
     * @param \DateTimeInterface|null   $syncFromDateTime
     * @param \DateTimeInterface|null   $syncToDateTime
     *
     * @return SyncProcess
     */
    public function create(
        SyncDateHelper $syncDateHelper,
        MappingHelper $mappingHelper,
        RelationsHelper $relationsHelper,
        IntegrationSyncProcess $integrationSyncProcess,
        MauticSyncProcess $mauticSyncProcess,
        EventDispatcherInterface $eventDispatcher,
        Notifier $notifier,
        SyncDataExchangeInterface $internalSyncDataExchange,
        SyncDataExchangeInterface $integrationSyncDataExchange,
        MappingManualDAO $integrationMappingManual,
        $isFirstTimeSync,
        \DateTimeInterface $syncFromDateTime = null,
        \DateTimeInterface $syncToDateTime = null
    ): SyncProcess {
        return new SyncProcess(
            $syncDateHelper,
            $mappingHelper,
            $relationsHelper,
            $integrationSyncProcess,
            $mauticSyncProcess,
            $eventDispatcher,
            $notifier,
            $integrationMappingManual,
            $internalSyncDataExchange,
            $integrationSyncDataExchange,
            $isFirstTimeSync,
            $syncFromDateTime,
            $syncToDateTime
        );
    }
}
