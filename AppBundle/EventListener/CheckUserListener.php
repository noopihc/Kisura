// Kisura/AppBundle/EventListener/CheckUserListener.php

namespace Kisura\AppBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class CheckUserListener
{  
  public function onKernelRequest(GetResponseEvent $event)
  {
    // Check if the user has "AUTHORIZED_USER" or "IS_AUTHENTICATED_REMEMBERED" roles.
    if ($this->isGranted('AUTHORIZED_USER') || $this->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      // Redirect user ...
    }
    else {
      // Redirect user to register page.
      
    }
  }
}