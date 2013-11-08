<?php

namespace MyHappy\CineManiaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MyHappy\CineManiaBundle\Entity\Pessoa;
use MyHappy\CineManiaBundle\Form\PessoaType;

/**
 * Pessoa controller.
 *
 * @Route("/pessoa")
 */
class PessoaController extends Controller
{

    /**
     * Lists all Pessoa entities.
     *
     * @Route("/", name="pessoa")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MyHappyCineManiaBundle:Pessoa')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Pessoa entity.
     *
     * @Route("/", name="pessoa_create")
     * @Method("POST")
     * @Template("MyHappyCineManiaBundle:Pessoa:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Pessoa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pessoa_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Pessoa entity.
    *
    * @param Pessoa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Pessoa $entity)
    {
        $form = $this->createForm(new PessoaType(), $entity, array(
            'action' => $this->generateUrl('pessoa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pessoa entity.
     *
     * @Route("/new", name="pessoa_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Pessoa();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Pessoa entity.
     *
     * @Route("/{id}", name="pessoa_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MyHappyCineManiaBundle:Pessoa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pessoa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Pessoa entity.
     *
     * @Route("/{id}/edit", name="pessoa_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MyHappyCineManiaBundle:Pessoa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pessoa entity.');
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
    * Creates a form to edit a Pessoa entity.
    *
    * @param Pessoa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pessoa $entity)
    {
        $form = $this->createForm(new PessoaType(), $entity, array(
            'action' => $this->generateUrl('pessoa_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pessoa entity.
     *
     * @Route("/{id}", name="pessoa_update")
     * @Method("PUT")
     * @Template("MyHappyCineManiaBundle:Pessoa:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MyHappyCineManiaBundle:Pessoa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pessoa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pessoa_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Pessoa entity.
     *
     * @Route("/{id}", name="pessoa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MyHappyCineManiaBundle:Pessoa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pessoa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pessoa'));
    }

    /**
     * Creates a form to delete a Pessoa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pessoa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
