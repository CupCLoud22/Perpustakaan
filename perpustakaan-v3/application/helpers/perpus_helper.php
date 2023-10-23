<?php

	function tgl_indo($tgl){
        // $ubah = gmdate($tgl, time() + 60 + 60 + 8);
        $pecah = explode("-", $tgl);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }

    function tgl_short($tgl){
        // $ubah = gmdate($tgl, time() + 60 + 60 + 8);
        $pecah = explode("-", $tgl);
        $tanggal = $pecah[2];
        $bulan = bln($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }

    function bulan($bln){
        switch ($bln) {
        case 1:
            return 'Januari';
            break;

        case 2:
            return 'Februari';
            break;

        case 3:
            return 'Maret';
            break;

        case 4:
            return 'April';
            break;

        case 5:
            return 'Mei';
            break;

        case 6:
            return 'Juni';
            break;

        case 7:
            return 'Juli';
            break;

        case 8:
            return 'Agustus';
            break;

        case 9:
            return 'September';
            break;

        case 10:
            return 'Oktober';
            break;

        case 11:
            return 'November';
            break;
                  
        case 12:
            return 'Desember';
            break;
       	}
    }

    function bln($bln){
        switch ($bln) {
        case 1:
            return 'Jan';
            break;

        case 2:
            return 'Feb';
            break;

        case 3:
            return 'Mar';
            break;

        case 4:
            return 'Apr';
            break;

        case 5:
            return 'Mei';
            break;

        case 6:
            return 'Jun';
            break;

        case 7:
            return 'Jul';
            break;

        case 8:
            return 'Agu';
            break;

        case 9:
            return 'Sep';
            break;

        case 10:
            return 'Okt';
            break;

        case 11:
            return 'Nov';
            break;
                  
        case 12:
            return 'Des';
            break;
        }
    }

	function cek_akses($title=''){
		$ci = get_instance();
		if($ci->session->userdata('logged_in') != true){
			redirect('login');
		}else{
			$cek = $ci->db->get_where('tb_menu', array('menu_name' => $title))->row();
			$menuid = $cek->menu_id;
			$roleid = $ci->session->userdata('role_id');

			$cek_akses = $ci->db->get_where('tb_user_access', array('menu_id' => $menuid, 'role_id' => $roleid));
			if($cek_akses->num_rows() < 1){
				redirect('login/page_blocked');
			}
		}
	}

	function cek_role_akses($roleid, $menuid){
		$ci = get_instance();

		$ci->db->where('role_id', $roleid);
		$ci->db->where('menu_id', $menuid);
		$cek = $ci->db->get('tb_user_access');
		if($cek->num_rows() > 0){
			return "checked='checked'";
		}
	}