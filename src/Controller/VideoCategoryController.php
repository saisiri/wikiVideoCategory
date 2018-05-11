<?php

namespace App\Controller;

/**
 * Created by Sai Sree.
 * Date: 5/11/18
 * Time: 4:12 PM
 */
class VideoCategoryController
{
    /**
     * @Route("/addCategory")
     */
    public function addCategory()
    {
        return $this->render('addCategory.html.twig');
    }
}