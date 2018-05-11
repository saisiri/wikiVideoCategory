<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;   
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Created by Sai Sree.
 * Date: 5/11/18
 * Time: 4:12 PM
 */
class VideoCategoryController extends Controller
{
    /**
     * @Route("/addCategory")
     */
    public function addCategory()
    {
        return $this->render('addCategory.html.twig');
    }
}