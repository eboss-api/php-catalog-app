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

1. Download the zip files from github.
2. Extract the zip files which should leave two folders (one for the wrapper and one for the app).  
3. Edit the "config.example.php" to add in the API username, key (password) and brand ID supplied to you by EBOSS.  Then rename the file to "config.php".
4. Combine the contents of the downloaded zip files to one folder you create on your server via FTP. We suggest creating a directory folder (eg "architects" so it can be found at "supplier.co.nz/architects") that's included in your navigation menu.
5. To add your own header or footer, you can edit the files in the "layout > includes" folder to paste in your header or footer code.
6. This app is designed to look good out of the box, however if necessary, styles can be tweaked in the "layout > css" folder.

1-4 should not take longer than 30 minutes to complete. We advise checking with your client before doing any work that requires additional hours outside of the two hours we have told them as an estimate of implementation time.


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
