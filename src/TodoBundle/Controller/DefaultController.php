<?php

namespace TodoBundle\Controller;
use TodoBundle\Entity\User1;
use TodoBundle\Entity\Todo;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Todo/default/users.html.twig');
    }

    public function allAction()
    {

        $todo = $this->getDoctrine()->getManager()->getRepository('TodoBundle:Todo')->findAll();

        return $this->render('@Todo/default/showall.html.twig', array(
            'todolist' => $todo,
        ));

    }
    public function newAction(Request $request)
{
    $todo=new Todo();
    $form= $this->createForm( 'TodoBundle\Form\TodoType' , $todo);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $em = $this->getDoctrine()->getManager();
        $em->persist($todo);
        $em->flush();
        $this->addFlash(
            'notice1',
            'Todo Added' );
        return $this->redirectToRoute('todo_details', array('id' => $todo->getId()));
    }

    return $this->render( '@Todo/default/new.html.twig' , array(
        'todolist' => $todo,
        'form' => $form->createView() ,
    ));
}
    public function editAction(Request $request, Todo $todo)
    {

        $editForm = $this->createForm('TodoBundle\Form\TodoType', $todo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('todo_edit', array('id' => $todo->getId()));
        }

        return $this->render('@Todo/default/edit.html.twig', array(
            'todolist' => $todo,
            'edit_form' => $editForm->createView(),

        ));
    }
    ///
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove( $this->getDoctrine()->getRepository('TodoBundle:Todo')->find($id) );
        $em->flush();

        $this->addFlash(
            'notice',
            'Todo Removed'
        );

        return $this->redirectToRoute('todo_all');
    }

    public function detailsAction( Todo $todo)
    {

        return $this->render('@Todo/default/show.html.twig', array(
            'todo' => $todo
        ));
    }



}
