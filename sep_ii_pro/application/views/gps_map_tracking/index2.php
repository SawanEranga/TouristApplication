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
                <form class="form-horizontal">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-md-5 control-label">Select a Trip</label>
                      <div class="col-md-2">
                          <select id="selct_trp" name="selct_trp" class="form-control" onchange="load_trip_loc()">
                            <option value="0">Select a Trip</option>
                            <option value="1">Trip 1</option>
                            <option value="2">Trip 2</option>
                        </select>
                      </div>
                    </div>
                </form>
            </div>
        <!--</form>-->
        
<!--        <div class="container">-->
            <div class="voffset2 voffset2"></div>
            <div id="map" class="col-md-12"></div>
            <div class="voffset2 voffset2"></div>
<!--            <div class="col-md-12" style="float: right;z-index: 1;position: absolute;bottom: 50px;
                             right: 30px;">
                <input id="myValues" style="visibility: hidden"/>
                <span id="km_ly" style="/*top: -55px;*/
                                  /*left: 75px;*/
                                  color: red;
                                  font-weight: bolder;
                                  font-size: large;"> 0 .00 km</span>
                <div id="win" style="font-weight: bold;font-size:20px;color: black;width:20px;margin-left:160px;"></div>
             </div>-->
        </div>
    </div>
</div>