<?php

namespace Ais\MahasiswaProfileBundle\Handler;

use Ais\MahasiswaProfileBundle\Model\MahasiswaProfileInterface;

interface MahasiswaProfileHandlerInterface
{
    /**
     * Get a MahasiswaProfile given the identifier
     *
     * @api
     *
     * @param mixed $id
     *
     * @return MahasiswaProfileInterface
     */
    public function get($id);

    /**
     * Get a list of MahasiswaProfiles.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0);

    /**
     * Post MahasiswaProfile, creates a new MahasiswaProfile.
     *
     * @api
     *
     * @param array $parameters
     *
     * @return MahasiswaProfileInterface
     */
    public function post(array $parameters);

    /**
     * Edit a MahasiswaProfile.
     *
     * @api
     *
     * @param MahasiswaProfileInterface   $mahasiswa_profile
     * @param array           $parameters
     *
     * @return MahasiswaProfileInterface
     */
    public function put(MahasiswaProfileInterface $mahasiswa_profile, array $parameters);

    /**
     * Partially update a MahasiswaProfile.
     *
     * @api
     *
     * @param MahasiswaProfileInterface   $mahasiswa_profile
     * @param array           $parameters
     *
     * @return MahasiswaProfileInterface
     */
    public function patch(MahasiswaProfileInterface $mahasiswa_profile, array $parameters);
}
