<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Module\IBAN;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
date_default_timezone_set('UTC');

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
        $iban = new IBAN($app);
        $iban->validate($input->getArgument('iban'));
    });

$cli->run();