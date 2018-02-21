<?php

namespace CRTravelBundle\Controller;

use CRTravelBundle\Entity\Partner;
use CRTravelBundle\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Partner controller.
 *
 * @Route("admin/partner")
 */
class PartnerController extends Controller
{
    /**
     * Lists all partner entities.
     *
     * @Route("/", name="partner_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partners = $em->getRepository('CRTravelBundle:Partner')->findAll();

        return $this->render('CRTravelBundle:partner:index.html.twig', array(
            'partners' => $partners,
        ));
    }

    /**
     * Creates a new partner entity.
     *
     * @Route("/new", name="partner_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $partner = new Partner();
        $form = $this->createForm('CRTravelBundle\Form\PartnerType', $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $fileUploader = $this->get(FileUploader::class);
            $picture = $partner->getPictureAddressFile();
            $fileName = $fileUploader->uploadFile($picture);
            $partner->setPictureAddress($fileName);

            // Upload files
            foreach($partner->getPictures()->getIterator() as $i=>$item)
            {
                $pic = $item->getAddressFile();
                $pictureName = $fileUploader->uploadFile($pic);
                $item->setAddress($pictureName);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($partner);
            $em->flush();

            $this->addFlash('success', 'The partner has been created.');

            return $this->redirectToRoute('partner_show', array('id' => $partner->getId()));
        }

        return $this->render('CRTravelBundle:partner:new.html.twig', array(
            'partner' => $partner,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a partner entity.
     *
     * @Route("/{id}", name="partner_show")
     * @Method("GET")
     */
    public function showAction(Partner $partner)
    {
        $deleteForm = $this->createDeleteForm($partner);

        return $this->render('CRTravelBundle:partner:show.html.twig', array(
            'partner' => $partner,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing partner entity.
     *
     * @Route("/{id}/edit", name="partner_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Partner $partner)
    {
        $deleteForm = $this->createDeleteForm($partner);
        $editForm = $this->createForm('CRTravelBundle\Form\PartnerType', $partner);
        $editForm->handleRequest($request);

        //TODO tester si le fichier est != null alors upload !

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $fileUploader = $this->get(FileUploader::class);
            $picture = $partner->getPictureAddress();
            $fileName = $fileUploader->uploadFile($picture);
            $partner->setPictureAddress($fileName);

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'The partner has been updated.');

            return $this->redirectToRoute('partner_edit', array('id' => $partner->getId()));
        }

        return $this->render('CRTravelBundle:partner:edit.html.twig', array(
            'partner' => $partner,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a partner entity.
     *
     * @Route("/{id}", name="partner_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Partner $partner)
    {
        $form = $this->createDeleteForm($partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partner);
            $em->flush();

            $this->addFlash('success', 'The partner has been deleted.');
        }

        return $this->redirectToRoute('partner_index');
    }

    /**
     * Creates a form to delete a partner entity.
     *
     * @param Partner $partner The partner entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Partner $partner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partner_delete', array('id' => $partner->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
