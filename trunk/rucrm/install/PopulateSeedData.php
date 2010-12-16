<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

require_once('config.php');

require_once('modules/Leads/Leads.php');
require_once('modules/Contacts/contactSeedData.php');
require_once('modules/Contacts/Contacts.php');
require_once('modules/Accounts/Accounts.php');
require_once('modules/Campaigns/Campaigns.php');
require_once('modules/Potentials/Potentials.php');
require_once('modules/Calendar/Activity.php');
require_once('include/database/PearDatabase.php');
require_once('include/utils/utils.php');
require_once('include/language/en_us.lang.php');
require_once('include/ComboStrings.php');
require_once('modules/Products/Products.php');
require_once('modules/PriceBooks/PriceBooks.php');
require_once('modules/Vendors/Vendors.php');
require_once('modules/Faq/Faq.php');
require_once('modules/HelpDesk/HelpDesk.php');
require_once('modules/Documents/Documents.php');
require_once('modules/Quotes/Quotes.php');
require_once('modules/SalesOrder/SalesOrder.php');
require_once('modules/PurchaseOrder/PurchaseOrder.php');
require_once('modules/Invoice/Invoice.php');
require_once('modules/Emails/Emails.php');

global $first_name_array;
global $first_name_count;
global $last_name_array;
global $last_name_count;
global $company_name_array;
global $company_name_count;
global $street_address_array;
global $street_address_count;
global $city_array;
//global $state_array;
global $city_array_count;
global $campaign_name_array,$campaign_type_array,$campaign_status_array;
global $adb;
$adb = PearDatabase::getInstance();

function add_digits($quantity, &$string, $min = 0, $max = 9)
{
	for($i=0; $i < $quantity; $i++)
	{
		$string .= rand($min,$max);
	}
}

function create_phone_number()
{
	$phone = "(";
$phone = $phone; // This line is useless, but gets around a code analyzer warning.  Bug submitted 4/28/04
	add_digits(3, $phone);
	$phone .= ") ";
	add_digits(3, $phone);
	$phone .= "-";
	add_digits(4, $phone);
	
	return $phone;
}

function create_date()
{
	$date = "";
	$date .= "2010";
	$date .= "-";
	$date .= rand(1,9);
	$date .= "-";
	$date .= rand(1,28);
	
	return $date;
}

//vtiger-ru-fork Eugene Babiy. Транслитерация с русского в латиницу
function translit( $s ) {
	$r = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м', 'н','о','п','р','с','т','у','ф','х','ц','ч', 'ш', 'щ', 'ъ','ы','ь','э', 'ю', 'я',' ');
	$l = array('a','b','v','g','d','e','e','g','z','i','y','k','l','m','n', 'o','p','r','s','t','u','f','h','c','ch','sh','sh','', 'y','y', 'e','yu','ya','-');
	$s = str_replace( $r, $l, strtolower($s) );
	$s = preg_replace("/[^\w\-]/","$1",$s);
	$s = preg_replace("/\-{2,}/",'-',$s);
	return trim($s,'-');
}


$account_ids = Array();
$opportunity_ids = Array();
$vendor_ids = Array();
$contact_ids = Array();
$product_ids = Array();
$pricebook_ids = Array();
$quote_ids = Array();
$salesorder_ids = Array();
$purchaseorder_ids = Array();
$invoice_ids = Array();
$email_ids = Array();

// Assigned user for all demo data.
$assigned_user_name = "admin";

// Look up the user id for the assigned user
$seed_user = new Users();

$assigned_user_id = $seed_user->retrieve_user_id($assigned_user_name);

global $current_user;

$current_user = new Users();
$result = $current_user->retrieve_entity_info($assigned_user_id,'Users');

$tagkey = 1;

// Get _dom arrays
$comboFieldNames = Array('leadsource'=>'leadsource_dom'
		      ,'leadstatus'=>'lead_status_dom'
		      ,'industry'=>'industry_dom'
		      ,'rating'=>'rating_dom'
                      ,'opportunity_type'=>'opportunity_type_dom'
                      ,'sales_stage'=>'sales_stage_dom');
$comboFieldArray = getComboArray($comboFieldNames);

$adb->println("company_name_array");
$adb->println($company_name_array);

$cloudtag = Array ('СУПЕР', 'VIP', 'VIP', '50юзеров');

for($i = 0; $i < $company_name_count; $i++) {
	
	$account_name = $company_name_array[$i];

	// Create new accounts.
	$account = new Accounts();
	$account->column_fields["accountname"] = $account_name;
	$account->column_fields["phone"] = create_phone_number();
	$account->column_fields["assigned_user_id"] = $assigned_user_id;

	$whitespace = array(" ", ".", "&", "\/");
	$website = str_replace($whitespace, "", strtolower($account->column_fields["accountname"]));
	$account->column_fields["website"] = "www.".$website.".com";
	
	$account->column_fields["bill_street"] = $street_address_array[rand(0,$street_address_count-1)];
	$account->column_fields["bill_city"] = $city_array[rand(0,$city_array_count-1)];
	$account->column_fields["bill_state"] = "";
	$account->column_fields["bill_code"] = rand(10000, 99999);
	$account->column_fields["bill_country"] = "";	

	$account->column_fields["ship_street"] = $account->column_fields["bill_street"];
	$account->column_fields["ship_city"] = $account->column_fields["bill_city"];
	$account->column_fields["ship_state"] = $account->column_fields["bill_state"];
	$account->column_fields["ship_code"] = $account->column_fields["bill_code"];
	$account->column_fields["ship_country"] = $account->column_fields["bill_country"];	
	
	$key = array_rand($comboFieldArray['industry_dom']);
	$account->column_fields["industry"] = $comboFieldArray['industry_dom'][$key];

	$account->column_fields["account_type"] = "Customer";

	$account->save("Accounts");
	
	$account_ids[] = $account->id;
	
	if ($i > 3) {
		$freetag = $adb->getUniqueId('vtiger_freetags');
		$query = "insert into vtiger_freetags values (?,?,?)";
		$qparams = array($freetag, $cloudtag[1], $cloudtag[1]);
		$res = $adb->pquery($query, $qparams);

		$date = $adb->formatDate(date('YmdHis'), true); 
		$query_tag = "insert into vtiger_freetagged_objects values (?,?,?,?,?)";
		$tag_params = array($freetag, 1, $account->id, $date, Accounts);
		$result = $adb->pquery($query_tag, $tag_params);
	}
		
	//Create new opportunities
	$opp = new Potentials();

	$opp->column_fields["assigned_user_id"] = $assigned_user_id;
	$opp->column_fields["potentialname"] = $account_name." - 1000 шт.";
	$opp->column_fields["closingdate"] = & create_date();

	$key = array_rand($comboFieldArray['leadsource_dom']);
	$opp->column_fields["leadsource"] = $comboFieldArray['leadsource_dom'][$key];

	$comboSalesStageArray = Array ("Closed Won","Needs Analysis","Value Proposition","Qualification","Prospecting","Id. Decision Makers");
	$key = array_rand($comboSalesStageArray);
	$opp->column_fields["sales_stage"] = $comboSalesStageArray[$key];

	$key = array_rand($comboFieldArray['opportunity_type_dom']);
	$opp->column_fields["opportunity_type"] = $comboFieldArray['opportunity_type_dom'][$key];

	$amount = array("10000", "25000", "50000", "75000"); 
	$key = array_rand($amount);
	$opp->column_fields["amount"] = $amount[$key];
	$opp->column_fields["related_to"] = $account->id;

	$opp->save("Potentials");
	
	$opportunity_ids[] = $opp->id;
}


