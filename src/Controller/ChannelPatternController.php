<?php

namespace App\Controller;

use App\Entity\ChannelPattern;
use App\Entity\YoutubeChannel;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
     * @Route("/channel_pattern/id/{id}", name="channel_pattern_show")
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
            'youtube_channel' => $channel_pattern->getYoutubeChannel()]);
    }

    /**
     * @Route("/channel_pattern/add_success/{id}", name="channel_pattern_add_success")
     * @Method({"GET","POST"})
     */
    public function add_success($id)
    {
        $channel_pattern = $this->getDoctrine()
            ->getRepository(ChannelPattern::class)
            ->find($id);

        if (!$channel_pattern) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('channel_pattern/add_success.html.twig', ['id' => $channel_pattern->getId(),
            'needle' => $channel_pattern->getNeedle(), 'pattern' => $channel_pattern->getPattern(),
            'youtube_channel' => $channel_pattern->getYoutubeChannel()]);
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
            ->add('youtubechannel', EntityType::class, array(
                // looks for choices from this entity
                'class' => YoutubeChannel::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'youtubeusername',
                'placeholder' => 'Choose a Youtube channel',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ))
            ->add('Add', SubmitType::class)
            ->getForm();

        if ($request->isMethod('POST')) {

            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($channelPattern);
                $em->flush();
                echo $channelPattern->getId();
                $ney_id = $channelPattern->getId();
                return $this->redirectToRoute('channel_pattern_add_success', array('id' => $ney_id));
            }
        }
        return $this->render('channel_pattern/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
