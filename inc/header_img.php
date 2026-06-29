<?php
/**
 * @param $name
 *
 * @return string
 */
function image_name( $name ) {
	switch ( $name ) {
		case 'story':
		case 'our-story':
		case 'happy-egg':
			$img = '/8.png';
			break;
		
		case 'buy':
			$img = '/1.png';
			break;
		case 'learn':
			$img = '/4.png';
			break;
		case 'games':
			$img = '/header-games.png';
			break;
		case 'resale':
		case 'lucky-egg':
			$img = '/6.png';
			break;
		case 'products':
		case 'king-egg':
			$img = '/12.png';
			break;
		case 'emoji-egg':
			$img = '/9.png';
			break;
		case 'happy-egg-surprises-gummies-vitamin-c-toy':
			$img = '/10.png';
			break;
		case 'lucky-egg-surprises-multivitamin-gummies-toy':
			$img = '/13.png';
			break;
		case 'giant-magik-egg':
			$img = '/15.png';
			break;
		case 'magik-egg':
			$img = '/16.png';
			break;
		case 'news':
			$img = '/5.png';
			break;
		case 'news-inner':
			$img = '/18.png';
			break;
		case 'childrens':
		    $img = '/childpolicy.png';
			break;
		case 'big-king-egg':
			$img = '/11.png';
			break;
		case 'tou':
			$img = '/head_8.jpg';
			break;
		case 'my-account':
			$img = '/myaccount.png';
			break;
		case 'press':
			$img = '/head_9.jpg';
			break;
		case 'faq':
			$img = '/head_10.jpg';
			break;
		case 'happy':
			$img = '/21.png';
			break;
		case 'king':
			$img = '/3.png';
			break;
		case 'lucky':
			$img = '/20.png';
			break;
		case 'magik':
			$img = '/19.png';
			break;
		case 'privacy':
			$img = '/privpolicy.png';
			break;
		case 'contact-us':
			$img = '/Contact_us.jpg';
			break;
		case 'cart':
			$img = '/7.png';
			break;
		case 'shipping':
			$img = '/shippolicy.png';
			break;
		case 'return':
			$img = '/retpolicy.png';
			break;
	    case 'termofuse':
			$img = '/termsofuse.png';
			break;	
		case 'digital-catalogue':
			$img = '/bg-cl.jpg';
			break;
		case 'catalogue-request':
			$img = '/22.png';
			break;
		default:
			$img = '/head_9.jpg ';
			break;

	}

	return $img;
}
