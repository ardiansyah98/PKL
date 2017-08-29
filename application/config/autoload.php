<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('form_validation','database','session');
$autoload['drivers'] = array();
$autoload['helper'] = array('url','file');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('M_login', 'M_karyawan', 'M_update','M_anggaran');