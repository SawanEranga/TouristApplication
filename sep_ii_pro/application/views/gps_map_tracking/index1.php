<div class="s_header_nav">
    <div class="s_page_body">

        <div class="row">
            <div class="col-md-12 s_page_header">
                <div class="s_page_header_text" style="">Map Tracking</div>
            </div>
        </div>
        <div class="voffset2"></div>
        <!--<form class="form-horizontal">-->
        <div class="container">
            <div class="row">
                <table class="col-md-12">
                    <tr>
                        <td style="width: 40px"></td>
                        <td style="width: 40px">
                            <label> Date:</label>
                        </td>
                        <td style="width: 90px">
                            <input id="invdate" type="date" style="height: 50%;" value="<?php echo date('Y-m-d'); ?>"> 
                        </td>
                        <!--class="datepicker"-->
<!--                        <td>
                            <font style="color:black;">
                                <label id="from_label">From: </label>
                            </font>
                        </td>
                        <td>
                            <input style="width:90px;height:27px;" type="time" id="from" placeholder=""/>
                        </td>
                        <td>
                            <font style="color:black;">
                            <label id="to_label">To: </label>
                            </font>
                        </td>
                        <td>
                            <input style="width:90px;height:27px;" type="time" id="to"/>
                            <span id="newspan" style="color: red;">Please Enter 24 Hours</span>
                        </td>-->

                        <td>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                        </td>
                        <td style="font-size: medium;">
                            Select Speed: 
                        <!--</td>-->
<!--                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                        <!--<td>-->
                            <p class="range-field">
                                <input type="range" id="car_range" name="car_range" max="20" min="1" value="20" onchange="doc();">
                            </p>
                        </td>  
                        <td>
                           <!--/////////////// Clear button not working///////////////////////////////////////////////////////////////-->
                            &nbsp; &nbsp; &nbsp; &nbsp;
                        </td>
                        <td>
                            <input type="button" class="btn btn-default" onclick="draw_live_route();" value="Draw Path"/>
                        </td>
                        <td>&nbsp;&nbsp;</td>
                        <td>
                            <input type="button" class="btn btn-default" onclick="Load_Map2();"value="Clear"/>
                        <td>&nbsp;&nbsp;</td>
                        <td id="Pause"><input type="image" onclick="pause_btn_clck();" id="PauseBtn" src=' <?php echo base_url() ?>assets/sawan/images/gmap/pause.png'  /></td> 
                        <td>&nbsp;&nbsp;</td>
                        <td id="Resume"><input type="image" onclick="resume_btn_click();" id="ResumeBtn" src=' <?php echo base_url() ?>assets/sawan/images/gmap/play.png' /></td> 
                    </tr>
                </table>
            </div>
        <!--</form>-->
        
<!--        <div class="container">-->
            <div class="voffset2 voffset2"></div>
            <div id="map" class="col-md-12"></div>
            <div class="voffset2 voffset2"></div>
            <div class="col-md-12" style="float: right;z-index: 1;position: absolute;bottom: 50px;
                             right: 30px;">
                <input id="myValues" style="visibility: hidden"/>
                <span id="km_ly" style="/*top: -55px;*/
                                  /*left: 75px;*/
                                  color: red;
                                  font-weight: bolder;
                                  font-size: large;"> 0 .00 km</span>
                <div id="win" style="font-weight: bold;font-size:20px;color: black;width:20px;margin-left:160px;"></div>
             </div>
        </div>
    </div>
</div>