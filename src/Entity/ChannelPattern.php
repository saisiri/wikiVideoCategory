<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChannelPatternRepository")
 * @ORM\Table(name="channel_patterns")
 */
class ChannelPattern
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=220, nullable=true)
     */
    private $needle;

    /**
     * @ORM\Column(type="string", length=220, nullable=true)
     */
    private $pattern;

    /**
     * @ORM\Column(type="string", length=220, nullable=true)
     */
    private $channel_id;

    public function getId()
    {
        return $this->id;
    }

    public function getNeedle(): ?string
    {
        return $this->needle;
    }

    public function setNeedle(?string $needle): self
    {
        $this->needle = $needle;

        return $this;
    }

    public function getPattern(): ?string
    {
        return $this->pattern;
    }

    public function setPattern(?string $pattern): self
    {
        $this->pattern = $pattern;

        return $this;
    }

    public function getChannelId(): ?string
    {
        return $this->channel_id;
    }

    public function setChannelId(?string $channel_id): self
    {
        $this->channel_id = $channel_id;

        return $this;
    }
}
