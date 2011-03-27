<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version 1.1.2
 * ("License"); You may not use this file except in compliance with the 
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an  "AS IS"  basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for
 * the specific language governing rights and limitations under the License.
 * The Original Code is:  SugarCRM Open Source
 * The Initial Developer of the Original Code is SugarCRM, Inc.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.;
 * All Rights Reserved.
 * Contributor(s): ______________________________________.
 ********************************************************************************/
/*********************************************************************************
 * $Header: /advent/projects/wesat/vtiger_crm/sugarcrm/modules/Contacts/contactSeedData.php,v 1.4 2005/03/05 08:11:44 jack Exp $
 * Description:  TODO: To be written.
 ********************************************************************************/

//vtiger-ru-fork 27.10.2010 Eugene Babiy
$last_name_array = Array(
"Петров",
"Сидоров",
"Иванов",
"Куликов",
"Хрущев",
"Брежнев",
"Лихачев",
"Баранов",
"Петренко",
"Джонсон"
);

$first_name_array = Array(
"Антон",
"Максим",
"Виктор",
"Иван",
"Александр",
"Вадим",
"Владимир",
"Николай",
"Дмитрий",
"Петр",
"Владислав",
"Валентин"
);

//vtiger-ru-fork 28.10.2010 Eugene Babiy
require_once('include/database/PearDatabase.php');
$company_name_array = Array(
"Наша CRM Система",
"Наши Инвестиции, ООО",
"Группа Компаний ОРФО Лимитед, ООО",
"Иванов Иван Сидорович, ФЛП",
"Все Что Вам Угодно, Фирма",
"Абромович Роман, ИП",
"Используем с умом CRM, ЗАО",
"Новые Технологии, ЧП",
"Любопытные Факты, ООО",
"Открытые Системы для Бизнеса, АО"
);

//vtiger-ru-fork 28.10.2010 Eugene Babiy
$street_address_array = Array(
 "ул. Неизвестная 1",
 "просп. Великий 2",
 "наб. Новоиспеченная 123",
 "пров. Какой Угодно 321"
);

//vtiger-ru-fork 28.10.2010 Eugene Babiy
$city_array = Array(
  "Киев",
  "Харьков",
  "Днепропетровск",
  "Москва",
  "Санкт Питербург",
  "Минск",
  "Баку",
  "Тбилиси",
  "Ереван"
);

/*vtiger-ru-fork 29.10.10 Eugene Babiy

$state_array = Array(
"Киевская",
"Житомирская",
"Черновицкая",
"Черниговская",
"Хмельницкая",
"Донецкая",
"Днепропетровская",
"Одесская",
"Кировоградская",
"Винницкая",
"Львовская",
"Закарпатская",
"Тернопольская",
"Луганская",
"Запорожская",
);
*/

$campaign_name_array = Array(
"Конференция - Открытые Системы в Бизнесе 2010",
"Международная выставка Open Source ERP/CRM Solutions",
"Маркетинговая Кампания среди основных Клиентов"
);

$campaign_type_array = Array(
"Conference",
"Trade Show",
"Direct Mail",
);

$campaign_status_array = Array(
"Planning",
"Planning",
"Completed",
);
 

$last_name_count = count($last_name_array);
$first_name_count = count($first_name_array);
$company_name_count = count($company_name_array);
$street_address_count = count($street_address_array);
$city_array_count = count($city_array);



?>