for($i=0; $i<10; $i++)
{
	$contact = new Contacts();
//	$contact->column_fields["firstname"] = ucfirst(strtolower($first_name_array[$i]));
//	$contact->column_fields["lastname"] = ucfirst(strtolower($last_name_array[$i]));
	$contact->column_fields["firstname"] = $first_name_array[$i];
	$contact->column_fields["lastname"] = $last_name_array[$i];

	$contact->column_fields["assigned_user_id"] = $assigned_user_id;
	//TODO vtiger-ru-fork Eugene Babiy. Добавить транслит на имена.
	$contact->column_fields["email"] = strtolower($contact->column_fields["firstname"])."_".strtolower($contact->column_fields["lastname"])."@company.com";

	$contact->column_fields["phone"] = create_phone_number();
	$contact->column_fields["homephone"] = create_phone_number();
	$contact->column_fields["mobile"] = create_phone_number();
	
	// Fill in a bogus address
	$key = array_rand($street_address_array);
	$contact->column_fields["mailingstreet"] = $street_address_array[$key];
	$key = array_rand($city_array);
	$contact->column_fields["mailingcity"] = $city_array[$key];
	$contact->column_fields["mailingstate"] = "";
	$contact->column_fields["mailingzip"] = '99999';
	$contact->column_fields["mailingcountry"] = "";	

	$key = array_rand($comboFieldArray['leadsource_dom']);
	$contact->column_fields["leadsource"] = $comboFieldArray['leadsource_dom'][$key];

	$titles = array("Директор", 
					"Руководитель отдела продаж", 
					"Менеджер", 
					"Программист", 
					"Бухгалтер", 
					"Секретарь", 
					"");
	$key = array_rand($titles);
	$contact->column_fields["title"] = $titles[$key];
	
	$account_key = array_rand($account_ids);
	$contact->column_fields["account_id"] = $account_ids[$account_key];

	//$contact->saveentity("Contacts");
	$contact->save("Contacts");
	$contact_ids[] = $contact->id;

	
	if ($i > 8)
	{
		$freetag = $adb->getUniqueId('vtiger_freetags');
		$query = "insert into vtiger_freetags values (?,?,?)";
		$qparams = array($freetag, $cloudtag[2], $cloudtag[2]);
		$res1 = $adb->pquery($query, $qparams);

		$date = $adb->formatDate(date('YmdHis'), true); 
		$query_tag = "insert into vtiger_freetagged_objects values (?,?,?,?,?)";
		$tag_params = array($freetag, 1, $contact->id, $date, 'Contacts');
		$result1 = $adb->pquery($query_tag, $tag_params);
	}
	// This assumes that there will be one opportunity per company in the seed data.
	$opportunity_key = array_rand($opportunity_ids);
	
	$query = "insert into vtiger_contpotentialrel ( contactid, potentialid ) values (?,?)";
	$adb->pquery($query, array($contact->id, $opportunity_ids[$opportunity_key]));
}

$company_count=0;
for($i=0; $i<10; $i++)
{
	$lead = new Leads();
	//vtiger-ru-fork 29.10.10 Eugene Babiy
	//lead->column_fields["firstname"] = ucfirst(strtolower($first_name_array[$i]));
	//lead->column_fields["lastname"] = ucfirst(strtolower($last_name_array[$i]));
	$lead->column_fields["firstname"] = $first_name_array[$i];
	$lead->column_fields["lastname"] = $last_name_array[$i];
	if($i<5)
       	{
        	$lead->column_fields["company"] = ucfirst(strtolower($company_name_array[$i]));
       	}
       	else
       	{
               	$lead->column_fields["company"] = ucfirst(strtolower($company_name_array[$company_count]));
               	$company_count++;
       	}

	$lead->column_fields["assigned_user_id"] = $assigned_user_id;
	//TODO vtiger-ru-fork Eugene Babiy. добавлен транслит на имена.
	$lead->column_fields["email"] = strtolower($lead->column_fields["firstname"])."_".strtolower($lead->column_fields["lastname"])."@company.com";
	
	$website = str_replace($whitespace, "", strtolower(ucfirst(strtolower($company_name_array[$i]))));
        $lead->column_fields["website"] = "www.".$website.".com";
	
	$lead->column_fields["phone"] = create_phone_number();
	$lead->column_fields["mobile"] = create_phone_number();
	
	// Fill in a bogus address
	$key = array_rand($street_address_array);
	//$lead->address_street = $street_address_array[$key];
	$lead->column_fields["lane"] = $street_address_array[$key];
	$key = array_rand($city_array);
	$lead->column_fields["city"] = $city_array[$key];
	$lead->column_fields["state"] = "";
	$lead->column_fields["code"] = '99999';
	$lead->column_fields["country"] = '';
	
	$key = array_rand($comboFieldArray['leadsource_dom']);
	$lead->column_fields["leadsource"] = $comboFieldArray['leadsource_dom'][$key];

	$key = array_rand($comboFieldArray['lead_status_dom']);
	$lead->column_fields["leadstatus"] = $comboFieldArray['lead_status_dom'][$key];

	$key = array_rand($comboFieldArray['rating_dom']);
	$lead->column_fields["rating"] = $comboFieldArray['rating_dom'][$key];	

	$titles = array("Директор", 
					"Руководитель отдела продаж", 
					"Менеджер", 
					"Программист", 
					"Бухгалтер", 
					"Секретарь", 
					"");
	$key = array_rand($titles);
	$lead->column_fields["designation"] = $titles[$key];

	$lead->save("Leads");
}

