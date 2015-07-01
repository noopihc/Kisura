// Kisura/AppBundle/Controller/DefaultController.php

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kisura\AppBundle\Entity\Register;
use Kisura\AppBundle\Form\Type\RegistrationType;

// Adds new user to database using Doctrine.
public function addUser()
{
    $entityManager = $this->getDoctrine()->getManager();

    $form = $this->createForm(new RegistrationType(), new Registration());
    $form->handleRequest($request);

    // Get and check form data.
    if ($form->isValid()) {
        $registration = $form->getData();

        // Insert user into database.
        $entityManager->persist($register);
        $entityManager->flush();

	// Redirect ...
    }
}