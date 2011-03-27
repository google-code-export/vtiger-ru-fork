

<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
global $currentModule;

echo "<B>Карта представления!<B>";

?>

<applet code="freemind.main.FreeMindApplet.class" archive="./modules/MyMind/freemindbrowser.jar" width="100%" height="750">

<param name="type" value="application/x-java-applet;version=1.4"/>
<param name="scriptable" value="false"/>
<param name="modes" value="freemind.modes.browsemode.BrowseMode"/>
<param name="browsemode_initial_map" value="./modules/MyMind/map.mm"/>
<param name="initial_mode" value="Browse"/>
<param name="selection_method" value="selection_method_direct"/>

</applet>
