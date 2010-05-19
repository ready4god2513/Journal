<?php

class form extends form_Core
{
	
	
	/**
	  * Allow for ajax forms
	  * @Developer brandon
	  * @Date May 10, 2010
	  */
	public static function open_ajax($url = NULL, $options = array())
	{
		$options = array_merge($options, array('class' => 'ajax_enabled_form'));
		return form::open($url, $options);
	}
	
	
	/**
	 * Display a "required" star next to the form field
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return (string)
	 */
	public static function required()
	{
		return ' <span class="requiredField">*</span>';
	}
	
	
	/**
	  * Redirect override
	  * @Developer brandon
	  * @Date Apr 22, 2010
	  */
	public static function redirect_after($url)
	{
		return form::hidden('redirect_override', $url);
	}
	
	
	/**
	  * Create a tinyMCE textarea
	  * @Developer brandon
	  * @Date Apr 20, 2010
	  * @Param (string) $name
	  * @Param (string) $value
	  * @Return (string)
	  */
	public static function tinyMCE($name, $value = NULL)
	{
		return form::textarea(array('name' => $name, 'value' => $value, 'class' => 'mceEditor', 'style' => 'width:500px; height:300px'));
	}
	
	
	/**
	  * Create a many-to-many checkbox
	  * @Developer brandon
	  * @Date Apr 21, 2010
	  * @Param (object) $primary_model
	  * @Param (array) $secondary_models
	  * @Param (string) $property
	  * @Param (string) $display_field_name
	  */
	public static function many_to_many($primary_model, $secondary_models, $property, $display_field_name = 'name', $type = 'inline')
	{
		$return = '';
		$return .= form::hidden($property, 'NULL');
		
		if($type == 'table')
		{
			$return .= '<table class="defaultTable">';
		}
		
		foreach($secondary_models as $secondary_model)
		{
			if($type == 'table')
			{
				$return .= '<tr><td>';
			}
			
			$return .= form::checkbox($property . '[]', $secondary_model->id, in_array($secondary_model->id, $primary_model->$property->primary_key_array()));
			$return .= $secondary_model->$display_field_name;
			
			if($type == 'table')
			{
				$return .= '</td></tr>';
			}
		}
		
		
		if($type == 'table')
		{
			$return .= '</table>';
		}
		
		return $return;
	}
	
	
	/**
	 * Return an array that can be used in the drop down for selecting credit card months
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return (array)
	 */
	public static function month_array() 
	{
		$array = array(' - - Select One - - ');
		for ($i = 1; $i <= 12; $i++) 
		{
			$array[date('m', strtotime(date('Y-') . $i . '-1'))] = date('m F', strtotime(date('Y-') . $i . '-1'));
		}
		return $array;
	}

	
	/**
	 * Return an array that can be used in the drop down for selecting credit card years
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return (array)
	 */
	public static function year_array() 
	{
		$array = array(' - - Select One - - ');
		for ($i = date('Y'); $i < (date('Y') + 10); $i++) 
		{
			$array[$i] = $i;
		}
		return $array;
	}

	
	/**
	 * Return an array of the credit card types that iBethel.tv supports
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return (array)
	 */
	public static function card_type_array() 
	{
		return array(
			'' => ' - - Select One - - ',
			'VISA' => 'Visa',
			'MC' => 'Mastercard',
			'AMEX' => 'American Express',
			'DSCV' => 'Discover'
		);
	}
	
	
	/**
	  * Day of the week
	  * @Developer brandon
	  * @Date Apr 27, 2010
	  */
	public static function dow()
	{
		return array(
			0 => 'Sunday',
			1 => 'Monday',
			2 => 'Tuesday',
			3 => 'Wednesday',
			4 => 'Thursday',
			5 => 'Friday',
			6 => 'Saturday'
		);
	}
	
	
	/**
	 * List of all of the states and their abbreviations
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return (array)
	 */
	public static function states()
	{
		$state_value = array('none', 'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY');
		$state_display = array('Out of the USA', 'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming');
		foreach ($state_value as $n=>$value) 
		{
			$state_array[$value] = $state_display[$n];
		}
		return $state_array;
	}
	
	
	/**
	 * List of all of the countries and their abbreviations
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return (array)
	 */
	public static function countries()
	{
		$country_display = array('United States of America ','Canada ','Germany ','France ','United Kingdom ','India ','--------------------- ','Afghanistan ','Albania ','Algeria ','American Samoa ','Andorra ','Angola ','Anguilla ','Antarctica ','Antigua and Barbuda ','Argentina ','Armenia ','Aruba ','Australia ','Austria ','Azerbaijan ','Bahamas ','Bahrain ','Bangladesh ','Barbados ','Belarus ','Belgium ','Belize ','Benin ','Bermuda ','Bhutan ','Bolivia ','Bosnia and Herzegowina ','Botswana ','Bouvet Island ','Brazil ','British Indian Ocean Territory ','Brunei Darussalam ','Bulgaria ','Burkina Faso ','Burundi ','Cambodia ','Cameroon ','Cape Verde ','Cayman Islands ','Central African Republic ','Chad ','Chile ','China ','Christmas Island ','Cocoa (Keeling) Islands ','Colombia ','Comoros ','Congo ','Cook Islands ','Costa Rica ','Cote Divoire ','Croatia (local name: Hrvatska) ','Cuba ','Cyprus ','Czech Republic ','Denmark ','Djibouti ','Dominica ','Dominican Republic ','East Timor ','Ecuador ','Egypt ','El Salvador ','Equatorial Guinea ','Eritrea ','Estonia ','Ethiopia ','Falkland Islands (Malvinas) ','Faroe Islands ','Fiji ','Finland ','France, Metropolitan ','French Guiana ','French Polynesia ','French Southern Territories ','Gabon ','Gambia ','Georgia ','Ghana ','Gibraltar ','Greece ','Greenland ','Grenada ','>Guadeloupe ','Guam ','Guatemala ','Guinea ','Guinea-Bissau ','Guyana ','Haiti ','Heard and Mc Donald Islands ','Honduras ','Hong Kong ','Hungary ','Iceland ','Indonesia ','Iran (Islamic Republic of) ','Iraq ','Ireland ','Israel ','Italy ','Jamaica ','Japan ','Jordan ','Kazakhstan ','Kenya ','Kiribati ','Korea, Democratic Peoples Republic of ','Korea, Republic of ','Kuwait ','Kyrgyzstan ','Lao Peoples Democratic Republic ','Latvia ','Lebanon ','Lesotho ','Liberia ','Libyan Arab Jamahiriya ','Liechtenstein ','Lithuania ','Luxembourg ','Macau ','Macedonia, The Former Yugoslav Republic of ','Madagascar ','Malawi ','Malaysia ','Maldives ','Mali ','Malta ','Marshall Islands ','Martinique ','Mauritania ','Mauritius ','Mayotte ','Mexico ','Micronesia, Federated States of ','Moldova, Republic of ','Monaco ','Mongolia ','Montserrat ','Morocco ','Mozambique ','Myanmar ','Namibia ','Nauru ','Nepal ','Netherlands ','Netherlands Antilles ','New Caledonia ','New Zealand ','Nicaragua ','Niger ','Nigeria ','Niue ','Norfolk Island ','Northern Mariana Islands ','Norway ','Oman ','Pakistan ','Palau ','Panama ','Papua New Guinea ','Paraguay ','Peru ','Philippines ','Pitcairn ','Poland ','Portugal ','Puerto Rico ','Qatar ','Reunion ','Romania ','Russian Federation ','Rwanda ','Saint Kitts and Nevis ','Saint Lucia ','Saint Vincent and the Grenadines ','Samoa ','San Marino ','Sao Tome and Principe ','Saudi Arabia ','Senegal ','Seychelles ','Sierra Leone ','Singapore ','Slovakia (Slovak Republic) ','Slovenia ','Solomon Islands ','Somalia ','South Africa ','South Georgia and the South Sandwich Islands ','Spain ','Sri Lanka ','St. Helena ','St. Pierre and Miquelon ','Sudan ','Suriname ','Svalbard and Jan Mayen Islands ','Swaziland ','Sweden ','Switzerland ','Syrian Arab Republic ','Taiwan ','Tajikistan ','Tanzania, United Republic of ','Thailand ','Togo ','Tokelau ','Tonga ','Trinidad and Tobago ','Tunisia ','Turkey ','Turkmenistan ','Turks and Caicos Islands ','Tuvalu ','Uganda ','Ukraine ','United Arab Emirates ','United States Minor Outlying Islands ','Uruguay ','Uzbekistan ','Vanuatu ','Vatican City State (Holy See) ','Venezuela ','Viet Nam ','Virgin Islands (British) ','Virgin Islands (U.S.) ','Wallisw and Futuna Islands ','Western Sahara ','Yeman ','Yugoslavia ','Zaire ','Zambia ','Zimbabwe ','Not Listed___________________________');
		$country_value = array('USA','CAN','DEU','FRA','GBR','IND',' ','AFG','ALB','DZA','ASM','AND','AGO','AIA','ATA','ATG','ARG','ARM','ABW','AUS','AUT','AZE','BHS','BHR','BGD','BRB','BLR','BEL','BLZ','BEN','BMU','BTN','BOL','BIH','BWA','BVT','BRA','IOT','BRN','BGR','BFA','BDI','KHM','CMR','CPV','CYM','CAF','TCD','CHL','CHN','CXR','CCK','COL','COM','COG','COK','CRI','CIV','HRV','CUB','CYP','CZE','DNK','DJI','DMA','DOM','TMP','ECU','EGY','SLV','GNQ','ERI','EST','ETH','FLK','FRO','FJI','FIN','FXX','GUF','PYF','ATF','GAB','GMB','GEO','GHA','GIB','GRC','GRL','GRD','GLP','GUM','GTM','GIN','GNB','GUY','HTI','HMD','HND','HKG','HUN','ISL','IDN','IRN','IRQ','IRL','ISR','ITA','JAM','JPN','JOR','KAZ','KEN','KIR','PRK','KOR','KWT','KGZ','LAO','LVA','LBN','LSO','LBR','LBY','LIE','LTU','LUX','MAC','MKD','MDG','MWI','MYS','MDV','MLI','MLT','MHL','MTQ','MRT','MVS','MYT','MEX','FSM','MDA','MCO','MNG','MSR','MAR','MOZ','MMR','NAM','NRU','NPL','NLD','ANT','NCL','NZL','NIC','NER','NGA','NIU','NFK','MNP','MOR','OMN','PAK','PLW','PAN','PNG','PRY','PER','PHL','PCN','POL','PRT','PRI','QAT','REU','ROM','RUS','RWA','KNA','LCA','VCT','WSM','SMR','STP','SAU','SEN','SYC','SLE','SGP','SVK','SVN','SLB','SOM','ZAF','SGS','ESP','LKA','SHN','SPM','SDN','SUR','SJM','SWZ','SWE','CHE','SYR','TWN','TJK','TZA','THA','TGO','TKL','TON','TTO','TUN','TUR','TKM','TCA','TUV','UGA','UKR','ARE','UMI','URY','UZB','VUT','VAT','VEN','VNM','VGB','VIR','WLF','ESH','YEM','YUG','ZAR','ZMB','ZWE','UNK');
		foreach ($country_value as $n=>$value) 
		{
			$country_array[$value] = $country_display[$n];
		}
		return $country_array;
	}
	
}