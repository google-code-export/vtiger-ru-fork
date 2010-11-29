Summary:
This PDF settings tool takes advantage of the CRM's module manager and TCPDF improvements. 
You may use the Module Manager to extend the CRM menu but you have also some update some some server files manually

Installation instructions:

Step 1: save your existing system

1. Make a backup of your database and your file system before you apply any changes.


Step 2: apply the program modifications

1. If you have installed an older version of the PDF Configurator from crm-now, drop all 6 tables in your DB with a name that starts with "crmnow_....".

2. Open your Modul Manager in the CRM and goto the custom module tab. Install the Pdfsettings.zip file (Do not unzip this files) provided with this download.

3. Copy all serverfiles provided with this package into your CRM file system. This will replace existing files and adds new files.

4. Delete any existing Smarty cache file at /Smarty/templates_c and your browser cache.

You will find a new settings menu called PDF Settings at the Tools tab of your CRM.

Modifications:

- each of the PDF files is based on its own language files. This package is provided with English and German language files. You may add your individual language by ceating a new language file.
- the company logo is taken from the settings->company information settings, you may upload an image with the correct size (close to 300*70 pixel recommended)
- the address field is based on the European address format and formated to fit in the window of European letter envelopes, you may change the format at header.php
- the content of the footer is created at the footer.php files, you may change it to your needs. Note that phone, fax and web site information are taken from the company information at settings
- the European number format is used, you may change it at the pdfcreator.php file
- currently all tax calculations are set to pre tax values you may change this to after tax by changing the $taxbasis at pdfcreator.php

If you have any questions, comments or is you find any bugs please post at the vtiger forum. Do not contact crm-now directly.
Note that this is work in progress. Any hints and contributions for improvements are appreciated.
However, no developer support is provided.

You may check this PDF generator at https://vtigercrm5x.co.crm-now.de

As always, this package comes without any warranty. You may use it on your own risk.

This is a Open Source contribution from crm-now to the vtiger community. crm-now supports the vtiger project by providing
extensions, bugfixes and documentations since version 4.0
You may check out other contributions from crm-now such as:
- German language files
- Data Retrieval Tool
- Improved Outlook Plugin (free and commercial)
- vtiger manual
- Excel import macro
- UTF-8 Converter

For more information about crm-now you may visit our web site at www.crm-now.com
