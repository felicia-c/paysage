<?php
namespace PaysageBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaysageBundle\Entity\Task;
use PaysageBundle\Entity\Chantier;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use PaysageBundle\Form\ChantierType;



class PaysageController extends Controller
{

    public function indexAction()
    {

        $chantiers = $this->getDoctrine()
            ->getRepository('PaysageBundle:Chantier')
            ->findAll();

        if (!$chantiers) {
            throw $this->createNotFoundException(
                'Il n\'y a pas encore de chantier !'
            );
        }

        $number = mt_rand(0, 100);

        return $this->render('index.html.twig', array(
            'number' => $number,
            'chantiers' => $chantiers
        ));
    }



    /**
     * @Route("/to-do")
     */
    public function newTaskAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Faire un site');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Ajouter un truc à faire'))
            ->getForm();


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!


             $em = $this->getDoctrine()->getManager();
             $em->persist($task);
             $em->flush();

            return $this->redirectToRoute('/tasks');
        }


        return $this->render('task.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/tasks")
     */
    public function showTasksAction()
    {

        $tasks = $this->getDoctrine()
            ->getRepository('PaysageBundle:Task')
            ->findAll();

        if (!$tasks) {
            throw $this->createNotFoundException(
                'Il n\'y a pas de truc particulier à faire, il est temps de sortir profiter de la vie !'
            );
        }

        return  $this->render('showtasks.html.twig', array('tasks' => $tasks));
        // ... do something, like pass the $product object into a template
    }



    /**

     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response

     */
    public function newChantierAction(Request $request)
    {
        // create a task and give it some dummy data for this example
     /*
        $chantier = new Chantier();
        $chantier->setTitre('nouveau chantier');
        $chantier->setLieu('Paris');

        $form = $this->createFormBuilder($chantier)
            ->add('titre', TextType::class)
            ->add('lieu', TextType::class)
            ->add('annee', IntegerType::class)
            ->add('image', ImageType::class)
            ->add('save', SubmitType::class, array('label' => 'Ajouter un chantier'))
            ->getForm();


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
            if ($request->isMethod('POST')) {
                $form->submit($request->request->get($form->getName()));
            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('/chantier-ajoute');
        }

    */


        //security check ROLE_ADMIN
       // $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Vous n\'avez pas accès à cette page');

        //creation d'un chantier

        $chantier = new Chantier();


        $form = $this->createForm(ChantierType::class, $chantier);

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);

            if ($form->isValid())
            {
              //  $atelier->setDateCrea(new\Datetime());

                $em = $this->getDoctrine()->getManager();
                $em->persist($chantier);
                $em->flush();

                $request->getSession()->getFlashBag()->add('neutre', 'Yeah ! Un nouveau chantier ajouté !');

                $chantiers = $this->getDoctrine()
                    ->getRepository('PaysageBundle:Chantier')
                    ->findAll();

                //echo 'enregistré !';exit;


                foreach ($chantiers as $chantier) {
                    $webPath = $chantier->getWebPath_vignette();
                }




                //return $this->redirectToRoute('chantiers');
                return $this->render('index.html.twig', array('chantiers' => $chantiers, 'webPath' => $webPath));



            }
            //test:
            echo 'formulaire non valide !';exit;

        }
        // Si on n'est PAS en POST -> affichage du form



        return $this->render('add-chantier.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    //EDIT

     /**
     *
     * @Route("/edit-chantier/id")
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     *
     */
    public function editAction($id, Request $request)
    {
        //security check ROLE_ADMIN
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Vous n\'avez pas accès à cette page');

        //on recupere  $id

        $em = $this->getDoctrine()->getManager();
        $chantier = $em->getRepository('PaysageBundle:Chantier')->find($id);

        //$atelier->setDateModif(new\Datetime());

        $form = $this->createForm(ChantierType::class, $chantier);

        if (null === $chantier) {
            throw new NotFoundHttpException("Le chantier ".$id." est introuvable");
        }

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);

            if ($form->isValid())
            {
                $em->persist($chantier);
                $em->flush();

                $request->getSession()->getFlashBag()->add('neutre', 'Chantier modifié');

                //return $this->redirectToRoute('macif_atelier_ateliers', array('id' => $id));
            }
        }
        return $this->render('PaysageBundle:Chantier:add-chantier.html.twig', array('form' => $form->createView(), 'chantier' => $chantier));
    }




    /**
     * @Route("/chantiers")
     */
    public function showChantiersAction()
    {

        $chantiers = $this->getDoctrine()
            ->getRepository('PaysageBundle:Chantier')
            ->findAll();

        if (!$chantiers) {
            throw $this->createNotFoundException(
                'Il n\'y a pas encore de chantier !'
            );
        }

        return  $this->render('index.html.twig', array('chantiers' => $chantiers));

    }



}