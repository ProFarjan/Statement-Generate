<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once __DIR__ . '/../../vendor/autoload.php';

class Welcome extends CI_Controller
{

	public function index()
	{
		
		$this->load->view('index');
	}

	public function home()
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
			'margin_footer' => 2,
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
		$mpdf->Output(str_replace(' ', '-', $this->input->post('name')).".pdf", 'I');
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
			'margin_top' => 24,
			'margin_bottom' => 30,
			'margin_header' => 2,
		]);
		// $this->load->view('brac_statement_pdf', $data);
		$content = $this->load->view('brac_statement_pdf', $data, true);
		$footerContent = $this->load->view('brac_statement_pdf_footer', $data, true);
		$footerPage = $this->load->view('brac_statement_pdf_footer_top', $data, true);
		$mpdf->SetHTMLHeader('<div style="padding: 0; margin: 0; border: none; text-align: left;"><img src="assets/images/brac_bank.png" width="376" style="margin: 0; padding: 0; border: none;" /></div>', 'o');
		$mpdf->SetHTMLFooter($footerPage);
		$mpdf->WriteHTML($content);
		// $mpdf->SetHTMLFooter($footerContent);
		$mpdf->Output(str_replace(' ', '-', $this->input->post('name')).".pdf", 'I');
	}

	public function ddbl_bank()
	{
		$this->load->view('ddbl_bank');
	}

	public function save_ddbl()
	{
		$data = $this->input->post();

		$mpdf = new Mpdf\Mpdf([
			'format' => [209.90, 297.03],
			'orientation' => 'P',
			'margin_left' => 0,
			'margin_right' => 0,
			'margin_top' => 6,
			'margin_bottom' => 10,
			'margin_footer' => 2,
		]);
		// $this->load->view('brac_statement_pdf', $data);

		$footerPage = $this->load->view('ddbl_statement_pdf_footer', $data, true);
		$mpdf->SetHTMLFooter($footerPage);

		$content = $this->load->view('ddbl_statement_pdf', $data, true);
		$mpdf->WriteHTML('<div style="widht:100%;padding: 0; margin: 0 0 20px 0; border: none; text-align: center;"><img src="assets/images/ddbl.png" width="420" style="margin: 0; padding: 0; border: none;" /></div>
			<div style="width: 100%;">
				<div style="width: 33.33%;height: 6px;background-color:#332f8e;float:left;"></div>
				<div style="width: 33.33%;height: 6px;background-color:#fe0000;float:left;"></div>
				<div style="width: 33.33%;height: 6px;background-color:#007e35;float:left;"></div>
			</div>');
		// $mpdf->SetAutoPageBreak(true, 0);
		$mpdf->WriteHTML($content);
		$mpdf->Output(str_replace(' ', '-', $this->input->post('name')).".pdf", 'I');
	}
}
