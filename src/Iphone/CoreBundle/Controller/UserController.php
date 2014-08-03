<?php

namespace Iphone\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function listAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $userRepository = $entityManager->getRepository('Iphone\CoreBundle\Domain\User\User');

        $users = $userRepository->findAll();

        return $this->render(
            'IphoneCoreBundle:User:list.html.twig',
            array('users' => $users)
        );
    }

    public function incidentsByUserAction($username)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $userRepository = $entityManager->getRepository('Iphone\CoreBundle\Domain\User\User');

        $user = $userRepository->findByUsername($username);

        return $this->render(
            'IphoneCoreBundle:User:incidents.html.twig',
            array('user' => $user)
        );
    }

    public function friendsByUserAction($username)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $userRepository = $entityManager->getRepository('Iphone\CoreBundle\Domain\User\User');

        $user = $userRepository->findByUsername($username);

        return $this->render(
            'IphoneCoreBundle:User:friends.html.twig',
            array('user' => $user)
        );
    }
}
