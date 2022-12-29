<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2022 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 1.0.0
 */

namespace Flexic\Scheduler\Configuration;

use Flexic\Scheduler\Constants\WorkerOptions;
use Flexic\Scheduler\Worker;
use Flexic\Scheduler\Logger\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class WorkerConfiguration extends Configuration
{
    public readonly array $options;

    public Worker $worker;

    public Logger $logger;

    public function __construct(
        array $options = [],
        ?SymfonyStyle $io = null,
        ?LoggerInterface $logger = null,
    ) {
        $this->options = $this->resolve($options, [
            WorkerOptions::SCHEDULE_EVENT_LIMIT => null,
            WorkerOptions::TIME_LIMIT => null,
            WorkerOptions::MEMORY_LIMIT => null,
            WorkerOptions::INTERVAL_LIMIT => null,
        ]);

        $this->logger = new Logger(
            $io,
            $logger,
        );
    }

    public function getLogger(): Logger
    {
        return $this->logger;
    }

    public function setWorker(Worker $worker): void
    {
        $this->worker = $worker;
    }

    public function getWorker(): Worker
    {
        return $this->worker;
    }
}
