<?php

namespace Ais\MahasiswaProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ais\MahasiswaProfileBundle\Model\MahasiswaProfileInterface;
/**
 * MahasiswaProfile
 */
class MahasiswaProfile implements MahasiswaProfileInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $mahasiswa_id;

    /**
     * @var string
     */
    private $status_penerimaan;

    /**
     * @var string
     */
    private $status_bayar;

    /**
     * @var string
     */
    private $prodi;

    /**
     * @var integer
     */
    private $dosen_wali;

    /**
     * @var string
     */
    private $nama_ayah;

    /**
     * @var \DateTime
     */
    private $tanggal_lahir_ayah;

    /**
     * @var string
     */
    private $pekerjaan_ayah;

    /**
     * @var string
     */
    private $pendidikan_ayah;

    /**
     * @var string
     */
    private $email_ayah;

    /**
     * @var string
     */
    private $hp_ayah;

    /**
     * @var string
     */
    private $nama_ibu;

    /**
     * @var \DateTime
     */
    private $tanggal_lahir_ibu;

    /**
     * @var string
     */
    private $pekerjaan_ibu;

    /**
     * @var string
     */
    private $pendidikan_ibu;

    /**
     * @var string
     */
    private $email_ibu;

    /**
     * @var string
     */
    private $hp_ibu;

    /**
     * @var string
     */
    private $alamat_orang_tua;

    /**
     * @var integer
     */
    private $provinsi_orang_tua;

    /**
     * @var integer
     */
    private $kabupaten_orang_tua;

    /**
     * @var integer
     */
    private $kecamatan_orang_tua;

    /**
     * @var integer
     */
    private $kelurahan_orang_tua;

    /**
     * @var integer
     */
    private $kode_pos_orang_tua;

    /**
     * @var boolean
     */
    private $is_active;

    /**
     * @var boolean
     */
    private $is_delete;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set mahasiswaId
     *
     * @param integer $mahasiswaId
     *
     * @return MahasiswaProfile
     */
    public function setMahasiswaId($mahasiswaId)
    {
        $this->mahasiswa_id = $mahasiswaId;

        return $this;
    }

    /**
     * Get mahasiswaId
     *
     * @return integer
     */
    public function getMahasiswaId()
    {
        return $this->mahasiswa_id;
    }

    /**
     * Set statusPenerimaan
     *
     * @param string $statusPenerimaan
     *
     * @return MahasiswaProfile
     */
    public function setStatusPenerimaan($statusPenerimaan)
    {
        $this->status_penerimaan = $statusPenerimaan;

        return $this;
    }

    /**
     * Get statusPenerimaan
     *
     * @return string
     */
    public function getStatusPenerimaan()
    {
        return $this->status_penerimaan;
    }

    /**
     * Set statusBayar
     *
     * @param string $statusBayar
     *
     * @return MahasiswaProfile
     */
    public function setStatusBayar($statusBayar)
    {
        $this->status_bayar = $statusBayar;

        return $this;
    }

    /**
     * Get statusBayar
     *
     * @return string
     */
    public function getStatusBayar()
    {
        return $this->status_bayar;
    }

    /**
     * Set prodi
     *
     * @param string $prodi
     *
     * @return MahasiswaProfile
     */
    public function setProdi($prodi)
    {
        $this->prodi = $prodi;

        return $this;
    }

    /**
     * Get prodi
     *
     * @return string
     */
    public function getProdi()
    {
        return $this->prodi;
    }

    /**
     * Set dosenWali
     *
     * @param integer $dosenWali
     *
     * @return MahasiswaProfile
     */
    public function setDosenWali($dosenWali)
    {
        $this->dosen_wali = $dosenWali;

        return $this;
    }

    /**
     * Get dosenWali
     *
     * @return integer
     */
    public function getDosenWali()
    {
        return $this->dosen_wali;
    }

    /**
     * Set namaAyah
     *
     * @param string $namaAyah
     *
     * @return MahasiswaProfile
     */
    public function setNamaAyah($namaAyah)
    {
        $this->nama_ayah = $namaAyah;

        return $this;
    }

    /**
     * Get namaAyah
     *
     * @return string
     */
    public function getNamaAyah()
    {
        return $this->nama_ayah;
    }

    /**
     * Set tanggalLahirAyah
     *
     * @param \DateTime $tanggalLahirAyah
     *
     * @return MahasiswaProfile
     */
    public function setTanggalLahirAyah($tanggalLahirAyah)
    {
        $this->tanggal_lahir_ayah = $tanggalLahirAyah;

        return $this;
    }

    /**
     * Get tanggalLahirAyah
     *
     * @return \DateTime
     */
    public function getTanggalLahirAyah()
    {
        return $this->tanggal_lahir_ayah;
    }

    /**
     * Set pekerjaanAyah
     *
     * @param string $pekerjaanAyah
     *
     * @return MahasiswaProfile
     */
    public function setPekerjaanAyah($pekerjaanAyah)
    {
        $this->pekerjaan_ayah = $pekerjaanAyah;

        return $this;
    }

    /**
     * Get pekerjaanAyah
     *
     * @return string
     */
    public function getPekerjaanAyah()
    {
        return $this->pekerjaan_ayah;
    }

    /**
     * Set pendidikanAyah
     *
     * @param string $pendidikanAyah
     *
     * @return MahasiswaProfile
     */
    public function setPendidikanAyah($pendidikanAyah)
    {
        $this->pendidikan_ayah = $pendidikanAyah;

        return $this;
    }

    /**
     * Get pendidikanAyah
     *
     * @return string
     */
    public function getPendidikanAyah()
    {
        return $this->pendidikan_ayah;
    }

    /**
     * Set emailAyah
     *
     * @param string $emailAyah
     *
     * @return MahasiswaProfile
     */
    public function setEmailAyah($emailAyah)
    {
        $this->email_ayah = $emailAyah;

        return $this;
    }

    /**
     * Get emailAyah
     *
     * @return string
     */
    public function getEmailAyah()
    {
        return $this->email_ayah;
    }

    /**
     * Set hpAyah
     *
     * @param string $hpAyah
     *
     * @return MahasiswaProfile
     */
    public function setHpAyah($hpAyah)
    {
        $this->hp_ayah = $hpAyah;

        return $this;
    }

    /**
     * Get hpAyah
     *
     * @return string
     */
    public function getHpAyah()
    {
        return $this->hp_ayah;
    }

    /**
     * Set namaIbu
     *
     * @param string $namaIbu
     *
     * @return MahasiswaProfile
     */
    public function setNamaIbu($namaIbu)
    {
        $this->nama_ibu = $namaIbu;

        return $this;
    }

    /**
     * Get namaIbu
     *
     * @return string
     */
    public function getNamaIbu()
    {
        return $this->nama_ibu;
    }

    /**
     * Set tanggalLahirIbu
     *
     * @param \DateTime $tanggalLahirIbu
     *
     * @return MahasiswaProfile
     */
    public function setTanggalLahirIbu($tanggalLahirIbu)
    {
        $this->tanggal_lahir_ibu = $tanggalLahirIbu;

        return $this;
    }

    /**
     * Get tanggalLahirIbu
     *
     * @return \DateTime
     */
    public function getTanggalLahirIbu()
    {
        return $this->tanggal_lahir_ibu;
    }

    /**
     * Set pekerjaanIbu
     *
     * @param string $pekerjaanIbu
     *
     * @return MahasiswaProfile
     */
    public function setPekerjaanIbu($pekerjaanIbu)
    {
        $this->pekerjaan_ibu = $pekerjaanIbu;

        return $this;
    }

    /**
     * Get pekerjaanIbu
     *
     * @return string
     */
    public function getPekerjaanIbu()
    {
        return $this->pekerjaan_ibu;
    }

    /**
     * Set pendidikanIbu
     *
     * @param string $pendidikanIbu
     *
     * @return MahasiswaProfile
     */
    public function setPendidikanIbu($pendidikanIbu)
    {
        $this->pendidikan_ibu = $pendidikanIbu;

        return $this;
    }

    /**
     * Get pendidikanIbu
     *
     * @return string
     */
    public function getPendidikanIbu()
    {
        return $this->pendidikan_ibu;
    }

    /**
     * Set emailIbu
     *
     * @param string $emailIbu
     *
     * @return MahasiswaProfile
     */
    public function setEmailIbu($emailIbu)
    {
        $this->email_ibu = $emailIbu;

        return $this;
    }

    /**
     * Get emailIbu
     *
     * @return string
     */
    public function getEmailIbu()
    {
        return $this->email_ibu;
    }

    /**
     * Set hpIbu
     *
     * @param string $hpIbu
     *
     * @return MahasiswaProfile
     */
    public function setHpIbu($hpIbu)
    {
        $this->hp_ibu = $hpIbu;

        return $this;
    }

    /**
     * Get hpIbu
     *
     * @return string
     */
    public function getHpIbu()
    {
        return $this->hp_ibu;
    }

    /**
     * Set alamatOrangTua
     *
     * @param string $alamatOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setAlamatOrangTua($alamatOrangTua)
    {
        $this->alamat_orang_tua = $alamatOrangTua;

        return $this;
    }

    /**
     * Get alamatOrangTua
     *
     * @return string
     */
    public function getAlamatOrangTua()
    {
        return $this->alamat_orang_tua;
    }

    /**
     * Set provinsiOrangTua
     *
     * @param integer $provinsiOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setProvinsiOrangTua($provinsiOrangTua)
    {
        $this->provinsi_orang_tua = $provinsiOrangTua;

        return $this;
    }

    /**
     * Get provinsiOrangTua
     *
     * @return integer
     */
    public function getProvinsiOrangTua()
    {
        return $this->provinsi_orang_tua;
    }

    /**
     * Set kabupatenOrangTua
     *
     * @param integer $kabupatenOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setKabupatenOrangTua($kabupatenOrangTua)
    {
        $this->kabupaten_orang_tua = $kabupatenOrangTua;

        return $this;
    }

    /**
     * Get kabupatenOrangTua
     *
     * @return integer
     */
    public function getKabupatenOrangTua()
    {
        return $this->kabupaten_orang_tua;
    }

    /**
     * Set kecamatanOrangTua
     *
     * @param integer $kecamatanOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setKecamatanOrangTua($kecamatanOrangTua)
    {
        $this->kecamatan_orang_tua = $kecamatanOrangTua;

        return $this;
    }

    /**
     * Get kecamatanOrangTua
     *
     * @return integer
     */
    public function getKecamatanOrangTua()
    {
        return $this->kecamatan_orang_tua;
    }

    /**
     * Set kelurahanOrangTua
     *
     * @param integer $kelurahanOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setKelurahanOrangTua($kelurahanOrangTua)
    {
        $this->kelurahan_orang_tua = $kelurahanOrangTua;

        return $this;
    }

    /**
     * Get kelurahanOrangTua
     *
     * @return integer
     */
    public function getKelurahanOrangTua()
    {
        return $this->kelurahan_orang_tua;
    }

    /**
     * Set kodePosOrangTua
     *
     * @param integer $kodePosOrangTua
     *
     * @return MahasiswaProfile
     */
    public function setKodePosOrangTua($kodePosOrangTua)
    {
        $this->kode_pos_orang_tua = $kodePosOrangTua;

        return $this;
    }

    /**
     * Get kodePosOrangTua
     *
     * @return integer
     */
    public function getKodePosOrangTua()
    {
        return $this->kode_pos_orang_tua;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return MahasiswaProfile
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     *
     * @return MahasiswaProfile
     */
    public function setIsDelete($isDelete)
    {
        $this->is_delete = $isDelete;

        return $this;
    }

    /**
     * Get isDelete
     *
     * @return boolean
     */
    public function getIsDelete()
    {
        return $this->is_delete;
    }
}
