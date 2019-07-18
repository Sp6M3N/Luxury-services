<?php

namespace App\Form;

use App\Entity\Candidats;
use app\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\JobCategories;
use App\Form\JobCategoriesType;
use Symfony\Component\Form\FormTypeInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CandidatsType extends AbstractType
{
    /** @var ObjectManager */
    protected $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('gender')
            ->add('address')
            ->add('country')
            ->add('nationality')
            ->add('hasAPassport')
            ->add('passport')
            ->add('curriculumVitae')
            ->add('profilPicture')
            ->add('currentLocation')
            //->add('birthDate')
            ->add('placeOfBirth')
            ->add('availability')
            ->add('experience')
            ->add('shortDescription')
            ->add('notes')
            // ->add('createdDate')
            // ->add('uploadedDate')
            //->add('jobCategory', JobCategoriesType::class)
            ->add('jobCategory', ChoiceType::class, [
                'choices' => $this->getJobCategoriesChoices(),
            ])
            //->add('user')
            ->add('jobOffer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidats::class,
        ]);
        
    }

    private function getJobCategoriesChoices()
    {
        $jobCategories = $this->objectManager->getRepository(JobCategories::class)->findAll();
        $jobCategoriesByLabel = [];

        foreach($jobCategories as $jobCategory) {
            $jobCategoriesByLabel[$jobCategory->getJobCategory()] = $jobCategory->getId() ;
        }

        return $jobCategoriesByLabel;
    }
}