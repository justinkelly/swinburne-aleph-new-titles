News titles list for Swinburne Library
=====

Developed to highlight new items in the Swinburne Library based on information from ExLibris Aleph 

See it in action: http://www.swinburne.edu.au/lib/new_titles/

License: GPLv3 or above

Data
---

You need to create an Aleph report that generates the below data format

```` xml
<section-02>
<title-1>Call No. (Bib)</title-1>
<data-1></data-1>
<title-2>Author</title-2>
<data-2>Bernard, Tempie.</data-2>
<title-3>Title</title-3>
<data-3>Personal selling and direct marketing [electronic resource] /</data-3>
<title-4>Format</title-4>
<data-4>BK</data-4>
<title-5>ISBN/ISSN/Pub. No.</title-5>
<data-5>9788132340027</data-5>
<title-6>Doc. Number</title-6>
<data-6>000930049</data-6>
</section-02>
````

Upload your data as data.xml and place in this directory

Config
---
Edit the inc.php file and set the below 4 confirguration settings

```` php
$config['syndetics']=''; //enter your syndetics client code
$config['primo_institution']=''; //enter your primo instition
$config['primo_vid']=''; // enter your primo view id
$config['syndetics']='http://librarysearch.swinburne.edu.au/primo_library/libweb/action/dlSearch.do? . $aleph_id ."&vid=' . $config['primo_vid'] . '&onCampus=true&group=GUEST&institution='. $config['primo_institution'] .'query=any,contains,'; //set your primo deep link to search results

````
Includes
---
jQuery Isotope:
http://isotope.metafizzy.co/

Twitter Bootstrap CSS: 
http://twitter.github.com/bootstrap/