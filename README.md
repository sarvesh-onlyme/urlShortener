urlShortener
============

It is php based url shortener

Description
===========
1. First comes index.html, which will takes the Long URL as input from user and through ajax it'll proceed url and show shortenURL on the same web page.
2. The seconds explaination comes for url.php. It would handle two types of data/processes.
    1. Ajax Request: If url.php is getting ajax request then isset($_GET['url']) would be true and if section will be operated in which shortenURL is being generated.
       It generate url on the basis of latest index found in mysql table, whatever the index is it'll generate alphabetical(,for now can be anything) url. Or lets say it'll encode index to base 52(alphabets only), and store that url in sql table.
    2. Redirect Request: If url.php is getting redirect url then isset($_GET['shortUrl']) would be true and other section will be operated in which url is again decoded in corresponding index, and row corresponding to that index will be the match, after that picking actuall URL and done the redirection part.
3. Now comes db.class.php, its just the collection of mysql database related function class, so that one doesn't confuse with mysql and php part.
4. Rest are css and js files.

SetUp
=====
1. Run 'git clone [https://github.com/sarvesh-onlyme/urlShortener.git](https://github.com/sarvesh-onlyme/urlShortener.git)' to your localhost directory i.e htdocs/ in Windows and may be /var/www in linux.
2. Open db.class.php, edit HOSTNAME, USERNAME and PASSWORD.
3. Open javascripts/url.js edit DOMAIN to /path/to/urlShortener
4. Finally, Open 'DOMAIN/path/to/urlShortener/index.html'
