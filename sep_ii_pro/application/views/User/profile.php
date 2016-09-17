<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/ishan/css/style.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/ishan/js/myScript.js"></script>

<div class="I_header_nav">
    <div class="I_page_body">

        <div class="row">
            <div class="col-md-12 I_page_header">
                <div class="I_page_header_text" style="">My Profile</div>
            </div>
        </div>

        <div class="container">

            <div class="row" style="margin-top:30px;">

                <!--profile picture-->
                <div class="col-md-3">
                    
                    <!--profile picture content div-->
                    <div class="row I_profile_pic_bacground">
                        
                        <div style="padding:5px;background-color:#00cc66;"></div>

                        <div style="padding:10px;background-color:#fffff;"></div>
                        
                        <img class="img-thumbnail img-responsive I_profile_pic" src="<?php echo base_url() ?>assets/images/profilePics/profile.jpg" />
                        
                        <div style="padding:10px;background-color:#fffff;"></div>
                        
                        <div class="I_username">Samanali Fonseka</div>
                    
                    </div>

                </div>
                
                <!--tab content div-->
                <div class="col-md-9">

                    <!--green nav bar-->
                    <ul class="nav nav-tabs I_nav_baackground">
                        <li><a class="active I_navbar_style" href="#profile" data-toggle="tab">Profile</a></li>
                        <li><a class="I_navbar_style" href="#rr" data-toggle="tab">sds</a></li>
                        <li><a class="I_navbar_style" href="#messages" data-toggle="tab">Messages</a></li>
                        <li><a class="I_navbar_style" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>

                    <div class="tab-content I_tab_content_bacground">

                        <!--start of profile tab-->
                        <div class="tab-pane active" id="profile" role="tabpanel">

                            <div class="row" style="">
                                <div style="padding:30px;">
                                    <p class="I_tab_content_sub_header">
                                       ABOUT                                       
                                    </p>
                                </div>
                                <div style="padding-left:30px;">

                                </div>
                            </div>

                            <div class="row" style="padding:0px 20px 0px 20px;">
                                <div class="col-md-6">
                                    <div class="row" style="padding:4px 2px 4px 2px;">
                                        <div class="col-xs-4">
                                            <label>First Name:</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="firstName" class="form-control" value="Samanali" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row" style="padding:4px 2px 4px 2px;">
                                        <div class="col-xs-4">
                                            <label>Last Name:</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="lastName" class="form-control" value="Fonseka" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-md-6">
                                    <div class="row" style="padding:4px 2px 4px 2px;">
                                        <div class="col-xs-4">
                                            <label>Country:</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <select class="form-control" value="">
                                                <option>SriLanka</option>
                                                <option>India</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row" style="padding:4px 2px 4px 2px;">
                                        <div class="col-xs-4">
                                            <label>Phone:</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control" value="Fonseka" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-md-6">
                                    <div class="row" style="padding:4px 2px 4px 2px;">
                                        <div class="col-xs-4">
                                            <label>Email:</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="email" class="form-control" value="Samanali@gmail.com" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row" style="padding:4px 2px 4px 2px;">
                                        <div class="col-xs-4">
                                            <label>Address:</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control" value="No 12/55,Kandy Rd,Kothalawala" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--end of profile tab-->
                        
                        <!--start of  tab-->
                        <div class="tab-pane" id="rr" role="tabpanel">
                            ..dsd.
                        </div>
                        <!--end of  tab-->
                        
                        <!--start of  tab-->
                        <div class="tab-pane" id="messages" role="tabpanel">
                            ...
                        </div>
                        <!--end of  tab-->
                        
                        <!--start of  tab-->
                        <div class="tab-pane" id="settings" role="tabpanel">
                            ...
                        </div>
                        <!--end of  tab-->
                        
                    </div>

                </div>
                <input class="form-control" style="background-color:#f89c2c; width:80px; color: #ffffcc; float: right;" value="Edit" data-toggle="modal" data-target="#myModal" type="button" />
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

                <div class="row" style="padding:10px 20px 0px 20px;">
                    <div class="col-xs-6">
                        <p style="font-weight:bold">First Name:</p>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value="Samanali" />
                    </div>
                </div>
                <div class="row" style="padding:10px 20px 0px 20px;">
                    <div class="col-xs-6">
                        <p style="font-weight:bold">Last Name:</p>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value="Fonseka" />
                    </div>
                </div>
                <div class="row" style="padding:10px 20px 0px 20px;">
                    <div class="col-xs-6">
                        <p style="font-weight:bold">Country:</p>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value="Fonseka" />
                    </div>
                </div>
                <div class="row" style="padding:10px 20px 0px 20px;">
                    <div class="col-xs-6">
                        <p style="font-weight:bold">Last Name:</p>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value="Fonseka" />
                    </div>
                </div>
                <div class="row" style="padding:10px 20px 0px 20px;">
                    <div class="col-xs-6">
                        <p style="font-weight:bold">Last Name:</p>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value="Fonseka" />
                    </div>
                </div>
                <div class="row" style="padding:10px 20px 0px 20px;">
                    <div class="col-xs-6">
                        <p style="font-weight:bold">Last Name:</p>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value="Fonseka" />
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->