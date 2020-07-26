<?php

namespace App\Controller;

use App\Entity\Investment;
use App\Entity\MediaFile;
use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @Route("/project")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/", name="projects_home")
     */
    public function index()
    {
        $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();
        return $this->render('project/index.html.twig', array('projects' => $projects));
    }

    /**
     * @Route("/new-project", name="projectRender")
     */
    public function newProjectRender()
    {
        return $this->render('project/new-project.html.twig');
    }


    /**
     * @Route("/new-project/aj", name="project-creation")
     * @param Request $request
     */
    public function newProject(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $currentDate = new \DateTime('now');
        if ($request->isXmlHttpRequest()) {
            $file = $request->files->get('upload');
            $media = new MediaFile();
            $media->setImageFile($file);
            $media->setUpdatedAt(new \DateTime('now'));
            $manager->persist($media);
            $manager->flush();
            $project = new Project();
            $project->setName($request->request->get('name'));
            $project->setCreatedAt(new \DateTime('now'));
            $project->setInitialFundings(0);
            $project->setCurrentFundings($request->request->get('currentFundings'));
            $project->setDeadline($currentDate->modify('+1 month'));
            $project->setDescription($request->request->get('description'));
            $project->setRating(0);
            $project->setOwner($this->get('security.token_storage')->getToken()->getUser());
            $project->setUpdatedAt(new \DateTime('now'));
            $project->setIsValid(false);
            $project->setProjectProfile($media);
            $manager->persist($project);
            $manager->flush();
            return new JsonResponse(array('operation' => 'valid'));
        }
        return $this->redirectToRoute('project');
    }


    /**
     * @Route("/new-investissement", name="investissement-creation")
     * @param Request $request
     */
    public function newInvestisement(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        if ($request->isXmlHttpRequest()) {
            $project = $this->getDoctrine()->getRepository(Project::class)->find($request->request->get('id'));
            $investisement = new Investment();
            $investisement->setUpdatedAt(new \DateTime('now'));
            $investisement->setCreatedAt(new \DateTime('now'));
            $investisement->setActionPercentage(0);
            $investisement->setInvestmentSum($request->request->get('sum'));
            if ($project instanceof Project) {
                $project->setCurrentFundings($project->getCurrentFundings() + $request->request->get('sum'));
            }
            $manager->persist($investisement);
            $manager->flush();
            return new JsonResponse(array('operation' => 'success'));
        }

        return $this->render('Project');
    }


}
