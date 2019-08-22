<?php

namespace AppBundle\Controller;

use AppBundle\Entity\OpeningHour;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Openinghour controller.
 *
 * @Route("openinghour")
 */
class OpeningHourController extends Controller
{
    /**
     * Lists all openingHour entities.
     *
     * @Route("/", name="openinghour_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $openingHours = $em->getRepository('AppBundle:OpeningHour')->findAll();

        return $this->render('openinghour/index.html.twig', array(
            'openingHours' => $openingHours,
        ));
    }

    /**
     * Creates a new openingHour entity.
     *
     * @Route("/new", name="openinghour_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $openingHour = new Openinghour();
        $form = $this->createForm('AppBundle\Form\OpeningHourType', $openingHour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($openingHour);
            $em->flush();

            return $this->redirectToRoute('restaurant_index');
        }

        return $this->render('openinghour/new.html.twig', array(
            'openingHour' => $openingHour,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a openingHour entity.
     *
     * @Route("/{id}", name="openinghour_show")
     * @Method("GET")
     */
    public function showAction(OpeningHour $openingHour)
    {
        $deleteForm = $this->createDeleteForm($openingHour);

        return $this->render('openinghour/show.html.twig', array(
            'openingHour' => $openingHour,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing openingHour entity.
     *
     * @Route("/{id}/edit", name="openinghour_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OpeningHour $openingHour)
    {
        $deleteForm = $this->createDeleteForm($openingHour);
        $editForm = $this->createForm('AppBundle\Form\OpeningHourType', $openingHour);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('restaurant_index');
        }

        return $this->render('openinghour/edit.html.twig', array(
            'openingHour' => $openingHour,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a openingHour entity.
     *
     * @Route("/{id}", name="openinghour_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OpeningHour $openingHour)
    {
        $form = $this->createDeleteForm($openingHour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($openingHour);
            $em->flush();
        }

        return $this->redirectToRoute('restaurant_index');
    }

    /**
     * Creates a form to delete a openingHour entity.
     *
     * @param OpeningHour $openingHour The openingHour entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OpeningHour $openingHour)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('openinghour_delete', array('id' => $openingHour->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
