<!-- marging between search bar and navbar is the margin bottom of navbar custom
 -->

<div class="container-fluid" data-spy="affix" id="affix-search-bar">
     <!-- <div  class="nav navbar-default container-fluid"> -->

<form class="form-inline">
<div class="row">

        <div class="col-xs-2">
            <h3>All Listings<small> (<?php echo $listings_count; ?>)</small></h3>
        </div>

        <div class="col-xs-8  col-md-3">
            <h4 class="purple-text" id="listing-type-h3">Cost</h4>
            <div class="input-group">
                <div class="input-group-addon search-dol-sign">$</div>
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="min">
                <div class="input-group-addon search-dol-sign">$</div>
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="max">
            </div>
        </div>

        <div class="col-xs-3 col-md-1">
            <h4 class="purple-text" id="listing-type-h3">Bedroom</h4>
            <div class="dropdown clearfix input-dropdown"> 
            <button class="btn dropdown-toggle dropdown-button" type="button" id="dropdown-beds" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Beds <span class="caret"></span> </button> 
            
                <ul class="dropdown-menu" aria-labelledby="dropdown-beds"> 
                    <li><a href="#">Studio</a></li> 
                    <li><a href="#">1</a></li> 
                    <li><a href="#">2</a></li> 
                    <li><a href="#">3</a></li> 
                    <li><a href="#">4</a></li>  
                </ul> 
            </div>  
        </div>

    <div class="col-xs-3 col-md-1 serchbar-field">
            <h4 class="purple-text" id="listing-type-h3">Bathroom</h4>
            <div class="dropdown clearfix input-dropdown"> 
            <button class="btn dropdown-toggle dropdown-button" type="button" id="dropdown-baths" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Baths <span class="caret"></span> </button> 
                <ul class="dropdown-menu" aria-labelledby="dropdown-baths"> 
                    <li><a href="#">1</a></li> 
                    <li><a href="#">2</a></li> 
                    <li><a href="#">3</a></li> 
                    <li><a href="#">4</a></li>  
                </ul> 
            </div>  
        </div>

    <form action="<?php echo URL; ?>home/search" method="GET">
        <div class="col-xs-4 col-md-2 serchbar-field">
            <h4 class="purple-text" id="listing-type-h3">Listing Type</h4>
            <div class="dropdown clearfix input-dropdown"> 
                <button class="btn dropdown-toggle dropdown-button" type="button" id="dropdown-beds" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                <?php if (isset($_GET["type"])) echo $_GET["type"]; else echo "Type"; ?><span class="caret"></span> </button>
                <ul class="dropdown-menu" id="typeList" aria-labelledby="dropdown-listing-type">
                    <li><a href="#">All</a></li>
                    <li><a href="#">House</a></li>
                    <li><a href="#">Townhouse</a></li>
                    <li><a href="#">Apartment</a></li>
                    <li><a href="#">Condo</a></li>
                </ul>
                    <input id="typeInput" type="hidden" name="type" />
                    <?php
                    if (isset($_GET["search"])){ ?>
                        <input type="hidden" name="search" value="<?php echo $_GET["search"]; ?>" />
                    <?php }?>
                <button id="submitFilter" type="submit" style="display:none;" name="submit_filter" value="success" />
            </div>
        </div>
    </form>

</div>         
</form>
</div>
<!-- end search bar -->

