EBOSS PHP API Catalog application
=============================


Introduction
------------
This is a PHP API Catalog application for the [EBOSS REST API](https://github.com/eboss-api/api-docs). 
This allows suppliers to quickly publish their products from the EBOSS website on their own server.


Access
------
Please [contact EBOSS](http://www.eboss.co.nz/contact) if you are an EBOSS supplier and would like access to the API.

Once approved EBOSS will supply you with an api username, api key, and brand id number.
Please see config.php for the configuration variables.


Requirements
------------
PHP 5.2 (5.3 recommended)

PHP curl extension installed or fopen enabled for external URLS


Setup
-----

There are many ways of integrating the app into your site.

The easiest (and fastest) is to insert an iFrame via a script:

1. [Download the zip files from github](https://github.com/eboss-api/php-catalog-app/archive/master.zip)
2. Extract the zip files.
3. Edit the "config.example.php" to add in the API username, key (password) and brand ID supplied to you by EBOSS.  Then rename the file to "config.php".
4. Upload the contents of the extracted folder to a folder you create on your server via FTP. We suggest creating a directory folder (eg "catalogue" so it can be found at "supplier.co.nz/catalogue") that's included in your navigation menu.  You should be able to see and browse the catalogue via your url (eg http://supplier.co.nz/catalogue/)
5. To place the catalogue within a page on your website (to integrate it wiht your header and footer) put the following snippet on the page within your site where you want the downloader to appear (updating the URL to the one you have used):
   ``<script type="text/javascript" id="EbossCatalogue" src="http://supplier.co.nz/catalogue/embed.js"></script>``
6. This app is designed to look good out of the box, however if necessary, basic styles can be tweaked in the "layout > css" folder.

This should not take longer than 30 minutes to complete. We advise checking with your client before doing any work that requires additional hours outside of the two hours we have told them as an estimate of implementation time.

If you require a more seamless integration, undertake steps 1-4 but to utilise your own header and footer you will need to enter your code in the header and footer files in the "layout > includes" folder. You may need to make necessary code modifications for this to work seamlessly depending on your website set up. An intermediate knowledge of PHP is recommended.


Authors
-------
Tim Klein, Dodat Ltd., tim[at]dodat[dot]co[dot]nz

David Craig, david[at]davidcraig[dot]co[dot]nz

Cam Findlay, Cam Findlay Consulting, info[at]camfindlay[dot]com


License
-------
This wrapper is released under the MIT License.

Copyright (c) 2013 EBOSS.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
