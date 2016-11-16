<?php

namespace GeoParser\Command;

use GeoParser\Service\GeoParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoadCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('geoparser:load')
            ->setDescription('Create GeoContainer from source file')
            ->addArgument(
                'source',
                InputArgument::REQUIRED,
                'File path of source file'
            )
            ->addArgument(
                'type',
                InputArgument::REQUIRED,
                'Type of source (only gpx is actually supported)'
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $startedAt = microtime(true);

        $geoParser = new GeoParser(__DIR__ . '/../Resources/config/config.yml');

        $geoContainer = $geoParser->load(
            $input->getArgument('source'),
            $input->getArgument('type')
        );

        // Display generic information from GeoContainer
        $output->writeln('<comment>This GPX was created on </comment> ' . $geoContainer->getMetadata()->getCreatedAt()->format('Y-m-d H:i:s'));
        $output->writeln('<info>GeoContainer</info> <comment>has</comment> ' . count($geoContainer->getTracks()) . ' <info>tracks</info>');
        foreach ($geoContainer->getTracks() as $trackId => $track) {
            $output->writeln(
                "  <comment>→</comment> " . '<info>Track</info> ' . $trackId . ' <comment>is named</comment> ' . $track->getName() .
                ' <comment>and has</comment> ' . count($track->getTrackSegments()). ' <info>segments</info> '
            );
            foreach ($track->getTrackSegments() as $segmentId => $segment) {
                $output->writeln(
                    "      <comment>•</comment> " . '<info>Segment</info> '. $segmentId . ' <comment>has</comment> ' .
                    count($segment->getWaypoints()) . ' <info>waypoints</info>'
                );
            }
        }

        $output->writeln('File parsed in ' . round(microtime(true) - $startedAt, 2) . ' seconds');
    }
}