<?php
$xml = simplexml_load_file("data.xml");

// Original PHP code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

function myTruncate($string, $limit, $break=".", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}

$i=0;
foreach($xml->children() as $child)
  {
	//only process section02 records
 	if( ($child->getName() =='section-02') AND ($i <200))
	{
		$i++;
		$call_number = $child->{'data-1'};
		$author =  $child->{'data-2'};
		$title =  $child->{'data-3'} ;
		$format =  $child->{'data-4'} ;
		$isbn =  $child->{'data-5'} ;
		$aleph_id = $child->{'data-6'};

		//call number
		if($call_number=="")
		{
			$call_number ="000";
		} else {
			$call_number = substr($call_number,0,1) . "00";
		}

		//cleanup title
		//remove trailing 

		if(substr($title, -1) == "/")
		{
			$title = substr($title,0,-1);
		} 

		//remove [''] data
		if(strstr($title,"[electronic resource]") OR $format =='ELECT' OR $format =='CF')
		{
			$label_class = 'label label-info';
			$format = 'eBook';
			$title = str_replace("[electronic resource]", "", $title);
	
		}
		if(strstr($title,"[videorecording]"))
		{
			$format = 'Video';
			$label_class = 'label label-inverse';
			$title = str_replace("[videorecording]", "", $title);
	
		}
	
		if($format =='VM' OR $format =='VHS' OR $format =='DVD' OR $format =='FILM')
		{
			$format = 'Video';
			$label_class = 'label label-inverse';
		}
		if($format =='BK')
		{
			$format = 'Book';
			$label_class = 'label';
		}
		if($format =='MU' OR $format=='CD' OR $format == 'MUSIC')
		{
			$format = 'Audio';
			$label_class = 'label label-warning';
		}


		//if first 9 char are numbers than its an isbn or issn and strip anythign after first space
		if (preg_match("/^[0-9]{8}/", $isbn)) 
		{
			$explode_isbn = explode(" ",$isbn);
			$isbn = $explode_isbn['0'];
		} else {
			$isbn = "000";
		}

		//thumb

		//thumbnail
/*		$url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . $isbn . "&maxResults=1";
		$data = json_decode(file_get_contents($url),true);
		$thumb =$data['imageLinks']['thumbnail'];
*/
	//	var_dump($data);
		//prim o link
		//$primo_link = "http://librarysearch.swinburne.edu.au/primo_library/libweb/action/search.do?vl(freeText0)=" . $aleph_id . "&fn=search&vid=SWIN2";
		$primo_link = "http://librarysearch.swinburne.edu.au/primo_library/libweb/action/display.do?tabs=detailsTab&ct=display&fn=search&doc=sut_aleph" . $aleph_id . "&indx=1&recIdxs=0&elementId=0&renderMode=poppedOut&displayMode=full&frbrVersion=&dscnt=0&vid=SWIN2";
		echo "
  <div class='item " .$format . " " . $call_number ."'>
    <div class='thumbnail'>
	<div class='innerthumb'>
	<!-- 200px x 150px -->
      <a href='". $primo_link."'>
		<img class='thumb thumb".$format."' width='70px' height='100px' src='http://syndetics.com/index.php?isbn=". $isbn ."/sc.jpg&client=swina' alt=''/>
	</a>
	</div>
	<p>". myTruncate($title, '40', ' ') ."</p>
      <p>
	<a href='". $primo_link ."'>
	<img class='external-link' src='http://librarysearch.swinburne.edu.au/primo_library/libweb/images/extlink.gif'>
	Get It</a>  
	<span class='" . $label_class . "'>". $format . "</span>
</p>
    </div>
  </div>";

	}
  }
?>