//Populating Vendor Data
for($i=0; $i<10; $i++)
{
	$vendor = new Vendors();
	$vendor->column_fields["vendorname"] = $first_name_array[$i];
	$vendor->column_fields["phone"] = create_phone_number();
	$vendor->column_fields["email"] = strtolower($vendor->column_fields["vendorname"])."@company.com";
	$website = str_replace($whitespace, "", strtolower(ucfirst(strtolower($company_name_array[$i]))));
	$vendor->column_fields["website"] = "www.".$website.".com";

	$vendor->column_fields["assigned_user_id"] = $assigned_user_id;
	
	// Fill in a bogus address
	$vendor->column_fields["street"] = $street_address_array[rand(0,$street_address_count-1)]; 
	$key = array_rand($city_array);
	$vendor->column_fields["city"] = $city_array[$key];
	$vendor->column_fields["state"] = "";
	$vendor->column_fields["postalcode"] = '99999';
	$vendor->column_fields["country"] = '';	

	$vendor->save("Vendors");
	$vendor_ids[] = $vendor->id;
}

//Populating Product Data

//TODO vtiger-ru-fork 28.10.2010 Eugene Babiy
$product_name_array= array( "Пакет ПО на Одного Пользователя", "Пакет ПО на 5 Пользователей", "Пакет ПО на 10 Пользователей",
        "Пакет ПО на 25 Пользователей", "Пакет ПО на 50 Пользователей", "ЖК-панель",
        "abcd1234", "Cd-R CD Recordable", "Факсовая Бумага - Sharp" , "Картридж принтера Brother Ink Jet"); 
$product_code_array= array("00001","00002","00003","00004","00005","жк-106","1324356","по-108","по-119","по-125");
$subscription_rate=array("149","699","1299","2999","4995");
//added by jeri to populate product images
$product_image_array = array("","","","");
for($i=0; $i<10; $i++) {
	$product = new Products();
	if($i>4) {
		$parent_key = array_rand($opportunity_ids);
		$product->column_fields["parent_id"]=$opportunity_ids[$parent_key];

		$usageunit	=	"Each";
		$qty_per_unit	=	1;
		$qty_in_stock	=	rand(10000, 99999);
		$category 	= 	"Hardware";		
		$website 	=	"";
		$manufacturer	= 	"";
		$commission_rate=	rand(10,20);
		$unit_price	=	rand(100,999);
		$product_image_name = '';
	} else {
		$account_key = array_rand($account_ids);
		$product->column_fields["parent_id"]=$account_ids[$account_key];

		$usageunit	=	"Each";
		$qty_per_unit	=	1;
		$qty_in_stock	=	rand(10000, 99999);
		$category 	= 	"Software";	
		$website 	=	"http://code.google.com/p/vtiger-ru-fork/";
		$manufacturer	= 	"LexPon Inc.";
		$commission_rate=	rand(1,10);
		$unit_price	=	$subscription_rate[$i];
		$product_image_name = $product_image_array[$i];
	}

    $product->column_fields["productname"] 	= 	$product_name_array[$i];
    $product->column_fields["productcode"] 	= 	$product_code_array[$i];
    $product->column_fields["manufacturer"]	= 	$manufacturer;
    $product->column_fields["discontinued"]	= 	1;

	$product->column_fields["productcategory"] = 	$category;
    $product->column_fields["website"] 	=	$website;
    $product->column_fields["productsheet"] =	"";

	$vendor_key = array_rand($vendor_ids);
    $product->column_fields["vendor_id"] 	= 	$vendor_ids[$vendor_key];
	$contact_key = array_rand($contact_ids);
    $product->column_fields["contact_id"] 	= 	$contact_ids[$contact_key];

    $product->column_fields["start_date"] 	= 	& create_date();
    $product->column_fields["sales_start_date"] 	= & create_date();

    $product->column_fields["unit_price"] 	= 	$unit_price;
    $product->column_fields["commissionrate"] = 	$commission_rate;
    $product->column_fields["taxclass"] 	= 	'SalesTax';
    $product->column_fields["usageunit"]	= 	$usageunit;
 	$product->column_fields["qty_per_unit"] = 	$qty_per_unit;
    $product->column_fields["qtyinstock"] 	= 	$qty_in_stock;
	$product->column_fields["imagename"] =  $product_image_name;
	$product->column_fields["assigned_user_id"] = 	1;

	$product->save("Products");
	$product_ids[] = $product ->id;
}