<div class="container-fluid">
 <div class="row">
     <?php foreach ($listings as $entry) { ?>
        <div class="col-xs-12  col-sm-12 col-md-6 col-lg-6 listing-preview" style="margin: 15px 0px 15px 0px; box-shadow:0 0 0 3px #ccc;" >
            <div class="row listing-preview-banner">
                    <h3 class="inline listing-preview-h pull-left"><?php
                        if (isset($entry->city)) echo htmlspecialchars($entry->city, ENT_QUOTES, 'UTF-8');
                        echo ", ";
                        if (isset($entry->zip)) echo htmlspecialchars($entry->zip, ENT_QUOTES, 'UTF-8');
                        ?></h3>
            </div>
            <div class="row">
                <div  class="col-xs-7 col-md-8 listing-image-pane">
                    <div class="img listing-preview-img pull-left">
                        <?php echo '<img style="margin: 0 auto; max-height: 220px; min-height: 220px; max-width: 350px; min-width:350px" class="img-responsive listing-index-images" src="data:image/png;base64,'. base64_encode(file_get_contents(glob($entry->image."*")[0])) .'" />'; ?>
                    </div>
                </div>
                <div  class="col-xs-5 col-lg-4 listing-details-pane" style="margin-left: -5%; margin-top: 2%;">
                    <div class="pull-right" id="fav-it">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </div>
                    <h4><b>$<?php if (isset($entry->price)) echo htmlspecialchars($entry->price, ENT_QUOTES, 'UTF-8'); ?></b></h4>
                    <h5 style="font-weight: bold"><?php if (isset($entry->type)) echo htmlspecialchars($entry->type, ENT_QUOTES, 'UTF-8'); ?> -<h9 style="color: green"> available now</h9></h5>

                        <div class="table-responsive">
                        <table class="table">
                             <thead>
                                 <tr>
                                    <th><span class="fa fa-bus " aria-hidden="true"></span></th>
                                    <th><span class="fa fa-bicycle" aria-hidden="true"></span></th>
                                    <th> <i class="fa fa-car" aria-hidden="true"></i> </th>
                                    <th>  <img  id="transit-icon" src="<?php echo URL; ?>img/walking.png"> </th>
                                </tr>
                            </thead>
                        <tbody>
                            <tr>
                            <td><?php if (isset($entry->bus)) echo htmlspecialchars($entry->bus, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php if (isset($entry->bike)) echo htmlspecialchars($entry->bike, ENT_QUOTES, 'UTF-8'); ?>m</td>
                            <td><?php if (isset($entry->car)) echo htmlspecialchars($entry->car, ENT_QUOTES, 'UTF-8'); ?>m</td>
                            <td><?php if (isset($entry->walk)) echo htmlspecialchars($entry->walk, ENT_QUOTES, 'UTF-8'); ?>m</td>

                            </tr>
                        </tbody>
                        </table>
                        </div>
                    <a href="<?php echo URL."listing/detail?entry=".$entry->id; ?>"  target="_blank">
                        <button style="width: 45%; color: gold; background-color: rgb(50,2,50);">Details</button>                    </a>
                    <button type="button" style="width: 45%; color: gold; background-color: rgb(50,2,50);" data-toggle="modal" data-target="#apply-listing-modal" class="apply-btn">Apply</button>
                   <span class="hidden"  id="listing-id">
                  <?php echo $entry->id; ?>
                </span>
                <span  class="hidden" id="lister-id">
                  <?php echo $entry->user_id; ?>
                </span>
                    <br>
                </div>
            </div>
            <div class="row listing-preview-banner"></div>
        </div>
     <?php } ?>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var listingID;
        $("#apply-listing-send-btn").click(function(){
            $textarea = $('#apply-listing-modal').find('textarea')
            var text = $textarea.val();
            $textarea.val('');
            console.log(text);
            var app_url = url+'listingApplications/create';
            $.ajax({ url: app_url,
                  data: {listing_id: listingID, 
                            user_id: 9, 
                            comment: text},
                    type: 'post',
                    success: function(output) {
                        console.log(output);
                    }
             });
        });

        $(".apply-btn").click(function() {
            $btn  = $(this);
            listingID = $btn.parent().find("#listing-id").text().trim();
        });
        


        $("#fav-it").click(function () 
        {
            var x = $("#fav-it").children();
            if (x.hasClass('fa-heart')){
                x.removeClass('fa-heart');
                x.addClass('fa-heart-o');
            } else {
                x.removeClass('fa-heart-o');
                x.addClass('fa-heart');   
            }
        });
        


        console.log($("#navbar-custom"));
        $("#navbar-custom").removeClass("navbar-fixed-top");
        console.log(($("#navbar-custom").height()-20));
        $('#affix-search-bar').affix({
        offset: {
                top:  ($("#navbar-custom").height()-20),
                bottom: function () {
                return (this.bottom = $('.footer').outerHeight(true))
            }
        }
        });
    });

    $("#typeList li").on("click", function(){
        document.getElementById("typeInput").value = $(this).text();
        document.getElementById("submitFilter").click();
    });
</script>
