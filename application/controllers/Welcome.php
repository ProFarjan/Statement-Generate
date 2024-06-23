<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once __DIR__ . '/../../vendor/autoload.php';

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function save()
	{
		$data = $this->input->post();

		$mpdf = new Mpdf\Mpdf([
			'format' => [215.9, 279.4],
			'orientation' => 'P',
			'margin_left' => 12,
			'margin_right' => 12,
			'margin_top' => 10,
			'margin_bottom' => 16,
		]);
		$content = $this->load->view('statement_pdf', $data, true);
		$footerContent = $this->load->view('statement_pdf_footer', $data, true);

		$footerPage = '
		<div style="text-align: right; font-size: 10px;">
			{PAGENO}/{nb}
		</div>
		';

		$mpdf->SetHTMLFooter($footerPage);
		$mpdf->WriteHTML($content);
		$mpdf->SetHTMLFooter($footerContent);
		$mpdf->Output("ef7bbbf8-48f2-49be-b6e0-76e7fdc8b285.pdf", 'I');
	}

	public function brac_bank()
	{
		$this->load->view('brac_bank');
	}

	public function save_brac()
	{
		$data = $this->input->post();

		$mpdf = new Mpdf\Mpdf([
			'format' => [209.93, 297.05],
			'orientation' => 'P',
			'margin_left' => 6,
			'margin_right' => 6,
			'margin_top' => 2.5,
			'margin_bottom' => 2.5,
		]);
		// $this->load->view('brac_statement_pdf', $data);
		$content = $this->load->view('brac_statement_pdf', $data, true);
		// // $footerContent = $this->load->view('brac_statement_pdf_footer', $data, true);

		// // $footerPage = '
		// // <div style="text-align: right; font-size: 10px;">
		// // 	{PAGENO}/{nb}
		// // </div>
		// // ';

		// // // $mpdf->SetHTMLFooter($footerPage);
		$mpdf->WriteHTML($content);
		// // // $mpdf->SetHTMLFooter($footerContent);
		$mpdf->Output("ef7bbbf8-48f2-49be-b6e0-76e7fdc8b285.pdf", 'I');
	}
}