//Populating HelpDesk- FAQ Data

	$status_array=array ("Draft","Reviewed","Published","Draft","Reviewed","Draft","Reviewed","Draft","Reviewed","Draft","Reviewed","Draft");
	$question_array=array (
	"Что такое CRM система?",
	"Какую пользу нашей компании принесет CRM система?",
	"Как определить что мы 'доросли' до CRM?",
	"В каких отраслях установка CRM системы приносит наиболее ощутимую пользу?",
	"В чем преимущество онлайн CRM?",
	"How to migrate data from previous versions to the latest version?",
	"A program is trying to access e-mail addresses you have stored in Outlook. Do you want to allow this? If this is unexpected, it may be a virus and you should choose No when trying to add Email to vitger CRM ",
	" Error message - please close all instances of word before using the vtiger word plugin. Do I need to close all Word and Outlook instances first before I can reopen Word and sign in?",
	"Error message: The file is damaged and could not be repaired.",
	"When trying to merge a template with a contact, First I was asked allow installation of ActiveX control. I accepted. After it appears a message that it will not be installed because it can't verify the publisher. Do you have a workarround for this issue ?",
	" Error message - please close all instances of word before using the vtiger word plugin. Do I need to close all Word and Outlook instances first before I can reopen Word and sign in?",
	"How to migrate data from previous versions to the latest version?",
	);

	$answer_array=array (
	"CRM система (от англ. Customer Relationship Management) – это компьютерная программа, которая содержит 
	всю необходимую информацию о ваших клиентах. Любое действие , связанное с клиентом: звонок, назначенная 
	встреча, сообщения электронной почты, коммерческое предложение, договор, обращение в службу поддержки и 
	многое другое сохраняется в CRM системе и становится доступным любому сотруднику вашей компании в любое 
	время в любом месте. С помощью CRM системы, каждый сотрудник может без труда посмотреть всю историю 
	общения с клиентом, а руководитель оценить работу отделов маркетинга, продаж и обслуживания.",
	
	"С помощью технологий, реализованных в CRM системе, ваши сотрудники могут заглянуть внутрь отношений с 
	клиентами: изучить поведение клиентов, оценить их прибыльность и т.п. Используя CRM систему, ваша компания 
	может увеличить прибыль, ведь ваши сотрудники смогут: * предлагать товары и услуги, которые действительно 
	необходимы клиенту * быстрее завершать сделки продажами * проводить эффективные перекрестные продажи * 
	обеспечивать более качественное послепродажное обслуживание ","Published",
	"Если вы зашли на наш сайт, то уже наверняка знаете что такое CRM система. Поздравляем, вы почти 'доросли' до CRM. А теперь несколько ситуаций из практики:
	
	* Ежемесячно наша компания дает рекламу в газетах, журналах или на радио.
	- Мы не знаем насколько эффективна та или иная реклама. Компания продолжает тратить деньги на рекламные компании с очень низким возвратом инвестиций.
	
	* Наша компания участвует в выставках. Клиенты интересуются нашими товарами или услугами, оставляют визитки, заполняют анкеты и т.д.
	- После выставки мы складываем трофеи в коробку и убираем под стол. Так компания теряет потенциальных клиентов и прибыль, которую они могли принести.
	
	* Клиент написал письмо с запросом порекомендовать продукцию и изложил свои требования.
	- Клиент не получил ответа. Письмо потерялось, так и не дойдя до ответственного менеджера.
	- Клиент получил 3 ответа от 3 менеджеров. Причем все ответы были разные. В результате все менеджеры потратили время на поиски нужной информации и на написание ответа.
	
	* Менеджер по продажам заболел, уехал в отпуск или ушел к конкурентам.
	- Все клиенты с которыми он работал остались в его записной книжке.
	
	* Менеджер забыл назначить встречу или позвонить после отправки коммерческого предложения.
	- Клиент купил крупную партию товара у конкурента.
	
	* Клиент позвонил, чтобы пожаловаться на качество продукции
	- Жалоба была записана на листок (направлена в другой отдел) и забыта.
	- Клиент написал письмо директору компании с нареканием или ушел к конкурентам.
	
	* Наша компания часто сталкивается с конкурентами по ценам, по продукции.
	- Мы не ведем информацию, как лучше себя вести продавцу в этих случаях. - Мы не знаем сколько сделок мы проиграли и кому.
	
	Наверное что-то подобное не раз случалось и в вашей компании. Вы активно занимаетесь продажами, а это и есть сигнал того, что ваша компания 'доросла до CRM системы.",
	"CRM система будет наиболее полезна для тех компаний, которые предоставляют услуги в секторе B2B, продают товар вместе с послепродажным обслуживанием. Если говорить 
	об отраслях, то можно выделить финансовый сектор, телекоммуникационные компании, рекламный бизнес, поставщиков оборудования, оптовые и дистрибьюторские компании. ",
	"В настоящее время в Северной Америке особенно активно развивается новый вид распространения программного обеспечения - ПО как услуга (SaaS - Software as a Service). 
	SugarCRM 'Онлайн' является онлайн-CRM, типичным представителем нового поколения SaaS решений. Основное преимущество SugarCRM 'Онлайн' - возможность максимально быстрого 
	старта. Посудите сами: установка CRM системы происходит на нашем сервере, что позволяет вам сэкономить не только на оборудовании, но и на дальнейшем сопровождении системы."
	);

$num_array=array(0,1,2,3,4,6,7,8,9,10,11,12);
for($i=0;$i<12;$i++) {
	$faq = new Faq();
	
	$rand=array_rand($num_array);
	$faq->column_fields["product_id"]	= $product_ids[$i];
	$faq->column_fields["faqcategories"]	= "General";
	$faq->column_fields["faqstatus"] 	= $status_array[$i];
	$faq->column_fields["question"]		= $question_array[$i];
	$faq->column_fields["faq_answer"]	= $answer_array[$i];

	$faq->save("Faq");
	$faq_ids[] = $faq ->id;
}

//Populate Quote Data

//TODO vtiger-ru-fork
$sub_array = array ("Предложение по периферии", "Устройства", "Настройка сети", "Супер предложение", "Цены от поставщиков");
$stage_array = array ("Created", "Reviewed", "Delivered", "Accepted" , "Rejected");
$carrier_array = array ("FedEx", "UPS", "USPS", "DHL", "BlueDart");
$validtill_array = array ("2010-09-21", "2010-10-29", "2010-12-11", "2010-03-29", "2010-06-18");

for($i=0;$i<5;$i++)
{
	$quote = new Quotes();
	
	$quote->column_fields["assigned_user_id"] = $assigned_user_id;
	$account_key = array_rand($account_ids);
	$quote->column_fields["account_id"] = $account_ids[$account_key];
	$op_key = array_rand($opportunity_ids);
	$quote->column_fields["potential_id"] = $opportunity_ids[$op_key];
	$contact_key = array_rand($contact_ids);
        $quote->column_fields["contact_id"] = $contact_ids[$contact_key];
	$rand = array_rand($num_array);
	$quote->column_fields["subject"] = $sub_array[$i];
	$quote->column_fields["quotestage"] = $stage_array[$i];	
	$quote->column_fields["carrier"] = $carrier_array[$i];
	$quote->column_fields["validtill"] = $validtill_array[$i];

	$quote->column_fields["bill_street"] = $street_address_array[rand(0,$street_address_count-1)];
	$quote->column_fields["bill_city"] = $city_array[rand(0,$city_array_count-1)];
	$quote->column_fields["bill_state"] = "";
	$quote->column_fields["bill_code"] = rand(10000, 99999);
	$quote->column_fields["bill_country"] = '';	

	$quote->column_fields["ship_street"] = $account->column_fields["bill_street"];
	$quote->column_fields["ship_city"] = $account->column_fields["bill_city"];
	$quote->column_fields["ship_state"] = $account->column_fields["bill_state"];
	$quote->column_fields["ship_code"] = $account->column_fields["bill_code"];
	$quote->column_fields["ship_country"] = $account->column_fields["bill_country"];	
	
	$quote->column_fields["currency_id"] = '1';	
	$quote->column_fields["conversion_rate"] = '1';
	
	$quote->save("Quotes");

	$quote_ids[] = $quote->id;

	$product_key = array_rand($product_ids); 
	$productid = $product_ids[$product_key];

	//set the inventory product details in request then just call the saveInventoryProductDetails function 
	$_REQUEST['totalProductCount']	 = 1;

	$_REQUEST['hdnProductId1'] = $productid;
	$_REQUEST['qty1'] = $qty = 1;
	$_REQUEST['listPrice1'] = $listprice = 130;
	$_REQUEST['comment1'] = "Это тестовый комментарий для позиции Предложения";
	
	$_REQUEST['deleted1'] = 0;
	$_REQUEST['discount_type1'] = 'amount';
	$_REQUEST['discount_amount1'] = $discount_amount = '20';

	$_REQUEST['taxtype'] = $taxtype = 'individual';
	$_REQUEST['subtotal'] = $subtotal = $qty*$listprice-$discount_amount;
	$_REQUEST['discount_type_final'] = 'amount';
	$_REQUEST['discount_amount_final'] = $discount_amount_final = '10';
	
	$_REQUEST['shipping_handling_charge'] = $shipping_handling_charge = '50';
	$_REQUEST['adjustmenttype'] = '+';
	$_REQUEST['adjustment'] = $adjustment = '10';

	$_REQUEST['total'] = $subtotal-$discount_amount_final+$shipping_handling_charge+$adjustment;

	//Upto this added to set the request values which will be used to save the inventory product details

	//Now call the saveInventoryProductDetails function
	saveInventoryProductDetails($quote, 'Quotes');
}

