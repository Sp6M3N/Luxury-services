<?php

namespace App\Controller;

use App\Entity\JobCategories;
use App\Form\JobCategoriesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/job/categories")
 */
class JobCategoriesController extends AbstractController
{
    /**
     * @Route("/", name="job_categories_index", methods={"GET"})
     */
    public function index(): Response
    {
        $jobCategories = $this->getDoctrine()
            ->getRepository(JobCategories::class)
            ->findAll();

        return $this->render('job_categories/index.html.twig', [
            'job_categories' => $jobCategories,
        ]);
    }

    /**
     * @Route("/new", name="job_categories_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $jobCategory = new JobCategories();
        $form = $this->createForm(JobCategoriesType::class, $jobCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jobCategory);
            $entityManager->flush();

            return $this->redirectToRoute('job_categories_index');
        }

        return $this->render('job_categories/new.html.twig', [
            'job_category' => $jobCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="job_categories_show", methods={"GET"})
     */
    public function show(JobCategories $jobCategory): Response
    {
        return $this->render('job_categories/show.html.twig', [
            'job_category' => $jobCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="job_categories_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, JobCategories $jobCategory): Response
    {
        $form = $this->createForm(JobCategoriesType::class, $jobCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('job_categories_index');
        }

        return $this->render('job_categories/edit.html.twig', [
            'job_category' => $jobCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="job_categories_delete", methods={"DELETE"})
     */
    public function delete(Request $request, JobCategories $jobCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jobCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($jobCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('job_categories_index');
    }
}
