<?php

namespace App\Controller;

use App\Entity\ChannelPattern;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Flex\Response;

class ChannelPatternController extends Controller
{
    /**
     * @Route("/channel_pattern", name="channel_pattern")
     */
    public function index()
    {
        return $this->render('channel_pattern/index.html.twig', [
            'controller_name' => 'ChannelPatternController',
        ]);
    }

    /**
     * @Route("/channel_pattern/{id}", name="channel_pattern_show")
     */
    public function show($id)
    {
        $channel_pattern = $this->getDoctrine()
            ->getRepository(ChannelPattern::class)
            ->find($id);

        if (!$channel_pattern) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //return new Response('Check out this great product: '.$channel_pattern->getNeedle());

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('channel_pattern/show.html.twig', ['id' => $channel_pattern->getId(),
            'needle' => $channel_pattern->getNeedle(), 'pattern' => $channel_pattern->getPattern(),
            'channel_id' => $channel_pattern->getChannelId()]);
    }
}
