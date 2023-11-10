<?php

$languages = array(
                                            "english" => "English",
                                            "hindi" => "Hindi",
                                            "assamese" => "Assamese",
                                            "bengali" => "Bengali",
                                            "bodo" => "Bodo",
                                            "dogri" => "Dogri",
                                            "gujarati" => "Gujarati",
                                            "kannada" => "Kannada",
                                            "kashmiri" => "Kashmiri",
                                            "konkani" => "Konkani",
                                            "maithili" => "Maithili",
                                            "malayalam" => "Malayalam",
                                            "manipuri" => "Manipuri",
                                            "marathi" => "Marathi",
                                            "nepali" => "Nepali",
                                            "odia" => "Odia (Oriya)",
                                            "punjabi" => "Punjabi",
                                            "sanskrit" => "Sanskrit",
                                            "santali" => "Santali",
                                            "sindhi" => "Sindhi",
                                            "tamil" => "Tamil",
                                            "telugu" => "Telugu",
                                            "urdu" => "Urdu"
                                        );
                                            $selected_languages = json_decode($userData->language);
                                    if (!empty($selected_languages) && is_array($selected_languages)) {
                                      
                                        foreach ($languages as $code => $name) {
                                            $checked = in_array($code,$selected_languages) ? 'checked' : '';
                                               echo '<div class="checkbox"><label><input type="checkbox" name="language[]" value="' . $code . '" ' . $checked . '>' . $name . '</label></div>';
                                        }
                                    } else {
                                            $selected_lang = explode(',',$userData->language);
                                            foreach ($selected_lang as &$lang) {
                                                    $lang = strtolower(trim($lang));
                                                }
                                           foreach ($languages as $code => $name) {
                        $checked = in_array($code, $selected_lang) ? 'checked' : '';
                             echo '<div class="checkbox"><label><input type="checkbox" name="language[]" value="' . $code . '" ' . $checked . '>' . $name . '</label></div>';
                                             }
                                    }
                                    ?>
