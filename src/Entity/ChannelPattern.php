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
     * @ORM\ManyToOne(targetEntity="App\Entity\YoutubeChannel")
     * @ORM\JoinColumn(name="channel_id", referencedColumnName="channel_id")
     */
    private $youtubeChannel;

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

    public function getYoutubeChannel(): ?YoutubeChannel
    {
        return $this->youtubeChannel;
    }

    public function setYoutubeChannel(?YoutubeChannel $youtubeChannel): self
    {
        $this->youtubeChannel = $youtubeChannel;

        return $this;
    }
}
