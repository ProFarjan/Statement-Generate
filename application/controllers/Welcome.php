<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once __DIR__ . '/../../vendor/autoload.php';

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function save()
	{
		// print_r('<pre>');
		// print_r($this->input->post());
		// die();


		$data = $this->input->post();
		// $this->load->view('statement_pdf', $data);

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
}
