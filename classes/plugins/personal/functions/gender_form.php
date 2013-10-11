<?php

function Dwoo_Plugin_gender_form(Dwoo $dwoo, $gender, $form1, $form2)
{
	return ($gender==2) ? $form2 : $form1;
}
