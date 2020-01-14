<?php
declare(strict_types=1);

namespace Sample;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Serializer;

class Sample
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * Sample constructor.
     *
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param array $objects
     *
     * @throws ExceptionInterface
     */
    public function normalizeSet(array $objects): void
    {
        foreach ($objects as $note => $object) {
            $data = $this->serializer->normalize($object);

            $this->output('Normalized', $note, $data);
        }
    }

    /**
     * @param array  $dataSet
     * @param string $type
     *
     * @throws ExceptionInterface
     */
    public function denormalizeSet(array $dataSet, string $type): void
    {
        foreach ($dataSet as $note => $data) {
            $object = $this->serializer->denormalize($data, $type);

            $this->output('Denormalized', $note, $object);
        }
    }

    /**
     * @param string $caption
     * @param string $message
     * @param mixed  $data
     */
    private function output(string $caption, string $message, $data)
    {
        printf("\n%s: %s\n", $caption, $message);
        var_dump($data);
    }
}
