<?php

namespace MyHappy\CineManiaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MyHappy\CineManiaBundle\Entity\Publicidade;
use MyHappy\CineManiaBundle\Form\PublicidadeType;

/**
 * Publicidade controller.
 *
 * @Route("/publicidade")
 */
class PublicidadeController extends Controller
{

    /**
     * Lists all Publicidade entities.
     *
     * @Route("/", name="publicidade")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MyHappyCineManiaBundle:Publicidade')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Publicidade entity.
     *
     * @Route("/", name="publicidade_create")
     * @Method("POST")
     * @Template("MyHappyCineManiaBundle:Publicidade:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Publicidade();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('publicidade_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Publicidade entity.
    *
    * @param Publicidade $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Publicidade $entity)
    {
        $form = $this->createForm(new PublicidadeType(), $entity, array(
            'action' => $this->generateUrl('publicidade_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Publicidade entity.
     *
     * @Route("/new", name="publicidade_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Publicidade();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Publicidade entity.
     *
     * @Route("/{id}", name="publicidade_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MyHappyCineManiaBundle:Publicidade')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Publicidade entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Publicidade entity.
     *
     * @Route("/{id}/edit", name="publicidade_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MyHappyCineManiaBundle:Publicidade')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Publicidade entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Publicidade entity.
    *
    * @param Publicidade $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Publicidade $entity)
    {
        $form = $this->createForm(new PublicidadeType(), $entity, array(
            'action' => $this->generateUrl('publicidade_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Publicidade entity.
     *
     * @Route("/{id}", name="publicidade_update")
     * @Method("PUT")
     * @Template("MyHappyCineManiaBundle:Publicidade:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MyHappyCineManiaBundle:Publicidade')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Publicidade entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('publicidade_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Publicidade entity.
     *
     * @Route("/{id}", name="publicidade_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MyHappyCineManiaBundle:Publicidade')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Publicidade entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('publicidade'));
    }

    /**
     * Creates a form to delete a Publicidade entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('publicidade_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
