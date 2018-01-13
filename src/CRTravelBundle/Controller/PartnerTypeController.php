<?php

namespace CRTravelBundle\Controller;

use CRTravelBundle\Entity\PartnerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use CRTravelBundle\Service\FileUploader;

/**
 * Partnertype controller.
 *
 * @Route("admin/partnertype")
 */
class PartnerTypeController extends Controller
{
    /**
     * Lists all partnerType entities.
     *
     * @Route("/", name="partnertype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partnerTypes = $em->getRepository('CRTravelBundle:PartnerType')->findAll();

        return $this->render('CRTravelBundle:partnertype:index.html.twig', array(
            'partnerTypes' => $partnerTypes,
        ));
    }

    /**
     * Creates a new partnerType entity.
     *
     * @Route("/new", name="partnertype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $partnerType = new Partnertype();
        $form = $this->createForm('CRTravelBundle\Form\PartnerTypeType', $partnerType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $fileUploader = $this->get(FileUploader::class);
            $picture = $partnerType->getPictureAddress();
            $fileName = $fileUploader->uploadFile($picture);
            $partnerType->setPictureAddress($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($partnerType);
            $em->flush();

            $this->addFlash('success', 'The partner type has been created.');

            return $this->redirectToRoute('partnertype_show', array('id' => $partnerType->getId()));
        }

        return $this->render('CRTravelBundle:partnertype:new.html.twig', array(
            'partnerType' => $partnerType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a partnerType entity.
     *
     * @Route("/{id}", name="partnertype_show")
     * @Method("GET")
     */
    public function showAction(PartnerType $partnerType)
    {
        $deleteForm = $this->createDeleteForm($partnerType);

        return $this->render('CRTravelBundle:partnertype:show.html.twig', array(
            'partnerType' => $partnerType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing partnerType entity.
     *
     * @Route("/{id}/edit", name="partnertype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PartnerType $partnerType)
    {
        $deleteForm = $this->createDeleteForm($partnerType);
        $editForm = $this->createForm('CRTravelBundle\Form\PartnerTypeType', $partnerType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $fileUploader = $this->get(FileUploader::class);
            $picture = $partnerType->getPictureAddress();
            $fileName = $fileUploader->uploadFile($picture);
            $partnerType->setPictureAddress($fileName);

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'The partner type has been updated.');

            return $this->redirectToRoute('partnertype_edit', array('id' => $partnerType->getId()));
        }

        return $this->render('CRTravelBundle:partnertype:edit.html.twig', array(
            'partnerType' => $partnerType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a partnerType entity.
     *
     * @Route("/{id}", name="partnertype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PartnerType $partnerType)
    {
        $form = $this->createDeleteForm($partnerType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partnerType);
            $em->flush();

            $this->addFlash('success', 'The partner type has been deleted.');
        }

        return $this->redirectToRoute('partnertype_index');
    }

    /**
     * Creates a form to delete a partnerType entity.
     *
     * @param PartnerType $partnerType The partnerType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PartnerType $partnerType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partnertype_delete', array('id' => $partnerType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
