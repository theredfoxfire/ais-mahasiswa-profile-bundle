<?php

namespace Ais\MahasiswaProfileBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;

use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Ais\MahasiswaProfileBundle\Exception\InvalidFormException;
use Ais\MahasiswaProfileBundle\Form\MahasiswaProfileType;
use Ais\MahasiswaProfileBundle\Model\MahasiswaProfileInterface;


class MahasiswaProfileController extends FOSRestController
{
    /**
     * List all mahasiswa_profiles.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing mahasiswa_profiles.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many mahasiswa_profiles to return.")
     *
     * @Annotations\View(
     *  templateVar="mahasiswa_profiles"
     * )
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getMahasiswaProfilesAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $offset = null == $offset ? 0 : $offset;
        $limit = $paramFetcher->get('limit');

        return $this->container->get('ais_mahasiswa_profile.mahasiswa_profile.handler')->all($limit, $offset);
    }

    /**
     * Get single MahasiswaProfile.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a MahasiswaProfile for a given id",
     *   output = "Ais\MahasiswaProfileBundle\Entity\MahasiswaProfile",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the mahasiswa_profile is not found"
     *   }
     * )
     *
     * @Annotations\View(templateVar="mahasiswa_profile")
     *
     * @param int     $id      the mahasiswa_profile id
     *
     * @return array
     *
     * @throws NotFoundHttpException when mahasiswa_profile not exist
     */
    public function getMahasiswaProfileAction($id)
    {
        $mahasiswa_profile = $this->getOr404($id);

        return $mahasiswa_profile;
    }

    /**
     * Presents the form to use to create a new mahasiswa_profile.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View(
     *  templateVar = "form"
     * )
     *
     * @return FormTypeInterface
     */
    public function newMahasiswaProfileAction()
    {
        return $this->createForm(new MahasiswaProfileType());
    }
    
    /**
     * Presents the form to use to edit mahasiswa_profile.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "AisMahasiswaProfileBundle:MahasiswaProfile:editMahasiswaProfile.html.twig",
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the mahasiswa_profile id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when mahasiswa_profile not exist
     */
    public function editMahasiswaProfileAction($id)
    {
		$mahasiswa_profile = $this->getMahasiswaProfileAction($id);
		
        return array('form' => $this->createForm(new MahasiswaProfileType(), $mahasiswa_profile), 'mahasiswa_profile' => $mahasiswa_profile);
    }

    /**
     * Create a MahasiswaProfile from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new mahasiswa_profile from the submitted data.",
     *   input = "Ais\MahasiswaProfileBundle\Form\MahasiswaProfileType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "AisMahasiswaProfileBundle:MahasiswaProfile:newMahasiswaProfile.html.twig",
     *  statusCode = Codes::HTTP_BAD_REQUEST,
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|View
     */
    public function postMahasiswaProfileAction(Request $request)
    {
        try {
            $newMahasiswaProfile = $this->container->get('ais_mahasiswa_profile.mahasiswa_profile.handler')->post(
                $request->request->all()
            );

            $routeOptions = array(
                'id' => $newMahasiswaProfile->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_mahasiswa_profile', $routeOptions, Codes::HTTP_CREATED);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Update existing mahasiswa_profile from the submitted data or create a new mahasiswa_profile at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "Ais\MahasiswaProfileBundle\Form\MahasiswaProfileType",
     *   statusCodes = {
     *     201 = "Returned when the MahasiswaProfile is created",
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "AisMahasiswaProfileBundle:MahasiswaProfile:editMahasiswaProfile.html.twig",
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the mahasiswa_profile id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when mahasiswa_profile not exist
     */
    public function putMahasiswaProfileAction(Request $request, $id)
    {
        try {
            if (!($mahasiswa_profile = $this->container->get('ais_mahasiswa_profile.mahasiswa_profile.handler')->get($id))) {
                $statusCode = Codes::HTTP_CREATED;
                $mahasiswa_profile = $this->container->get('ais_mahasiswa_profile.mahasiswa_profile.handler')->post(
                    $request->request->all()
                );
            } else {
                $statusCode = Codes::HTTP_NO_CONTENT;
                $mahasiswa_profile = $this->container->get('ais_mahasiswa_profile.mahasiswa_profile.handler')->put(
                    $mahasiswa_profile,
                    $request->request->all()
                );
            }

            $routeOptions = array(
                'id' => $mahasiswa_profile->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_mahasiswa_profile', $routeOptions, $statusCode);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Update existing mahasiswa_profile from the submitted data or create a new mahasiswa_profile at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "Ais\MahasiswaProfileBundle\Form\MahasiswaProfileType",
     *   statusCodes = {
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "AisMahasiswaProfileBundle:MahasiswaProfile:editMahasiswaProfile.html.twig",
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the mahasiswa_profile id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when mahasiswa_profile not exist
     */
    public function patchMahasiswaProfileAction(Request $request, $id)
    {
        try {
            $mahasiswa_profile = $this->container->get('ais_mahasiswa_profile.mahasiswa_profile.handler')->patch(
                $this->getOr404($id),
                $request->request->all()
            );

            $routeOptions = array(
                'id' => $mahasiswa_profile->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_mahasiswa_profile', $routeOptions, Codes::HTTP_NO_CONTENT);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Fetch a MahasiswaProfile or throw an 404 Exception.
     *
     * @param mixed $id
     *
     * @return MahasiswaProfileInterface
     *
     * @throws NotFoundHttpException
     */
    protected function getOr404($id)
    {
        if (!($mahasiswa_profile = $this->container->get('ais_mahasiswa_profile.mahasiswa_profile.handler')->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
        }

        return $mahasiswa_profile;
    }
    
    public function postUpdateMahasiswaProfileAction(Request $request, $id)
    {
		try {
            $mahasiswa_profile = $this->container->get('ais_mahasiswa_profile.mahasiswa_profile.handler')->patch(
                $this->getOr404($id),
                $request->request->all()
            );

            $routeOptions = array(
                'id' => $mahasiswa_profile->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_mahasiswa_profile', $routeOptions, Codes::HTTP_NO_CONTENT);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
	}
}
