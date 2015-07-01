// Kisura/AppBundle/Entity/Register.php

namespace Kisura\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields="email", message="Email already taken")
 */
class Registration
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $username;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    protected $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max = 4096)
     */
    protected $plainPassword;

    /**
     * @ORM\Column(type="bool")
     * @Assert\Null()
     */
    protected $age_status;

    /**
    * Check if user is under 18. Simplified to only check year.
    *
    * @ORM\PrePersist()
    */
    public function prePersist()
    {
        $birthdate = new DateTime($this->birthday);
        $today = new DateTime('today');
        $age = $birthdate->diff($today)->$y;

        // If under 18 set age_status to TRUE else NULL(default).
        if ($age < 18) {
          $this->age_status = 1;
        }
    }

    /**
    * Send welcome email on successful user registration.
    *
    * @ORM\PostPersist()
    */
    public function postPersist()
    {
        // Simple php send using mail(). 
    }

    // Additional functions ...
}
