<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use CodeIgniter\RESTful\ResourceController;

class Absensi extends ResourceController
{
    private $bulan = [
        '01'    => 'JANUARI',
        '02'    => 'FEBRUARI',
        '03'    => 'MARET',
        '04'    => 'APRIL',
        '05'    => 'MEI',
        '06'    => 'JUNI',
        '07'    => 'JULI',
        '08'    => 'AGUSTUS',
        '09'    => 'SEPTEMBER',
        '10'    => 'OKTOBER',
        '11'    => 'NOVEMBER',
        '12'    => 'DESEMBER',
    ];

    function __construct()
    {
        $this->absensi = new AbsensiModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }

    public function settingjam()
    {
        $data = [
            'jamAbsen' => $this->absensi->getJamAbsen(),
        ];
        return view('admin/absensi/settingjam',$data);
    }
}
