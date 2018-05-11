<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;   
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\VideoCategory;

/**
 * Created by Sai Sree.
 * Date: 5/11/18
 * Time: 4:12 PM
 */
class VideoCategoryController extends Controller
{


    /**
     * @Route("/addCategory")
     * @Method({"POST", "GET"})
     */
    public function addCategoryPage(Request $request)
    {
    	$category = new VideoCategory();
        $form = $this->createFormBuilder($category)
        			->add('category', TextType::class)
        			->add('create', SubmitType::class)
                    ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            $this->addFlash('success', 'Category Added');
        }
        return $this->render('add-category.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}