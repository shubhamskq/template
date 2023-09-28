<?php if(isset($selectedCaseCat)) {
                     
                          $jsonString = $citydetails->catdesc;
                          $decoded_desc = json_decode($jsonString);
                     
                       $myArray = json_decode(json_encode($decoded_desc), true);
                       // pre($myArray);
                       // exit;
                          foreach($myArray as $k => $v) { 
                               if($selectedCaseCat['name'] == 'Civil'){
                                pre($v['civil']);
                               }
                                else if($selectedCaseCat['name'] == 'Criminal Case'){
                                pre($v['criminal case']);
                               }
                                else if($selectedCaseCat['name'] == 'Divorce'){
                                pre($v['divorce']);
                               }
                                else if($selectedCaseCat['name'] == 'Intellectual Property Rights'){
                                pre($v['intellectual property rights']);
                               }
                                else if($selectedCaseCat['name'] == 'Property Dispute'){
                                pre($v['property dispute']);
                               }
                          }
                      }

?>
