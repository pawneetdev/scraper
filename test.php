<?php
/*
// Set the content type to be XML, so that the browser will   recognise it as XML.
header( "content-type: application/xml; charset=ISO-8859-15" );

// "Create" the document.
$xml = new DOMDocument( "1.0", "ISO-8859-15" );

// Create some elements.
$xml_album = $xml->createElement( "Album" );
$xml_track = $xml->createElement( "Track", "The ninth symphony" );

// Set the attributes.
$xml_track->setAttribute( "length", "0:01:15" );
$xml_track->setAttribute( "bitrate", "64kb/s" );
$xml_track->setAttribute( "channels", "2" );

// Create another element, just to show you can add any (realistic to computer) number of sublevels.
$xml_note = $xml->createElement( "Note", "The last symphony composed by Ludwig van Beethoven." );

// Append the whole bunch.
$xml_track->appendChild( $xml_note );
$xml_album->appendChild( $xml_track );

// Repeat the above with some different values..
$xml_track = $xml->createElement( "Track", "Highway Blues" );

$xml_track->setAttribute( "length", "0:01:33" );
$xml_track->setAttribute( "bitrate", "64kb/s" );
$xml_track->setAttribute( "channels", "2" );
$xml_album->appendChild( $xml_track );

$xml->appendChild( $xml_album );

// Parse the XML.
print $xml->saveXML();
*/


require_once('xml.php');
// Set the content type to be XML, so that the browser will   recognise it as XML.
header( "content-type: application/xml; charset=ISO-8859-15" );

// "Create" the document.
$xml = new DOMDocument( "1.0", "ISO-8859-15" );


$restaurant = array();
$restaurant['@attributes'] = array(
    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
    'xsi:noNamespaceSchemaLocation' => 'http://www.example.com/schmema.xsd',
    'lastUpdated' => date('c')  // dynamic values
);
 
$restaurant['masterChef'] = array(  //empty node with attributes
    '@attributes' => array(
        'name' => 'Mr. Big C.'
    )
);
 
 
$restaurant['menu'] = array();
$restaurant['menu']['@attributes'] = array(
    'key' => 'english_menu',
    'language' => 'en_US',
    'defaultCurrency' => 'USD'
);
 
 
// we have multiple image tags (without value)
$restaurant['menu']['assets']['image'][] = array(
    '@attributes' => array(
        'info' => 'Logo',
        'height' => '100',
        'width' => '100',
        'url' => 'http://www.example.com/res/logo.png'
    )
);
$restaurant['menu']['assets']['image'][] = array(
    '@attributes' => array(
        'info' => 'HiRes Logo',
        'height' => '300',
        'width' => '300',
        'url' => 'http://www.example.com/res/hires_logo.png'
    )
);
 
$restaurant['menu']['item'] = array();
$restaurant['menu']['item'][] = array(
    '@attributes' => array(
        'lastUpdated' => '2011-06-09T08:30:18-05:00',
        'available' => true  // boolean values will be converted to 'true' and not 1
    ),
    'category' => array('bread', 'chicken', 'non-veg'),	 // we have multiple category tags with text nodes
    'keyword' => array('burger', 'chicken'),
    'assets' => array(
        'title' => 'Zinger Burger',
        'desc' => array('@cdata'=>'The Burger we all love >_< !'),
        'image' => array(
            '@attributes' => array(
                'height' => '100',
                'width' => '100',
                'url' => 'http://www.example.com/res/zinger.png',
                'info' => 'Zinger Burger'
            )
        )
    ),
    'price' => array(
        array(
            '@value' => 10,  // will create textnode <price currency="USD">10</price>
            '@attributes' => array(
                'currency' => 'USD'
            )
        ),
        array(
            '@value' => 450,  // will create textnode <price currency="INR">450</price>
            '@attributes' => array(
                'currency' => 'INR'
            )
        )
    ),
    'trivia' => null  // will create empty node <trivia/>
);
$restaurant['menu']['item'][] = array(
    '@attributes' => array(
        'lastUpdated' => '2011-06-09T08:30:18-05:00',
        'available' => true  // boolean values will be preserved
    ),
    'category' => array('salad', 'veg'),
    'keyword' => array('greek', 'salad'),
    'assets' => array(
        'title' => 'Greek Salad',
        'desc' => array('@cdata'=>'Chef\'s Favorites'),
        'image' => array(
            '@attributes' => array(
                'height' => '100',
                'width' => '100',
                'url' => 'http://www.example.com/res/greek.png',
                'info' => 'Greek Salad'
            )
        )
    ),
    'price' => array(
        array(
            '@value' => 20,  // will create textnode <price currency="USD">20</price>
            '@attributes' => array(
                'currency' => 'USD'
            )
        ),
        array(
            '@value' => 900,  // will create textnode <price currency="INR">900</price>
            '@attributes' => array(
                'currency' => 'INR'
            )
        )
    ),
    'trivia' => 'Loved by the Greek!'
);
@session_start();
$xml = Array2XML::createXML('products', $_SESSION['response']);
echo $xml->saveXML();


?>
