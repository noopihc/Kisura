// Kisura/AppBundle/Form/Type/RegistrationType.php

namespace Kisura\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    // Build form fields
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'username');
        $builder->add('birthday', 'birthday');
        $builder->add('email', 'email');
        $builder->add('password', 'password');
        $builder->add('Register', 'submit');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kisura\AppBundle\Entity\Register'
        ));
    }
}