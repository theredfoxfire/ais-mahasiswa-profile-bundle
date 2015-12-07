<?php

namespace Ais\MahasiswaProfileBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use Ais\MahasiswaProfileBundle\Model\MahasiswaProfileInterface;
use Ais\MahasiswaProfileBundle\Form\MahasiswaProfileType;
use Ais\MahasiswaProfileBundle\Exception\InvalidFormException;

class MahasiswaProfileHandler implements MahasiswaProfileHandlerInterface
{
    private $om;
    private $entityClass;
    private $repository;
    private $formFactory;

    public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
    }

    /**
     * Get a MahasiswaProfile.
     *
     * @param mixed $id
     *
     * @return MahasiswaProfileInterface
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Get a list of MahasiswaProfiles.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0)
    {
        return $this->repository->findBy(array(), null, $limit, $offset);
    }

    /**
     * Create a new MahasiswaProfile.
     *
     * @param array $parameters
     *
     * @return MahasiswaProfileInterface
     */
    public function post(array $parameters)
    {
        $mahasiswa_profile = $this->createMahasiswaProfile();

        return $this->processForm($mahasiswa_profile, $parameters, 'POST');
    }

    /**
     * Edit a MahasiswaProfile.
     *
     * @param MahasiswaProfileInterface $mahasiswa_profile
     * @param array         $parameters
     *
     * @return MahasiswaProfileInterface
     */
    public function put(MahasiswaProfileInterface $mahasiswa_profile, array $parameters)
    {
        return $this->processForm($mahasiswa_profile, $parameters, 'PUT');
    }

    /**
     * Partially update a MahasiswaProfile.
     *
     * @param MahasiswaProfileInterface $mahasiswa_profile
     * @param array         $parameters
     *
     * @return MahasiswaProfileInterface
     */
    public function patch(MahasiswaProfileInterface $mahasiswa_profile, array $parameters)
    {
        return $this->processForm($mahasiswa_profile, $parameters, 'PATCH');
    }

    /**
     * Processes the form.
     *
     * @param MahasiswaProfileInterface $mahasiswa_profile
     * @param array         $parameters
     * @param String        $method
     *
     * @return MahasiswaProfileInterface
     *
     * @throws \Ais\MahasiswaProfileBundle\Exception\InvalidFormException
     */
    private function processForm(MahasiswaProfileInterface $mahasiswa_profile, array $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(new MahasiswaProfileType(), $mahasiswa_profile, array('method' => $method));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {

            $mahasiswa_profile = $form->getData();
            $this->om->persist($mahasiswa_profile);
            $this->om->flush($mahasiswa_profile);

            return $mahasiswa_profile;
        }

        throw new InvalidFormException('Invalid submitted data', $form);
    }

    private function createMahasiswaProfile()
    {
        return new $this->entityClass();
    }

}
