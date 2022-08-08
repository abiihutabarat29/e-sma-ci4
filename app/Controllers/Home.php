<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Home',
			'isi' => 'home'
		);
		return view('layout/wrapper', $data);
	}

	//--------------------------------------------------------------------

}
