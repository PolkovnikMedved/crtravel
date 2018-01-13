<?php

namespace CRTravelBundle\Controller;

use CRTravelBundle\Entity\PartnerRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Partnerrequest controller.
 *
 * @Route("admin/partnerrequest")
 */
class PartnerRequestController extends Controller
{
    /**
     * Lists all partnerRequest entities.
     *
     * @Route("/", name="partnerrequest_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partnerRequests = $em->getRepository('CRTravelBundle:PartnerRequest')->findAll();

        return $this->render('CRTravelBundle:partnerrequest:index.html.twig', array(
            'partnerRequests' => $partnerRequests,
        ));
    }

    /**
     * Creates a new partnerRequest entity.
     *
     * @Route("/new", name="partnerrequest_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $partnerRequest = new Partnerrequest();
        $form = $this->createForm('CRTravelBundle\Form\PartnerRequestType', $partnerRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($partnerRequest);
            $em->flush();

            $this->addFlash('success', 'The request has been created.');

            return $this->redirectToRoute('partnerrequest_show', array('id' => $partnerRequest->getId()));
        }

        return $this->render('CRTravelBundle:partnerrequest:new.html.twig', array(
            'partnerRequest' => $partnerRequest,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a partnerRequest entity.
     *
     * @Route("/{id}", name="partnerrequest_show")
     * @Method("GET")
     */
    public function showAction(PartnerRequest $partnerRequest)
    {
        $deleteForm = $this->createDeleteForm($partnerRequest);

        return $this->render('CRTravelBundle:partnerrequest:show.html.twig', array(
            'partnerRequest' => $partnerRequest,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing partnerRequest entity.
     *
     * @Route("/{id}/edit", name="partnerrequest_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PartnerRequest $partnerRequest)
    {
        $deleteForm = $this->createDeleteForm($partnerRequest);
        $editForm = $this->createForm('CRTravelBundle\Form\PartnerRequestType', $partnerRequest);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'The request has been updated.');

            return $this->redirectToRoute('partnerrequest_edit', array('id' => $partnerRequest->getId()));
        }

        return $this->render('CRTravelBundle:partnerrequest:edit.html.twig', array(
            'partnerRequest' => $partnerRequest,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a partnerRequest entity.
     *
     * @Route("/{id}", name="partnerrequest_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PartnerRequest $partnerRequest)
    {
        $form = $this->createDeleteForm($partnerRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partnerRequest);
            $em->flush();

            $this->addFlash('success', 'The request has been deleted.');
        }

        return $this->redirectToRoute('partnerrequest_index');
    }

    /**
     * Creates a form to delete a partnerRequest entity.
     *
     * @param PartnerRequest $partnerRequest The partnerRequest entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PartnerRequest $partnerRequest)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partnerrequest_delete', array('id' => $partnerRequest->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