//Populate SalesOrder Data

$subj_array = array ("Первая Продажа", "Сервисная поддержка", "Пакет на 5 юзеров", "Пакет на 100 юзеров", "Новый Заказ");
$status_array = array ("Created",  "Delivered", "Approved" , "Cancelled" , "Created");
$carrier_array = array ("FedEx", "UPS", "USPS", "DHL", "BlueDart");
$duedate_array = array ("2011-04-21", "2011-05-29", "2011-08-11", "2011-09-09", "2011-02-28");

for($i=0;$i<5;$i++)
{
	$so = new SalesOrder();
	
	$so->column_fields["assigned_user_id"] = $assigned_user_id;
	$account_key = array_rand($account_ids);
	$so->column_fields["account_id"] = $account_ids[$account_key];
	$quote_key = array_rand($quote_ids);
	$so->column_fields["quote_id"] = $quote_ids[$quote_key];
	$contact_key = array_rand($contact_ids);
        $so->column_fields["contact_id"] = $contact_ids[$contact_key];
	$rand = array_rand($num_array);
	$so->column_fields["subject"] = $subj_array[$i];
	$so->column_fields["sostatus"] = $status_array[$i];	
	$so->column_fields["hdnGrandTotal"] = $sototal_array[$i];
	$so->column_fields["carrier"] = $carrier_array[$i];
	$so->column_fields["duedate"] = $duedate_array[$i];

	$so->column_fields["bill_street"] = $street_address_array[rand(0,$street_address_count-1)];
	$so->column_fields["bill_city"] = $city_array[rand(0,$city_array_count-1)];
	$so->column_fields["bill_state"] = "";
	$so->column_fields["bill_code"] = rand(10000, 99999);
	$so->column_fields["bill_country"] = '';	

	$so->column_fields["ship_street"] = $account->column_fields["bill_street"];
	$so->column_fields["ship_city"] = $account->column_fields["bill_city"];
	$so->column_fields["ship_state"] = $account->column_fields["bill_state"];
	$so->column_fields["ship_code"] = $account->column_fields["bill_code"];
	$so->column_fields["ship_country"] = $account->column_fields["bill_country"];	
	
	$so->column_fields["currency_id"] = '1';	
	$so->column_fields["conversion_rate"] = '1';
	
	$so->save("SalesOrder");

	$salesorder_ids[] = $so->id;

	$product_key = array_rand($product_ids); 
	$productid = $product_ids[$product_key];

	//set the inventory product details in request then just call the saveInventoryProductDetails function 
	$_REQUEST['totalProductCount']	 = 1;

	$_REQUEST['hdnProductId1'] = $productid;
	$_REQUEST['qty1'] = $qty = 1;
	$_REQUEST['listPrice1'] = $listprice = 1230;
	$_REQUEST['comment1'] = "Это тестовый комментарий для позиции Продажи";
	
	$_REQUEST['deleted1'] = 0;
	$_REQUEST['discount_type1'] = 'amount';
	$_REQUEST['discount_amount1'] = $discount_amount = '200';

	$_REQUEST['taxtype'] = $taxtype = 'individual';
	$_REQUEST['subtotal'] = $subtotal = $qty*$listprice-$discount_amount;
	$_REQUEST['discount_type_final'] = 'amount';
	$_REQUEST['discount_amount_final'] = $discount_amount_final = '100';
	
	$_REQUEST['shipping_handling_charge'] = $shipping_handling_charge = '50';
	$_REQUEST['adjustmenttype'] = '+';
	$_REQUEST['adjustment'] = $adjustment = '100';

	$_REQUEST['total'] = $subtotal-$discount_amount_final+$shipping_handling_charge+$adjustment;

	//Upto this added to set the request values which will be used to save the inventory product details

	//Now call the saveInventoryProductDetails function
	saveInventoryProductDetails($so, 'SalesOrder');
}

//Populate PurchaseOrder Data

$psubj_array = array ("Установка и Настройка Russian VtigerCRM Fork", "Russian VtigerCRM Fork - Пакет Поддержки на 1 Пользователя", "Russian VtigerCRM Fork - Пакет Поддержки на 5 Пользователей", "Russian VtigerCRM Fork - Пакет Поддержки на 10 Пользователей", "Серверное Оборудование");
$pstatus_array = array ("Created",  "Delivered", "Approved" , "Cancelled", "Received Shipment");
$carrier_array = array ("FedEx", "UPS", "USPS", "DHL", "BlueDart");
$trkno_array = array ("po1425", "po2587", "po7974", "po7979", "po6411"); 
$duedate_array = array ("2011-04-21", "2011-05-29", "2011-07-11", "2011-04-09", "2011-08-18");

