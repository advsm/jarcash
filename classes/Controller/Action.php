<?php

class Controller_Action extends Zend_Controller_Action
{
	public function preDispatch() 
	{
		if ($this->view instanceof Zend_View_Abstract) {
			$this->view->addHelperPath('View/Helper/', 'View_Helper');
			$this->view->addHelperPath('Helpers/', 'Helpers');
			
			$this->view->css = array();
			$this->view->js = array();
			
			$this->view->request = $this->_getAllParams();
			

		}
		$profile = Auth::getInstance()->getProfile();
		if ($profile instanceof ProfileRow) {
			$this->view->profile = $profile->toArray();
			$this->view->wallet = $profile->getProfileWalletRowByWalletId()->toArray();
		}		
		parent::preDispatch();
	}

    /**
     * Wrap for Zend_Controller_Router_Rewrite::assemble
     * Generates an url given the name of a route.
     *
     * @access public
     *
     * @param  array $urlOptions Options passed to the assemble method of the Route object.
     * @param  mixed $name The name of a Route to use. If null it will use the current Route
     * @param  bool $reset Whether or not to reset the route defaults with those provided
     * @return string Url for the link href attribute.
     */
	public function getUrl(array $urlOptions = array(), $name = null, $reset = false, $encode = true)
	{
		$router = $this->getFrontController()->getRouter();
		return $router->assemble($urlOptions, $name, $reset, $encode);
	}

	/**
	 * @return void
	 */
	protected function _disableView()
	{
		$this->_helper->layout()->disableLayout();
		$this->getFrontController()->setParam('noViewRenderer', true);
	}

	/**
	 * @return void
	 */
	protected function _disableLayout() 
	{
		$this->_helper->layout()->disableLayout();
	}	
	
	/**
	 * Отключает вывод всех отладочных данных
	 * @return void
	 */
	public function hideDebug() 
	{
		Debug::getInstance()->hideDebug();
	}
	
	/**
	 * Set JSON data to response body
	 *
	 * @param array $data
	 * @return void
	 */
	protected function _setJson($data)
	{
		$this->_disableView();
		if (!is_array($data)) {
			$data = array($data);
		}
		$this->getResponse()->setBody(Zend_Json::encode($data));
	}

	/**
	 * Throw exception for non ajax calls
	 *
	 * @return void
	 * @throws Exception
	 */
	protected function _ajaxOnly()
	{
		if (!Debug::getInstance()->isDebugMode() && !$this->getRequest()->isXmlHttpRequest()) {
			throw new Exception('This is AJAX-only action');
		}

		$this->_helper->layout()->disableLayout();
	}
	
	/**
     * Redirect to a route-based URL
     *
     * Uses route's assemble method tobuild the URL; route is specified by $name;
     * default route is used if none provided.
     *
     * @param  array $urlOptions Array of key/value pairs used to assemble URL
     * @param  string $name
     * @param  boolean $reset
     */
    protected function _goto(array $urlOptions = array(), $name = null, $reset = false)
    {
        $this->_helper->redirector->gotoRoute($urlOptions, $name, $reset);
    }
}