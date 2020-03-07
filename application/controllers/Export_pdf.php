<?php
class Export_pdf extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_kriteria');
    }

    public function index()
    {
        $pdf = new FPDF("P", "cm", "A4");

        $pdf->SetMargins(1.5, 1, 1);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Image('http://1.bp.blogspot.com/-dqPre_Vf7ug/TcUOavqrKqI/AAAAAAAAAUU/u1dxL9a_EUk/s1600/logo-kab-pekalongan.png', 1, 0.5, 2.5, 2.5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(7.5);
        $pdf->MultiCell(19.5, 0.5, 'PEMERINTAH KABUPATEN BATANG', 0, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(7.9);
        $pdf->MultiCell(19.5, 0.5, 'SMK MUHAMMADIYAH BATANG  ', 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(4);
        $pdf->MultiCell(19.5, 0.5, 'Desa Cepoko Kuning, Gg. Talangan, Batang. Telp. (0285) 3971184 Fax (0285) 3971184', 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetX(7.9);
        $pdf->MultiCell(19.5, 0.5, 'website : smkmuhammadiyahbatang.sch.id', 0, 'L');
        $pdf->Line(0, 3.1, 28.5, 3.1);
        $pdf->SetLineWidth(0.1);
        $pdf->Line(0, 3.2, 28.5, 3.2);
        $pdf->SetLineWidth(0);
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(18.5, 0.7, "Laporan Perangkingan Sistem Pendukung Keputusan Penerimaan Pelamar", 0, 10, 'C');
        $pdf->Cell(19.5, 0.7, "SMK Muhammadiyah Batang", 0, 10, 'C');
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(5, 0.7, "Di cetak pada : " . date("D-d/m/Y"), 0, 0, 'C');
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(2, 0.8, 'Pendidikan', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Pengalaman Kerja', 1, 0, 'C');
        $pdf->Cell(1.6, 0.8, 'kesehatan', 1, 0, 'C');
        $pdf->Cell(1, 0.8, 'Usia', 1, 0, 'C');
        $pdf->Cell(1.2, 0.8, 'Alamat', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Micro', 1, 0, 'C');
        $pdf->Cell(1.2, 0.8, 'Test IT', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Alquran & Arab', 1, 0, 'C');
        $pdf->Cell(2, 0.8, 'TPA Psikologi', 1, 0, 'C');
        $pdf->Cell(1, 0.8, 'Moral', 1, 0, 'C');

        $pdf->SetFont('Arial', '', 8);


        //  $kriteria = $this->db->get('kriteria')->result();
        //         foreach ($kriteria as $row){
        //  $pdf->ln();

        //     $pdf->Cell(2,0.8,$row->pend,1,0, 'C');
        //     $pdf->Cell(3,0.8,$row->peng_kerja,1,0, 'C');
        //     $pdf->Cell(1.6,0.8,$row->kesehatan,1,0, 'C');
        //     $pdf->Cell(1,0.8,$row->usia,1,0, 'C');
        //     $pdf->Cell(1.2,0.8,$row->alamat,1,0, 'C');
        //     $pdf->Cell(3,0.8,$row->micro,1,0, 'C');
        //     $pdf->Cell(1.2,0.8,$row->test_it,1,0, 'C');
        //     $pdf->Cell(3,0.8,$row->alquran_arab,1,0, 'C');
        //     $pdf->Cell(2,0.8,$row->tpa_psi,1,0, 'C');
        //     $pdf->Cell(1,0.8,$row->moral,1,0, 'C');
        // }

        $pdf->Output();
    }
}
