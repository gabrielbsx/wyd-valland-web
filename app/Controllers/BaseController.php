<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use App\Models\Configuration;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['recaptcha'];

	public $ingame = 'C:/New WYD/';
	public $dbsrv = 'DBSrv/run/';
	public $tmsrv = 'TMSrv/run/';
	public $common = 'Common/';
	public $accbase = 'C:/New WYD/DBSrv/base';

	public $data = [];
	public $rettype = 'web';

	public function __construct()
	{
		$config = new Configuration();
		$recaptcha = $config->select()->first();
		$recaptcha = $recaptcha['recaptcha_site'] ?? false;
		$secret = $recaptcha['recaptcha_secret'] ?? null;
		$this->data['recaptcha'] = $recaptcha;
		$this->data['recaptcha_secret'] = $secret;
	}

	public function initial($account)
	{
		$init = substr($account, 0, 1);
		if (preg_match('/^[a-zA-Z]$/', $init)) {
			return $init;
		} else {
			return 'etc';
		}
	}

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

}
