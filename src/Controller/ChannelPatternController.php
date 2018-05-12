<?php

namespace App\Controller;

use App\Entity\ChannelPattern;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Flex\Response;

class ChannelPatternController extends Controller
{
    /**
     * @Route("/channel_pattern/list", name="channel_pattern_list")
     * @Method({"GET"})
     */
    public function show_list()
    {
        $channel_patterns = $this->getDoctrine()
            ->getRepository(ChannelPattern::class)
            ->findAll();
        return $this->render('channel_pattern/list.html.twig', [
            'channel_patterns' => $channel_patterns,
        ]);
    }

    /**
     * @Route("/channel_pattern/show/{id}", name="channel_pattern_show")
     * @Method("GET")
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

        return $this->render('channel_pattern/show.html.twig', ['id' => $channel_pattern->getId(),
            'needle' => $channel_pattern->getNeedle(), 'pattern' => $channel_pattern->getPattern(),
            'channel_id' => $channel_pattern->getChannelId()]);
    }


    /**
     * @Route("/channel_pattern/add")
     * @Method({"GET","POST"})
     */
    public function addChannelPattern(Request $request)
    {
        $channelPattern = new ChannelPattern();
        $form = $this->createFormBuilder($channelPattern)
                    ->add('pattern', TextType::class)
                    ->add('needle', TextType::class)
                    ->add('channel_id', TextType::class)
                    ->add('Add', SubmitType::class)
                    ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($channelPattern);
            $em->flush();
            $this->addFlash('success', 'Channel Pattern Added');
        }
        return $this->render('channel_pattern/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
