<?php
session_start();
ini_set('display_errors', 1);

include("php-mailjet-v3-simple.class.php");

    $apiKey = '1bd764f2fa2a174e3aefa96c433f8290';
    $secretKey = '981432a2ba97518decc94ab53303d5aa';

$mj = new Mailjet( $apiKey, $secretKey );

$ok =1;

// if (isset($_POST) && !empty($_POST)) 
// {
//     if (isset($_SESSION['posttimer']))
//     {
//         if ( (time() - $_SESSION['posttimer']) <= 300)
//         {
//             // less then 2 seconds since last post
//             $ok = 0;
            
//         }
//         else
//         {




//$listID ='1732916';


$contactEmail = htmlentities($_POST["sub_email"], ENT_QUOTES, "UTF-8");

$contactChoice = htmlentities($_POST["contactChoice"], ENT_QUOTES, "UTF-8");

$list_id =$contactChoice;
$params = array(
    'method'    => 'POST',
    'Email' =>  $contactEmail,

);



            $result = $mj->contact($params);

            if(isset($result->StatusCode) && $result->StatusCode == '400')
                return false;

            $contact_id = $result->Data[0]->ID;

            // Add the contact to a contact list
            $params = array(
                'method'    => 'POST',
                'ContactID' => $contact_id,
                'ListID'    => $list_id,
                "IsActive"  =>  True
            );
            $result = $mj->listrecipient($params);
/////////////////////////////////////////////////////////////////////////////

// $viewContact = [
//     "method"    =>  "VIEW",
//     "unique"    =>  $contactEmail
// ];

// $contact = $mj->contact($viewContact);

// //echo "Contact ID: ".$contact->Data[0]->ID."\n";


// $id = $contact->Data[0]->ID;

// echo $id;

/////////////////////////////////////////////////////
   
           // more than 2 seconds since last post

//             $ok = 1;

//         }

//     }
//     $_SESSION['posttimer'] = time();

    
    
// }


echo json_encode($ok); 


//     // if ($mj->_response_code == 200)
//     //    echo "Email Added";
//     // else
//     //    echo "error - ".$mj->_response_code;
// if (isset($_SESSION['token']))
// {
//     if (isset($_POST['tokenSend']))
//     {
//         if ($_POST['tokenSend'] != $_SESSION['token'])
//         {
//             // double submit
//             $ok = 0;
//         }
//         else
//         {
//             $ok = 1;
//         }
//     }
// }

// echo json_encode($ok); 




?>