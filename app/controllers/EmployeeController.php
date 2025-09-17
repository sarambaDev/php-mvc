<?php
// app/controllers/EmployeeController.php

require_once __DIR__ . '/../models/EmployeeModel.php';

class EmployeeController
{
    /**
     * Tampilkan halaman karyawan (list, form edit, delete, save edit)
     */
    public function index($conn)
    {
        // Di dalam employees.php, sudah ada:
        // - logic POST untuk save_edit
        // - logic GET untuk delete & edit
        // - tampilan list & form edit
        include __DIR__ . '/../views/pages/employees.php';
    }
}
