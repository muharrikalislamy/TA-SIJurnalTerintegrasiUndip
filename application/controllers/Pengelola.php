<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengelola extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_home');
		$this->load->model('M_jurnal');
		$this->load->model('M_fakultas');
		$this->load->model('M_departemen');
		$this->load->model('M_lab');
		$this->load->model('M_lembaga');
		$this->load->model('M_penilaian_alternatif');
		$this->load->model('M_jurnal_pengelola');
		$this->load->model('M_home');
		$this->load->model('M_jp');
		$this->load->model('M_pengindeks');
		$this->load->model('M_grafik');


		if ($this->session->userdata('permission') != "pengelola") {
			redirect("cekpermission");
		}
	}

	function random_color_part()
	{
		return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
	}

	function random_color()
	{
		return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}

	function index()
	{
		// var_dump($this->session->userdata('id'));
		// die();
		// $id =  $this->uri->segment(3);
		// $data['record'] =  $this->M_auth->ambil_id_user($id)->row_array();
		$data['a'] = $this->session->userdata('id_user');
		$data['kriteria'] = $this->M_home->tampil_data_kriteria()->result();
		$data['alternatif'] = $this->M_home->ambil_alternatif_rank()->result();
		$data['userCount'] = $this->M_home->get_user_count();
		$data['kriteriaCount'] = $this->M_home->get_kriteria_count();
		$data['indikatorCount'] = $this->M_home->get_indikator_count();
		$data['alternatifCount'] = $this->M_home->get_alternatif_count();
		$data['alternatifbelum'] = $this->M_penilaian_alternatif->tampil_data_alternatif_belum()->result();
		$data['jurnalpengelola'] = $this->M_jurnal_pengelola->ambil_data_jurnal();
		$data['jurnal'] = $this->M_jurnal->ambil_jurnal();
		$data['jurnalCount'] = $this->M_home->get_jurnal_count();
		$data['jurnalakreditasipertahun'] = $this->M_home->ambil_jurnal_akreditasi_pertahun();
		$data["graphDataJurnalAkreditasiByPenerbitSinta"] = $this->getGraphDataJurnalAkreditasiByPenerbitSinta();
		$data["graphDataJurnalAkreditasiByPenerbitSintaByTahun"] = $this->getGraphDataJurnalAkreditasiByPenerbitSintaByTahun();
		$data["graphDataJurnalAkreditasiPerTahun"] = $this->getGraphDataJurnalAkreditasiPerTahun();

		$graphpiejurnalfakultas = array();
		foreach ($data['jurnalCount'] as $key => $value) {
			$color = "#" . $this->random_color();
			array_push($graphpiejurnalfakultas, [
				'value' => $value->count,
				'color' => $color,
				'highlight' => $color,
				'label' => $value->peringkat_sinta
			]);
		}
		$data['bobotGraphPieJurnalFakultas'] = json_encode($graphpiejurnalfakultas);

		$this->load->view('v_home_pengelola', $data);
	}

	function getGraphDataJurnalAkreditasiPerTahun()
	{
		$counts = array();
		$tahun = array();

		$count = $this->M_home->ambil_jurnal_akreditasi_pertahun();
		foreach ($count as $key => $value) {
			array_push($counts, (int) $value->count);
			array_push($tahun, $value->tahun);
		}

		$data = array(
			'count' => $counts,
			'tahun' => $tahun
		);

		return json_encode((object) $data);
	}

	public function edit_jurnal() //edit data jurnal
	{
		$id =  $this->uri->segment(3);
		$data['jurnal'] =  $this->M_jurnal->ambil_jurnal();
		$data['record'] =  $this->M_jurnal->get_kode_jurnal($id)->row_array();
		$data['pengindeks'] = $this->M_jurnal->ambil_data_pengindeks();
		$data['pengelola'] = $this->M_jurnal->ambil_data_pengelola();
		$data['sk'] = $this->M_jurnal->ambil_data_sk();
		$data['portal'] = $this->M_jurnal->ambil_data_portal();
		$data['pengelola'] = $this->M_jurnal->ambil_data_pengelola();
		$data['fakultas'] = $this->M_fakultas->ambil_fakultas();
		$data['departemen'] = $this->M_departemen->ambil_departemen();
		$data['lab'] = $this->M_lab->ambil_lab();
		$data['lembaga'] = $this->M_lembaga->ambil_lembaga();

		$this->load->view('v_edit_jurnal_pengelola', $data);
	}

	public function add_jurnal_pengindeks() //edit data jurnal
	{
		$id =  $this->uri->segment(3);
		$data['id'] = $id;
		$data['jp'] = $this->M_jp->ambil_jp();
		$data['pengindeks'] = $this->M_pengindeks->tampil_data_pengindeks()->result();
		$data['jurnal'] = $this->M_jurnal->tampil_data_jurnal()->result();
		$data['record'] =  $this->M_jurnal->get_kode_jurnal($id)->row_array();

		$this->load->view('v_add_pengindeks_pengelola', $data);
	}

	public function submit_jurnal_pengindeks() //tambah data pengindeks
	{
		if (
			!empty($this->input->post('inputnamapengindeks'))
			&& !empty($this->input->post('inputkategori'))
			&& !empty($this->input->post('inputjurnal'))
			&& !empty($this->input->post('inputurl'))
			&& !empty($this->input->post('inputketerangan'))

		) {
			if ($this->M_jp->add_jp(array(
				'kode_pengindeks' => $this->input->post('inputnamapengindeks'),
				'kategori' => $this->input->post('inputkategori'),
				'kode_jurnal' => $this->input->post('inputjurnal'),
				'url_pengindeks' => $this->input->post('inputurl'),
				'keterangan' => $this->input->post('inputketerangan'),

			))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('datapengelola-jurnal');
			}
		}
	}


	public function delete_jp_pengelola($id)
	{
		$this->db->where('kode_jp', $id);
		$this->db->delete('jurnal_pengindeks');
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('datapengelola-jurnal');
	}



	public function update_jurnal_pengelola() //update data jurnal
	{
		$kode = $this->input->post('kode');
		$data = array(
			'judul' => $this->input->post('judul'),
			'singkatan' => $this->input->post('singkatan'),
			'nomor_jurnal' => $this->input->post('nomorjurnal'),
			'nama_fakultas' => $this->input->post('fakultas'),
			'nama_departemen' => $this->input->post('departemen'),
			'nama_lab' => $this->input->post('lab'),
			'nama_lembaga' => $this->input->post('lembaga'),
			'nama_portal' => $this->input->post('portal'),
			'url' => $this->input->post('urlportal'),
			'sponsor' => $this->input->post('sponsor'),
			'id_user' => $this->input->post('pengelola'),
			'p_issn' => $this->input->post('pissn'),
			'e_issn' => $this->input->post('eissn'),
			'english' => $this->input->post('english'),
			'mpgundip' => $this->input->post('mpgundip'),
			'doi' => $this->input->post('doi'),
			'tahun_mulai' => $this->input->post('thnmulai'),
			'bln_terbit' => implode(",", $this->input->post('blnterbit')),
			'terbit_terakhir' => $this->input->post('terbitakhir'),
			'no_terakhir' => $this->input->post('noterakhir'),
		);

		$this->M_jurnal->update_jurnal($data, $kode);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('datapengelola-jurnal');
	}



	function getGraphDataJurnalAkreditasiByPenerbitSintaByTahun()
	{
		$sinta = ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'];
		$sk = $this->M_home->ambil_jurnal_akreditasi_pertahun();
		$bySK = $this->M_grafik->countJurnalAkreditasiBySintaByTahun();
		$categories = array();
		$resultSeries = array();

		foreach ($sk as $v) {
			array_push($categories, $v->tahun);
		}

		for ($i = 0; $i < count($sinta); $i++) {
			array_push($resultSeries, ['name' => $sinta[$i]]);
		}

		for ($x = 0; $x < count($categories); $x++) {
			foreach ($bySK as $aa) {
				for ($in = 0; $in < count($sinta); $in++) {
					if ($aa->tahun == $categories[$x] && $aa->sinta == $sinta[$in]) {
						$resultSeries[$in]['data'][$x] = (int) $aa->jumlah;
					} else {
						if (empty($resultSeries[$in]['data'][$x])) $resultSeries[$in]['data'][$x] = 0;
					}
				}
			}
		}

		return json_encode([
			'categories' => $categories,
			'series' => $resultSeries
		]);
	}

	function getGraphDataJurnalAkreditasiByPenerbitSinta()
	{
		$sinta = ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'];
		$faks = $this->M_fakultas->ambil_fakultas();
		$byFakultas = $this->M_grafik->countJurnalAkreditasiByFakultas();
		$categories = array();
		$resultSeries = array();

		foreach ($faks as $v) {
			array_push($categories, $v->nama);
		}

		for ($i = 0; $i < count($sinta); $i++) {
			array_push($resultSeries, ['name' => $sinta[$i]]);
		}

		for ($x = 0; $x < count($categories); $x++) {
			$bool = true;
			foreach ($byFakultas as $fakultas) {
				if ($bool) {
					for ($in = 0; $in < count($sinta); $in++) {
						if ($fakultas->fakultas == $categories[$x] && $fakultas->sinta == $sinta[$in]) {
							$resultSeries[$in]['data'][$x] = (int) $fakultas->jumlah;
							$bool = false;
						} else {
							$resultSeries[$in]['data'][$x] = 0;
						}
					}
				} else {
					break;
				}
			}
		}

		return json_encode([
			'categories' => $categories,
			'series' => $resultSeries
		]);
	}
}
