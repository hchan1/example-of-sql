<div class="jumbotron" id="my-jumbotron">
    <div class = "container-fluid">
        <h1 class="text-center">Gator Space</h1>
        <p class="text-center">A housing rental website for SFSU students</p><br>
    </div>
        <div class="container-fluid input-area">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
               <!-- <form action="<?php echo URL; ?>home/search" method="POST">
                <div class="col-md-5">
                    <input type="text" style="height:40px; box-shadow:0px 0 white, 0px 0 white, 0 7px 4px -3px black;" placeholder="Enter an address, city, or ZIP code" name="search" value="" required class="form-control" id="jumbo-search-input">
                    <input type="hidden" name="search_keyword" value="<?php echo $searchBy; ?>" />
                </div>
                <div class="col-md-4">
                    <button type="submit" name="submit_search" id="btn-yellow" class="btn btn-warning" style="height:40px; box-shadow:0px 0 white, 0px 0 white, 0 7px 4px -3px black;">Search <span class="glyphicon glyphicon-search"></span></button>
                </div>
                </form> -->
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="text-center">All <?php echo $result_title; ?> <small>(<?php echo $listings_count; ?>)</small><h1>
    <div class="row">
        <?php foreach ($listings as $entry) { ?>
        <div class="col-xs-6 col-md-3">
            <a href="<?php echo URL."listing/detail?entry=".$entry->id; ?>" target="_blank" class="thumbnail" style="box-shadow:0px 0 white, 0px 0 white, 7px 7px 8px -4px black;">
                <div id="mycarousel" class="carousel slide" data-ride="carousel" data-interval="false" style="max-height: 700px; overflow: hidden;">
                    <div class="carousel-inner" style=" width:100%; height: 80%; !important;">
                        <div class="item active">
                            <?php echo '<img  style="margin: 0 auto; max-height: 170px; min-height: 170px;"  src="data:image/png;base64,'. base64_encode(file_get_contents(glob($entry->image."*")[0])) .'" />'; ?>
                            <div class="carousel-caption pull-right" style="bottom: 55%; left: 0%; width: 100%;" >
                                <h1 style="background-color: rgba(204, 204, 204, 0.5); color: rgb(254,203,69); text-align: right; font-size: xx-large"> $ <?php if (isset($entry->price)) echo htmlspecialchars($entry->price, ENT_QUOTES, 'UTF-8'); ?></h1>
                            </div>
                            <div class="carousel-caption pull-left" style="bottom: -19%; left: 0%; width: 100%" >
                                <h1 style="background-color: rgba(204, 204, 204, 0.5); color: rgb(50,2,50); text-align: left; font-size: xx-large"> <?php if (isset($entry->city)) echo htmlspecialchars($entry->city, ENT_QUOTES, 'UTF-8'); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="table-layout: fixed; word-break: break-all;">
                    <table class="table" >
                        <thead>
                        <tr style="font-size: large; color: black;">
                            <th><span class="fa fa-bus" aria-hidden="true"></span></th>
                            <th><span class="fa fa-bicycle" aria-hidden="true"></span></th>
                            <th> <i class="fa fa-car" aria-hidden="true"></i> </th>
                            <th><img id="transit-icon" src="<?php echo URL; ?>img/walking.png"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="font-size: medium; color: rgb(50,2,50);">
                            <td><?php if (isset($entry->bus)) echo htmlspecialchars($entry->bus, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php if (isset($entry->bike)) echo htmlspecialchars($entry->bike, ENT_QUOTES, 'UTF-8'); ?>m</td>
                            <td><?php if (isset($entry->car)) echo htmlspecialchars($entry->car, ENT_QUOTES, 'UTF-8'); ?>m</td>
                            <td><?php if (isset($entry->walk)) echo htmlspecialchars($entry->walk, ENT_QUOTES, 'UTF-8'); ?>m</td>
                        </tr>
                        </tbody>
                    </table>                    <h3 style="border-width: 2px; border-color: dimgray; border-style:solid; text-align: center; color: gold; background-color: rgb(50,2,50);">Apply</h3>                </div>
            </a>
        </div>
        <?php } ?>
    </div>
            <a href="<?php echo URL; ?>listing"><h5><u>Browse more ></u></h5></a>
</div>

