<?php

namespace Ais\MahasiswaProfileBundle\Model;

Interface MahasiswaProfileInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set mahasiswaId
     *
     * @param integer $mahasiswaId
     *
     * @return MahasiswaProfile
     */
    public function setMahasiswaId($mahasiswaId);

    /**
     * Get mahasiswaId
     *
     * @return integer
     */
    public function getMahasiswaId();

    /**
     * Set statusPenerimaan
     *
     * @param string $statusPenerimaan
     *
     * @return MahasiswaProfile
     */
    public function setStatusPenerimaan($statusPenerimaan);

    /**
     * Get statusPenerimaan
     *
     * @return string
     */
    public function getStatusPenerimaan();

    /**
     * Set statusBayar
     *
     * @param string $statusBayar
     *
     * @return MahasiswaProfile
     */
    public function setStatusBayar($statusBayar);

    /**
     * Get statusBayar
     *
     * @return string
     */
    public function getStatusBayar();

    /**
     * Set prodi
     *
     * @param string $prodi
     *
     * @return MahasiswaProfile
     */
    public function setProdi($prodi);

    /**
     * Get prodi
     *
     * @return string
     */
    public function getProdi();

    /**
     * Set dosenWali
     *
     * @param integer $dosenWali
     *
     * @return MahasiswaProfile
     */
    public function setDosenWali($dosenWali);

    /**
     * Get dosenWali
     *
     * @return integer
     */
    public function getDosenWali();

    /**
     * Set namaAyah
     *
     * @param string $namaAyah
     *
     * @return MahasiswaProfile
     */
    public function setNamaAyah($namaAyah);

    /**
     * Get namaAyah
     *
     * @return string
     */
    public function getNamaAyah();

    /**
     * Set tanggalLahirAyah
     *
     * @param \DateTime $tanggalLahirAyah
     *
     * @return MahasiswaProfile
     */
    public function setTanggalLahirAyah($tanggalLahirAyah);

    /**
     * Get tanggalLahirAyah
     *
     * @return \DateTime
     */
    public function getTanggalLahirAyah();

    /**
     * Set pekerjaanAyah
     *
     * @param string $pekerjaanAyah
     *
     * @return MahasiswaProfile
     */
    public function setPekerjaanAyah($pekerjaanAyah);

    /**
     * Get pekerjaanAyah
     *
     * @return string
     */
    public function getPekerjaanAyah();

    /**
     * Set pendidikanAyah
     *
     * @param string $pendidikanAyah
     *
     * @return MahasiswaProfile
     */
    public function setPendidikanAyah($pendidikanAyah);

    /**
     * Get pendidikanAyah
     *
     * @return string
     */
    public function getPendidikanAyah();

    /**
     * Set emailAyah
     *
     * @param string $emailAyah
     *
     * @return MahasiswaProfile
     */
    public function setEmailAyah($emailAyah);

    /**
     * Get emailAyah
     *
     * @return string
     */
    public function getEmailAyah();

    /**
     * Set hpAyah
     *
     * @param string $hpAyah
     *
     * @return MahasiswaProfile
     */
    public function setHpAyah($hpAyah);

    /**
     * Get hpAyah
     *
     * @return string
     */
    public function getHpAyah();

    /**
     * Set namaIbu
     *
     * @param string $namaIbu
     *
     * @return MahasiswaProfile
     */
    public function setNamaIbu($namaIbu);

    /**
     * Get namaIbu
     *
     * @return string
     */
    public function getNamaIbu();

    /**
     * Set tanggalLahirIbu
     *
     * @param \DateTime $tanggalLahirIbu
     *
     * @return MahasiswaProfile
     */
    public function setTanggalLahirIbu($tanggalLahirIbu);

    /**
     * Get tanggalLahirIbu
     *
     * @return \DateTime
     */
    public function getTanggalLahirIbu();

    /**
     * Set pekerjaanIbu
     *
     * @param string $pekerjaanIbu
     *
     * @return MahasiswaProfile
     */
    public function setPekerjaanIbu($pekerjaanIbu);

    /**
     * Get pekerjaanIbu
     *
     * @return string
     */
    public function getPekerjaanIbu();

    /**
     * Set pendidikanIbu
     *
     * @param string $pendidikanIbu
     *
     * @return MahasiswaProfile
     */
    public function setPendidikanIbu($pendidikanIbu);

    /**
     * Get pendidikanIbu
     *
     * @return string
     */
    public function getPendidikanIbu();

    /**
     * Set emailIbu
     *
     * @param string $emailIbu
     *
     * @return MahasiswaProfile
     */
    public function setEmailIbu($emailIbu);

    /**
     * Get emailIbu
     *
     * @return string
     */
    public function getEmailIbu();

    /**
     * Set hpIbu
     *
     * @param string $hpIbu
     *
     * @return MahasiswaProfile
     */
    public function setHpIbu($hpIbu);

    /**
     * Get hpIbu
     *
     * @return string
     */
    public function getHpIbu();

    /**
     * Set alamatOrangTua
     *
     * @param string $alamatOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setAlamatOrangTua($alamatOrangTua);

    /**
     * Get alamatOrangTua
     *
     * @return string
     */
    public function getAlamatOrangTua();

    /**
     * Set provinsiOrangTua
     *
     * @param integer $provinsiOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setProvinsiOrangTua($provinsiOrangTua);

    /**
     * Get provinsiOrangTua
     *
     * @return integer
     */
    public function getProvinsiOrangTua();

    /**
     * Set kabupatenOrangTua
     *
     * @param integer $kabupatenOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setKabupatenOrangTua($kabupatenOrangTua);

    /**
     * Get kabupatenOrangTua
     *
     * @return integer
     */
    public function getKabupatenOrangTua();

    /**
     * Set kecamatanOrangTua
     *
     * @param integer $kecamatanOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setKecamatanOrangTua($kecamatanOrangTua);

    /**
     * Get kecamatanOrangTua
     *
     * @return integer
     */
    public function getKecamatanOrangTua();

    /**
     * Set kelurahanOrangTua
     *
     * @param integer $kelurahanOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setKelurahanOrangTua($kelurahanOrangTua);

    /**
     * Get kelurahanOrangTua
     *
     * @return integer
     */
    public function getKelurahanOrangTua();

    /**
     * Set kodePosOrangTua
     *
     * @param integer $kodePosOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setKodePosOrangTua($kodePosOrangTua);

    /**
     * Get kodePosOrangTua
     *
     * @return integer
     */
    public function getKodePosOrangTua();

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return MahasiswaProfile
     */
    public function setIsActive($isActive);

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive();

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     *
     * @return MahasiswaProfile
     */
    public function setIsDelete($isDelete);

    /**
     * Get isDelete
     *
     * @return boolean
     */
    public function getIsDelete();
}
