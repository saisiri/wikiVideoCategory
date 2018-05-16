<?php

namespace App\Controller;

use App\Entity\ChannelPattern;
use App\Entity\YoutubeChannel;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class YoutubeChannelController extends Controller
{
    /**
     * @Route("/youtube_channel/list", name="youtube_channel_list")
     */
    public function index()
    {
        $youtube_channels = $this->getDoctrine()
            ->getRepository(YoutubeChannel::class)
            ->findAll();
        return $this->render('youtube_channel/list.html.twig', [
            'youtube_channels' => $youtube_channels,
        ]);
    }

    /**
     * @Route("/youtube_channel/id/{id}", name="youtube_channel_show")
     * @Method("GET")
     */
    public function show($id)
    {
        $youtube_channel = $this->getDoctrine()
            ->getRepository(YoutubeChannel::class)
            ->find($id);

        if (!$youtube_channel) {
            throw $this->createNotFoundException(
                'No youtube_channel found for id '.$id
            );
        }

        $channel_patterns = $this->getDoctrine()
            ->getRepository(ChannelPattern::class)
            ->findBy(
                ['channel_id' => $youtube_channel->getChannelId()],
                ['needle' => 'ASC']
            );

        return $this->render('youtube_channel/show.html.twig', ['channel_id' => $youtube_channel->getChannelId(),
            'youtube_username' => $youtube_channel->getYoutubeUsername(),
            'common_name' => $youtube_channel->getCommonName(),
            'channel_patterns'=>$channel_patterns]);
    }
}