for($i=0;$i<5;$i++)
{
	$po = new PurchaseOrder();
	
	$po->column_fields["assigned_user_id"] = $assigned_user_id;
	$vendor_key = array_rand($vendor_ids);
	$po->column_fields["vendor_id"] = $vendor_ids[$vendor_key];
	$contact_key = array_rand($contact_ids);
        $po->column_fields["contact_id"] = $contact_ids[$contact_key];
	$rand = array_rand($num_array);
	$po->column_fields["subject"] = $psubj_array[$i];
	$po->column_fields["postatus"] = $pstatus_array[$i];	
	$po->column_fields["carrier"] = $carrier_array[$i];
	$po->column_fields["tracking_no"] = $trkno_array[$i];
	$po->column_fields["duedate"] = $duedate_array[$i];

	$po->column_fields["bill_street"] = $street_address_array[rand(0,$street_address_count-1)];
	$po->column_fields["bill_city"] = $city_array[rand(0,$city_array_count-1)];
	$po->column_fields["bill_state"] = "";
	$po->column_fields["bill_code"] = rand(10000, 99999);
	$po->column_fields["bill_country"] = "";	

	$po->column_fields["ship_street"] = $account->column_fields["bill_street"];
	$po->column_fields["ship_city"] = $account->column_fields["bill_city"];
	$po->column_fields["ship_state"] = $account->column_fields["bill_state"];
	$po->column_fields["ship_code"] = $account->column_fields["bill_code"];
	$po->column_fields["ship_country"] = $account->column_fields["bill_country"];	
	
	$po->column_fields["currency_id"] = '1';	
	$po->column_fields["conversion_rate"] = '1';		
	
	$po->save("PurchaseOrder");

	$purchaseorder_ids[] = $po->id;

	$product_key = array_rand($product_ids); 
	$productid = $product_ids[$product_key];

	//set the inventory product details in request then just call the saveInventoryProductDetails function 
	$_REQUEST['totalProductCount']	 = 1;

	$_REQUEST['hdnProductId1'] = $productid;
	$_REQUEST['qty1'] = $qty = 1;
	$_REQUEST['listPrice1'] = $listprice = 2200;
	$_REQUEST['comment1'] = "Это демонстрационный комментарий для позиции Закупки";
	
	$_REQUEST['deleted1'] = 0;
	$_REQUEST['discount_type1'] = 'amount';
	$_REQUEST['discount_amount1'] = $discount_amount = '200';

	$_REQUEST['taxtype'] = $taxtype = 'individual';
	$_REQUEST['subtotal'] = $subtotal = $qty*$listprice-$discount_amount;
	$_REQUEST['discount_type_final'] = 'amount';
	$_REQUEST['discount_amount_final'] = $discount_amount_final = '100';
	
	$_REQUEST['shipping_handling_charge'] = $shipping_handling_charge = '50';
	$_REQUEST['adjustmenttype'] = '+';
	$_REQUEST['adjustment'] = $adjustment = '100';

	$_REQUEST['total'] = $subtotal-$discount_amount_final+$shipping_handling_charge+$adjustment;

	//Upto this added to set the request values which will be used to save the inventory product details

	//Now call the saveInventoryProductDetails function
	saveInventoryProductDetails($po, 'PurchaseOrder');
}

//Populate Invoice Data

$isubj_array = array ("vtiger_invoice201", "zoho_inv7841", "vtiger5usrp_invoice71134", "vt100usrpk_inv113", "vendtl_inv214");
$istatus_array = array ("Created",  "Sent", "Approved" , "Credit Invoice", "Paid");
$itotal_array = array ("4842.000", "4842.000", "4842.000", "4842.000", "4842.000");

for($i=0;$i<5;$i++)
{
	$invoice = new Invoice();
	
	$invoice->column_fields["assigned_user_id"] = $assigned_user_id;
	$account_key = array_rand($account_ids);
	$invoice->column_fields["account_id"] = $account_ids[$account_key];
	$so_key = array_rand($salesorder_ids);
	$invoice->column_fields["salesorder_id"] = $salesorder_ids[$so_key];
	$contact_key = array_rand($contact_ids);
        $invoice->column_fields["contactid"] = $contact_ids[$contact_key];
	$rand = array_rand($num_array);
	$invoice->column_fields["subject"] = $isubj_array[$i];
	$invoice->column_fields["invoicestatus"] = $istatus_array[$i];	
	$invoice->column_fields["hdnGrandTotal"] = $itotal_array[$i];

	$invoice->column_fields["bill_street"] = $street_address_array[rand(0,$street_address_count-1)];
	$invoice->column_fields["bill_city"] = $city_array[rand(0,$city_array_count-1)];
	$invoice->column_fields["bill_state"] = "";
	$invoice->column_fields["bill_code"] = rand(10000, 99999);
	$invoice->column_fields["bill_country"] = "";	

	$invoice->column_fields["ship_street"] = $account->column_fields["bill_street"];
	$invoice->column_fields["ship_city"] = $account->column_fields["bill_city"];
	$invoice->column_fields["ship_state"] = $account->column_fields["bill_state"];
	$invoice->column_fields["ship_code"] = $account->column_fields["bill_code"];
	$invoice->column_fields["ship_country"] = $account->column_fields["bill_country"];		
	
	$invoice->column_fields["currency_id"] = '1';	
	$invoice->column_fields["conversion_rate"] = '1';	
	
	$invoice->save("Invoice");

	$invoice_ids[] = $invoice->id;
	if ($i > 3)
	{
		$freetag = $adb->getUniqueId('vtiger_freetags');
		$query = "insert into vtiger_freetags values (?,?,?)";
		$qparams = array($freetag, $cloudtag[0], $cloudtag[0]);
		$res_inv = $adb->pquery($query, $qparams);

		$date = $adb->formatDate(date('YmdHis'), true); 
		$query_tag = "insert into vtiger_freetagged_objects values (?,?,?,?,?)";
		$tag_params = array($freetag, 1, $invoice->id, $date, 'Invoice');
		$result_inv = $adb->pquery($query_tag, $tag_params);
	}

	$product_key = array_rand($product_ids); 
	$productid = $product_ids[$product_key];

	//set the inventory product details in request then just call the saveInventoryProductDetails function 
	$_REQUEST['totalProductCount']	 = 1;

	$_REQUEST['hdnProductId1'] = $productid;
	$_REQUEST['qty1'] = $qty = 1;
	$_REQUEST['listPrice1'] = $listprice = 4300;
	$_REQUEST['comment1'] = "Это демонстрационный комментарий для позиции Счета";
	
	$_REQUEST['deleted1'] = 0;
	$_REQUEST['discount_type1'] = 'amount';
	$_REQUEST['discount_amount1'] = $discount_amount = '300';

	$_REQUEST['taxtype'] = $taxtype = 'individual';
	$_REQUEST['subtotal'] = $subtotal = $qty*$listprice-$discount_amount;
	$_REQUEST['discount_type_final'] = 'amount';
	$_REQUEST['discount_amount_final'] = $discount_amount_final = '100';
	
	$_REQUEST['shipping_handling_charge'] = $shipping_handling_charge = '50';
	$_REQUEST['adjustmenttype'] = '+';
	$_REQUEST['adjustment'] = $adjustment = '100';

	$_REQUEST['total'] = $subtotal-$discount_amount_final+$shipping_handling_charge+$adjustment;

	//Upto this added to set the request values which will be used to save the inventory product details

	//Now call the saveInventoryProductDetails function
	saveInventoryProductDetails($invoice, 'Invoice');

}

//Populate Email Data

