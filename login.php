<?php
 <form  action="<?php echo base_url(); ?>admin/login/loginMe" method="post">
                                    <div class="container for_m_pld_qury__">
                                        <div class="row">
                                            <div class="col-md-10 formInnerCon" id="formAreaCon">
                                                <div id="" class="show  biiling_details_bg "
                                                    aria-labelledby="headingOne" data-parent="#">
                                                    <div class="form">
                                                        <div class="Register" style=" color:red;"> </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="email_validation"></div>
                                                                <div class="form-group for_text_Indhf">
                                                                    <label for="email">Email <span
                                                                            class="text-muted">*</span></label>
                                                                    <input type="email" class="form-control email ___mobiletypeframe"
                                                                        maxlength="128" name="email" id="email" value=""placeholder="Enter your Email"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group for_text_Indhf">
                                                                    <label for="Enrolement">Password</span> <span
                                                                            class="text-muted">*</span></label>
                                                                    <input type="password" class="form-control state ___mobiletypeframe"
                                                                        name="password" value="" required placeholder="State">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-5">
                                                            <div class="col-md-12">
                                                                <div class="text-center">
                                                                    <input type="hidden" name="doc_id" value="">
                                                                    <div class="for_but_imsg_qury_sent">
                                                                    <button type="submit" class="btn btn-lg" style="margin-bottom: 8px;">Login</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>



?>
