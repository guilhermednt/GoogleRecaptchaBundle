<?php

namespace Nietonfir\Google\ReCaptchaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Nietonfir\Google\ReCaptchaBundle\Validator\Constraints\ReCaptchaResponse;

class ReCaptchaType extends AbstractType
{
    private $sitekey;

    public function __construct($sitekey)
    {
        $this->sitekey = $sitekey;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'mapped' => false,
            'compound' => false,
            'attr' => array(
                'data-sitekey' => $this->sitekey,
                'class' => 'g-recaptcha'
            ),
            'constraints' => array(
                new ReCaptchaResponse(),
                new NotBlank()
            )
        ));
    }

    public function getName()
    {
        return 'recaptcha';
    }
}