$esubj_array =  array ("Русский Vtiger 5.2.0 Вышел", "Попробуйте VtigerCRM!", "Привет!!!", "Добро пожаловать в Open Source", "Нужна помощь в адаптации VtigerCRM");
$startdate_array =  array ("2010-07-27","2010-05-09","2010-04-05","2010-11-01","2010-08-18");
$filename_array = array ("vtiger5alpha.tar.gz", "zohowriter.zip", "hi.doc", "welcome.pps", "sos.doc");

$to_array = array("a@a.com","b@b.com", "tester@testvtiger.com","xanth@yaz.com","violet@bing.com");
$cc_array = array("andrewa@a.com","casterb@b.com", "indomine@variancevtiger.com","becker@nosbest.com","electra@violet.com");
$bcc_array = array("nathan@nathantests.com","jeff@karl1.com", "isotope@uranium.com","bunny@bugs.com","explosive@dud.com");
$from_array = array("harvest@zss.com","rain@sunshine.com", "gloom@rainyday.com","joy@happyday.com","success@goodjob.com");
$body_array = array(
"This release has close to 500 fixes in it and has gone through almost 7 rounds of validation. We think it is a stable product that you can directly use in deployment! ",
"Nice to have you visit us, very nice of you. Stay for sometime and have a look at our product. I am sure you will like it",
"This will take some time to fix. Can you provide me more details please?","What a cool tool! I wish I had found it earlier. Oh it has a lot of my friends name in it too! I too can contribute. But how?",
"Urgent. I need this done last week! Guys, you are the ones I am depending on. Do something!"
);

for($i=0;$i<5;$i++)
{
	$email = new Emails();

	$email->column_fields["assigned_user_id"] = $assigned_user_id;
	
	$rand = array_rand($num_array);
	$email->column_fields["subject"] = $esubj_array[$i];
	$email->column_fields["filename"] = $filename_array[$i];	
	$email->column_fields["date_start"] = $startdate_array[$i];
	$email->column_fields["semodule"] = 'Tasks';
	$email->column_fields["activitytype"] = 'Emails';
	$email->column_fields["description"] = $body_array[$i];	
	$email->column_fields["saved_toid"] = $to_array[$i];
	$focus->column_fields['ccmail'] = $cc_array[$i];
	$focus->column_fields['bccmail'] = $bcc_array[$i];
	$email->save("Emails");
	$email_ids[] = $email->id;
}

//Populate PriceBook data

$PB_array = array ("CRM", "ERP", "Носки", "Майки", "Компьютеры", "Прикладное ПО", "Розница", "Мелкий Опт", "Средний Опт", "Опт", "VIP");
$Active_array = array ("0", "1", "1", "0", "1","0", "1", "1", "0", "1","0");

//$num_array = array(0,1,2,3,4);
for($i=0;$i<12;$i++)
{
	$pricebook = new PriceBooks();

	$rand = array_rand($num_array);
	$pricebook->column_fields["bookname"]   = $PB_array[$i];
	$pricebook->column_fields["active"]     = $Active_array[$i];
	$pricebook->column_fields["currency_id"]     = '1';

	$pricebook->save("PriceBooks");
	$pricebook_ids[] = $pricebook ->id;
}

// Populate Ticket data

$status_array=array("Open","In Progress","Wait For Response","Open","Closed");
$category_array=array("Big Problem","Small Problem","Other Problem","Small Problem","Other Problem");
$ticket_title_array=array("Ошибка загрузки вложений",
			"Индивидуальная адаптация-Меню и RSS","Экспорт Данных",
		"Ошибка импорта Зацепок в CSV","Как автоматически добавить Зацепку из веб-формы в VtigerCRM");

for($i=0;$i<5;$i++)
{
	$helpdesk= new HelpDesk();
	
	$rand=array_rand($num_array);
	$contact_key = array_rand($contact_ids);
    $helpdesk->column_fields["parent_id"] 	= 	$contact_ids[$contact_key];

	$helpdesk->column_fields["ticketpriorities"]= "Normal";
	$helpdesk->column_fields["product_id"]	= 	$product_ids[$i];

	$helpdesk->column_fields["ticketseverities"]	= "Minor";
	$helpdesk->column_fields["ticketstatus"]	= $status_array[$i];
	$helpdesk->column_fields["ticketcategories"]	= $category_array[$i];
	//$rand_key = array_rand($s);$contact_key = array_rand($contact_ids);
	$notes->column_fields["contact_id"] 	= 	$contact_ids[$contact_key];
	$helpdesk->column_fields["ticket_title"]	= $ticket_title_array[$i];
	$helpdesk->column_fields["assigned_user_id"] = $assigned_user_id;
	
	$helpdesk->save("HelpDesk");
	$helpdesk_ids[] = $helpdesk->id;
	
	if ($i > 3)
	{
		$freetag = $adb->getUniqueId('vtiger_freetags');
		$query = "insert into vtiger_freetags values (?,?,?)";
		$qparams = array($freetag, $cloudtag[3], $cloudtag[3]);
		$res_tkt = $adb->pquery($query, $qparams);

		$date = $adb->formatDate(date('YmdHis'), true); 
		$query_tag = "insert into vtiger_freetagged_objects values (?,?,?,?,?)";
		$tag_params = array($freetag, 1, $helpdesk->id, $date, 'HelpDesk');
		$result_tkt = $adb->pquery($query_tag, $tag_params);
	}

}

// Populate Activities Data
$task_array=array("Совещание с начальством","Позвонить Дмитрию","Отправть факс Владимиру Куликову");
$event_array=array("","","Позвонить Иванову","Встреча Комманды","Позвонить Григорию","Встреча с Василием");
$task_status_array=array("Planned","In Progress","Completed");
$task_priority_array=array("High","Medium","Low");
$visibility=array("","","Private","Public","Private","Public");

