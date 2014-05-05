<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Module\Cli\Controller;

require_once __DIR__ . '/../../bootstrap.php';

$cli = new Application('Command Line Interface', '1.0');
$cli->setCatchExceptions(true);

$cli->register('iban.validate')
    ->addArgument(
        'iban',
        InputArgument::OPTIONAL,
        'What IBAN do you want to validate?'
    )
    ->setDescription('Validate ibans')
    ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
        $iban = new Controller\IBAN($app);
        $iban->validate($input->getArgument('iban'));
    });

$cli->run();