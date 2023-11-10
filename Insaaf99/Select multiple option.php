 <select id="select" class="selectbox category form-control" name="language[]" id="language" data-placeholder="Select Language" multiple>
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
                                            $selected_languages = json_decode($edit_data->language);
                                    if (!empty($selected_languages) && is_array($selected_languages)) {
                                      
                                        foreach ($languages as $code => $name) {
                                            $selected = in_array($code,$selected_languages) ? 'selected' : '';
                                            echo '<option value="' . $code . '" ' . $selected . '>' . $name . '</option>';
                                        }
                                    } else {
                                            $selected_lang = explode(',',$edit_data->language);
                                            foreach ($selected_lang as &$lang) {
                                                    $lang = strtolower(trim($lang));
                                                }
                                        // $selected_lang = $edit_data->language;
                                           foreach ($languages as $code => $name) {
                        $selected = in_array($code, $selected_lang) ? 'selected' : '';
                        echo '<option value="' . $code . '" ' . $selected . '>' . $name . '</option>';
                                             }
                                    }
                                    ?>
                                </select>
