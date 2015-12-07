<?php

namespace Ais\MahasiswaProfileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MahasiswaProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mahasiswa_id')
            ->add('status_penerimaan')
            ->add('status_bayar')
            ->add('prodi')
            ->add('dosen_wali')
            ->add('nama_ayah')
            ->add('tanggal_lahir_ayah')
            ->add('pekerjaan_ayah')
            ->add('pendidikan_ayah')
            ->add('email_ayah')
            ->add('hp_ayah')
            ->add('nama_ibu')
            ->add('tanggal_lahir_ibu')
            ->add('pekerjaan_ibu')
            ->add('pendidikan_ibu')
            ->add('email_ibu')
            ->add('hp_ibu')
            ->add('alamat_orang_tua')
            ->add('provinsi_orang_tua')
            ->add('kabupaten_orang_tua')
            ->add('kecamatan_orang_tua')
            ->add('kelurahan_orang_tua')
            ->add('kode_pos_orang_tua')
            ->add('is_active')
            ->add('is_delete')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ais\MahasiswaProfileBundle\Entity\MahasiswaProfile',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return '';
    }
}
