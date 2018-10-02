<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/getnumber", name="number page")
     */
    public function numberAction(Request $request)
    {

        $number = 10 ;
        $numer2 = 12 ;

        return $this->render('default/number.html.twig',[
            'x' => $number,
            'y' => $numer2,

        ]);

    }
}