for($i=0;$i<6;$i++)
{
	$event = new Activity();
	
	$rand_num=array_rand($num_array);

	$rand_date = & create_date();
	$en=explode("-",$rand_date);
	if($en[1]<10)
		$en[1]="0".$en[1];
	if($en[2]<10)
		$en[2]="0".$en[2];
	$recur_daily_date=date('Y-m-d',mktime(0,0,0,date($en[1]),date($en[2])+5,date($en[0])));
	$recur_week_date=date('Y-m-d',mktime(0,0,0,date($en[1]),date($en[2])+30,date($en[0])));


	$start_time_hr=rand(00,23);
	$start_time_min=rand(00,59);
	$end_time_hr=rand(00,23);
	$end_time_min=rand(00,59);
	if($start_time_hr<10)
		$start_time_hr="0".$start_time_hr;
	if($start_time_min<10)
		$start_time_min="0".$start_time_min;
	if($end_time_hr<10)
		$end_time_hr="0".$end_time_hr;
	if($end_time_min<10)
		$end_time_min="0".$end_time_min;
	$end_time=$end_time_hr.":".$end_time_min;
	$start_time=$start_time_hr.":".$start_time_min;
	if($i<2)
	{
		$event->column_fields["subject"]	= $task_array[$i];	
		if($i==1)
		{
			$account_key = array_rand($account_ids);
			$event->column_fields["parent_id"]	= $account_ids[$account_key];;	
		}
		$event->column_fields["taskstatus"]	= $task_status_array[$i];	
		$event->column_fields["taskpriority"]	= $task_priority_array[$i];	
		$event->column_fields["activitytype"]	= "Task";
		$event->column_fields["visibility"] = $visibility[$i];	
				
	}
	else
	{
		$event->column_fields["subject"]	= $event_array[$i];	
		$event->column_fields["visibility"] = $visibility[$i];
		$event->column_fields["duration_hours"]	= rand(0,3);	
		$event->column_fields["duration_minutes"]= rand(0,59);	
		$event->column_fields["eventstatus"]	= "Planned";	
		$event->column_fields["time_end"]     = $end_time;
	}
	$event->column_fields["date_start"]	= $rand_date;	
	$_REQUEST["date_start"] = $rand_date;
	$event->column_fields["time_start"]	= $start_time;	
	$event->column_fields["due_date"]	= $rand_date;	
	$_REQUEST["due_date"] = $rand_date;
	$contact_key = array_rand($contact_ids);
        $event->column_fields["contact_id"]	= 	$contact_ids[$contact_key];
	if($i==4)
	{
        	$event->column_fields["recurringtype"] 	= "Daily";
		$_REQUEST["recurringtype"]  = "Daily";
		$event->column_fields["activitytype"]	= "Meeting";	
		$event->column_fields["due_date"]	= $recur_daily_date;	
	}
	elseif($i==5)
	{	
        	$event->column_fields["recurringtype"] 	= "Weekly";
		$_REQUEST["recurringtype"]  = "Weekly";
		$event->column_fields["activitytype"]	= "Meeting";	
		$event->column_fields["due_date"]	= $recur_week_date;	
	}
	elseif($i>1) 
	{
		$event->column_fields["activitytype"]	= "Call";	
	}
	$event->column_fields["assigned_user_id"] = $assigned_user_id;
	$event->save("Calendar");
        $event_ids[] = $event->id;

}
// Turn-off Popup reminders for demo events
$adb->query("UPDATE vtiger_activity_reminder_popup set status = 1");

$adb->pquery("update vtiger_crmentity set smcreatorid=?", array($assigned_user_id));

$expected_revenue = Array("250000","750000","500000");
$budget_cost = Array("25000","50000","90000");
$actual_cost = Array("23500","45000","80000");
$num_sent = Array("2000","2500","3000");
$clo_date = Array('2011-1-2','2011-2-3','2011-4-12');

$expected_response_count = Array("2500","7500","5000");
$expected_sales_count = Array("25000","50000","90000");
$expected_roi = Array("23","45","82");

$actual_response_count = Array("250","750","1500");
$actual_sales_count = Array("1250","5200","2390");
$actual_roi = Array("21","14","12");

$sponsor = Array("Finace","Marketing","Sales");
$targetsize = Array("210000","13390","187424");
$targetaudience = Array("Менеджеры","Директора","Сотрудники");

//$expected_response = Array(null,null,null);
for($i=0;$i<count($campaign_name_array);$i++)
{
	$campaign = new Campaigns();
	$campaign_name = $campaign_name_array[$i];
	$campaign->column_fields["campaignname"] = $campaign_name;
	$campaign->column_fields["campaigntype"] = $campaign_type_array[$i];
	$campaign->column_fields["campaignstatus"] = $campaign_status_array[$i];
	$campaign->column_fields["numsent"] = $num_sent[$i];
	$campaign->column_fields["expectedrevenue"] = $expected_revenue[$i];
	$campaign->column_fields["budgetcost"] = $budget_cost[$i];
	$campaign->column_fields["actualcost"] = $actual_cost[$i];
	$campaign->column_fields["closingdate"] = $clo_date[$i];
	$campaign->column_fields["expectedresponse"] = $expected_response[$i];
	$campaign->column_fields["assigned_user_id"] = $assigned_user_id;
	
	$campaign->column_fields["expectedresponsecount"] = $expected_response_count[$i];
	$campaign->column_fields["expectedsalescount"] = $expected_sales_count[$i];
	$campaign->column_fields["expectedroi"] = $expected_roi[$i];
	$campaign->column_fields["actualresponsecount"] = $actual_response_count[$i];
	$campaign->column_fields["actualsalescount"] = $actual_sales_count[$i];
	$campaign->column_fields["actualroi"] = $actual_roi[$i];
	$campaign->column_fields["sponsor"] = $sponsor[$i];
	$campaign->column_fields["targetsize"] = $targetsize[$i];
	$campaign->column_fields["targetaudience"] = $targetaudience[$i];
	
	$campaign->save("Campaigns");
}

//Populate My Sites Data 

$portalname = array ("Russian VtigerCRM Fork - Project", "Russian VtigerCRM
Fork - Group");
$portalurl = array ("http://code.google.com/p/vtiger-ru-fork/",
"http://groups.google.com/group/vtiger-ru-fork");

for($i=0;$i<5;$i++)
{
	$portalid = $adb->getUniqueId('vtiger_portal');
	$portal_qry = "insert into vtiger_portal values (?,?,?,?,?)";
	$portal_params = array($portalid, $portalname[$i], $portalurl[$i], 0, 0);
	$result_qry = $adb->pquery($portal_qry, $portal_params);
}

//Populate RSS Data
$rssname = array("Russian VtigerCRM Fork - Новости Проекта","Russian VtigerCRM
Fork - Wiki");
$rssurl =
array("http://code.google.com/feeds/p/vtiger-ru-fork/updates/basic","http://code
.google.com/feeds/p/vtiger-ru-fork/hgchanges/basic?repo=wiki");

for($i=0;$i<2;$i++)
{
	$rssid = $adb->getUniqueId('vtiger_rss');
	$rss_qry = "insert into vtiger_rss values (?,?,?,?,?)";
	$rss_params = array($rssid, $rssurl[$i], $rssname[$i], 0, 0);
	$result_qry = $adb->pquery($rss_qry, $rss_params);
}
$adb->query("DELETE FROM com_vtiger_workflowtask_queue"); 
?>
