<?php

class Image_Resource_Url extends Image_Resource
{
	/**
	 * Send HTTP request and return body content.
	 *
	 * @see classes/Image/Image_Resource#getContent()
	 * @return string
	 */
	public function getContent()
	{
		$uri = $this->getName();
		$uri = str_replace(' ', '%20', $uri);
		try {
			$uri = Zend_Uri::factory($uri);

			$config = array(
		        'maxredirects'    => 0,
		        'strictredirects' => true,
		        'timeout'         => 1,
		        'storeresponse'   => true,
		        'strict'          => true
			);

			$client = new Zend_Http_Client($uri);
			$response = $client->request();

			$contentType = $response->getHeader('Content-Type');
			if (!strstr($contentType, 'image')) {
				throw new Image_Exception('Content-Type from responsed page is not an image: ' . $contentType);
			}

			$body = $response->getBody();
			if (!$body) {
				throw new Image_Exception('Body for image is empty: ' . $uri);
			}

			return $body;
		} catch (Zend_Uri_Exception $e) {

		} catch (Zend_Http_Exception $e) {

		}

		throw new Image_Exception('Cant get file content via http:' . $e->getMessage());
	}
}