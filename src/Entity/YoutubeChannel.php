<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\YoutubeChannelRepository")
 * @ORM\Table(name="youtube_channels")
 */
class YoutubeChannel
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=30)
     */
    private $channel_id;

    /**
     * @ORM\Column(type="string", length=220, nullable=true)
     */
    private $common_name;

    /**
     * @ORM\Column(type="string", length=111, nullable=true)
     */
    private $youtube_username;

    public function getChannelId(): ?string
    {
        return $this->channel_id;
    }

    public function setChannelId(string $channel_id): self
    {
        $this->channel_id = $channel_id;

        return $this;
    }

    public function getCommonName(): ?string
    {
        return $this->common_name;
    }

    public function setCommonName(?string $common_name): self
    {
        $this->common_name = $common_name;

        return $this;
    }

    public function getYoutubeUsername(): ?string
    {
        return $this->youtube_username;
    }

    public function setYoutubeUsername(?string $youtube_username): self
    {
        $this->youtube_username = $youtube_username;

        return $this;
    }
}
