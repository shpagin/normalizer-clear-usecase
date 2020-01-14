<?php

require_once 'vendor/autoload.php';

use Sample\Entity;
use Sample\Sample;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

$normalizers = [new ObjectNormalizer()];
$serializer = new Serializer($normalizers);
$sample = new Sample($serializer);

$sample->normalizeSet([
    'Full entity' => new Entity(104, 'Full entity', true),
    'Partial entity' => new Entity(null, 'Partial'),
    'Blank entity' => new Entity(),
]);

$sample->denormalizeSet([
    'Full data' => [
        'id' => 101,
        'title' => 'Hello full',
        'active' => true,
    ],
    'Partial data' => [
        'title' => 'Hello partial',
    ],
    'Attempt to inject foreign data' => [
        'id' => 103,
        'title' => 'Bye foreign',
        'foreign' => 'data',
    ],
], Entity::class);
