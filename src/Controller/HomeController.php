<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\User;
use App\Form\ContactType;
use App\Repository\CenterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(Request $request, EntityManagerInterface $em)
    {

        $contact = new Contact();
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$contact` variable has also been updated
            $contact = $form->getData();

            $em->persist($contact);
            $em->flush();
            $this->addFlash('success', 'Votre message est envoyé');
            return $this->redirectToRoute('home', ['_fragment' => 'page-top']);
        }

        return $this->render('index.html.twig', [
        'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/mapinfo", name="mapinfo")
     */
    public function map(EntityManagerInterface $em, CenterRepository $centerRepository): Response
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        $agencies = $centerRepository->findAll();

        $datas = [];

        foreach ($agencies as $key => $agency) {
            $datas[$key]['id'] = $agency->getId();
            $datas[$key]['city'] = $agency->getCity();
            $datas[$key]['lat'] = $agency->getLat();
            $datas[$key]['lon'] = $agency->getLon();
            $datas[$key]['address'] = $agency->getAddress();
            $datas[$key]['schedule'] = $agency->getSchedule();

        }

        return new JsonResponse (['agences' => $datas]);
    }
}
