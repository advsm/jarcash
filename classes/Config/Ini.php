<?php

class Config_Ini extends Zend_Config_Ini
{
    /**
     * Modification of Zend_Config_Ini.
     * Local config merging adding.
     * Replace .ini on .local.ini in filename 
     * and try to merge existing config with local.
     * =====
     * Loads the section $section from the config file $filename for
     * access facilitated by nested object properties.
     *
     * If the section name contains a ":" then the section name to the right
     * is loaded and included into the properties. Note that the keys in
     * this $section will override any keys of the same
     * name in the sections that have been included via ":".
     *
     * If the $section is null, then all sections in the ini file are loaded.
     *
     * If any key includes a ".", then this will act as a separator to
     * create a sub-property.
     *
     * example ini file:
     *      [all]
     *      db.connection = database
     *      hostname = live
     *
     *      [staging : all]
     *      hostname = staging
     *
     * after calling $data = new Zend_Config_Ini($file, 'staging'); then
     *      $data->hostname === "staging"
     *      $data->db->connection === "database"
     *
     * The $options parameter may be provided as either a boolean or an array.
     * If provided as a boolean, this sets the $allowModifications option of
     * Zend_Config. If provided as an array, there are two configuration
     * directives that may be set. For example:
     *
     * $options = array(
     *     'allowModifications' => false,
     *     'nestSeparator'      => '->'
     *      );
     *
     * @param  string        $filename
     * @param  string|null   $section
     * @param  boolean|array $options
     * @throws Zend_Config_Exception
     * @return void
     */
    public function __construct($filename, $section = null, $options = false)
	{
		parent::__construct($filename, $section, $options);
		$filenameLocal = str_replace('.ini', '.local.ini', $filename);
		if (!is_readable($filenameLocal)) {
			return ;
		}
		
		$configLocal = new Zend_Config_Ini($filenameLocal, $section, $options);
		$this->merge($configLocal);
	}
}