<span class="hidden" id="user_id">
  
   <?php echo $_SESSION['id']?>
</span>

<span class="hidden" id="user_name">
  <?php echo $_SESSION["firstname"]. ' '. $_SESSION["lastname"]?>
   
</span>


<div id="dashboard" class="container-fluid">
  <div class="row">
  
    <div class="col-sm-8 main">
          <h1 class="page-header">Dashboard</h1>
      <h2 class="sub-header">My Listings</h2>
      <?php foreach ($listings as $entry) { ?>
        <div class="panel panel-default">
          
          <div class="panel-heading panel-heading-custom panel-heading-posted">
            <h3 class="panel-title inline">
              <?php if (isset($entry->address))echo htmlspecialchars($entry->address, ENT_QUOTES, 'UTF-8'); ?>
              <?php if (isset($entry->city))echo htmlspecialchars($entry->city, ENT_QUOTES, 'UTF-8'); ?>
              <?php if (isset($entry->price))echo "$".htmlspecialchars($entry->price, ENT_QUOTES, 'UTF-8'); ?>
            </h3>
            <span class="hidden"  id="listing-id"> 
              <?php echo $entry->id; ?>
            </span>
            <span  class="hidden" id="lister-id">
              <?php echo $entry->user_id; ?>
            </span>
              <span class="glyphicon glyphicon-trash inline pull-right dash-listing-control-glyph" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-pencil inline pull-right dash-listing-control-glyph" aria-hidden="true"></span>
          </div>
          <!-- end panel heading -->
          <div class="panel-body">
            <h3 class="sub-header">Applicants</h3>
          </div>
      </div>
      <!-- end panel -->
    <?php } ?>
        
      <h2 class="sub-header">Listings Applied For</h2>
      <div class="panel panel-default" id="listings-applied-panel">
        <div class="panel-heading" id="applied-listings-heading">Listings<span class="glyphicon glyphicon-th-list pull-right" aria-hidden="true"></span></div>
        <!-- <div class="panel-body">
             
        </div> -->
          <ul class="list-group" id="applied-list-group">
          </ul>
      </div>
      <!-- end #listings-applied-panel -->

    <h2 class="sub-header">Profile</h2>

    <div class="panel panel-default" id="profile-panel">
      
      <div class="panel-heading" id="panel-heading-profile">
        <h3 class="panel-title">Edit Profile<span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"></span></i>
</h3>
      </div>
      <!-- end panel-heading -->
        
      <div class="panel-body">
        <div class="dashboard-form">
          <div class=" row " id="dash-profile-image">
            <?php if (isset($_SESSION["image"])){ echo '<img class="img-thumbnail" alt="Profile Photo" src="data:image/jpeg;base64,'. base64_encode($_SESSION["image"]) .'" />';}
            else echo '<img class="img-thumbnail" src="http://www.clker.com/cliparts/B/R/Y/m/P/e/blank-profile-hi.png"  />' ?> 
          </div>

          <form id="update-profile-form" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name">First Name</label>
                <input type="name" name="first_name" class="form-control" id="name" <?php echo 'value="'.$_SESSION["firstname"].'"'?> >
            </div>
            <div class="form-group">
              <label for="last-Name">Last Name</label>
                <input type="last-Name" name="last_name" class="form-control" id="last-Name" <?php echo 'value="'.$_SESSION["lastname"].'"'?>>
            </div>
            <div class="form-group ">
              <label for="email">Email address</label>
              <input type="email" name="email" class="form-control" id="email" <?php echo 'value="'.$_SESSION["email"].'"'?>>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
                <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
             <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder=" Confirm Password">
              </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input type="file" name="profile_pic" id="exampleInputFile">
            </div>
              <button type="submit" name="update_data" class="btn btn-default" id="save-profile">Save</button>
          </form>




        </div>
        <!-- end dashboard form -->
          


        </div> 
        <!-- end panel body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-8 -->

    <div class="col-sm-4">
    <div class="row">
      
      <div id="chat-window" class="affix">
      
      <div id="chat-window-header">
        <p>Chat window Header</p>
      </div>
      <!-- end chat window header -->
      <div id="chat-window-body">
        <p>Chat window</p>
        <p>Chat window</p>
        <p>Chat window</p>
        <p>Chat window</p>
        <p>Chat window</p>
        <p>Chat window</p>
        <p>Chat window</p>
        <p>Chat window</p>
      </div>

      <div id="chat-window-input">
          <textarea class="form-control" id="chat-text-area"></textarea>
      </div>
      
        
      </div>
      <!-- end chat window -->
    </div>
    <!-- end row -->


    </div>
      <!-- end col-sm-4 -->

  </div>
  <!-- end row -->
</div>
<!-- end dashboard -->








<!-- <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
 -->

<script type="text/javascript">

$(document).ready(function() {

  var user_id_logged = $("#user_id").text().trim();
  

  $("#chat-window").hide();
  //set event listner to send messgae
              $("#chat-text-area").keypress(function (e) {
                  if(e.which == 13) {
                    e.preventDefault();
                    console.log('message sent')
                    saveMessage(this.value);
                    this.value = '';
                  }
              });


  function startChat(listingID) {
    // if (dbRef  && typeof dbRef !== 'undefined' ) {
    //   dbRef.off();
    // }
    dbRef = firebase.database().ref('chats'+'/' + listingID + '/' + user_id_logged)
    $("#chat-window-body").empty();
    loadMessages()
    $("#chat-window").show();
    

  }

  $('#applied-listings-heading').click(function(){
      $header = $(this);
      // $header.siblings().slideToggle(50);
      if(this.clickedBefore) {
        return 
      } else {
        this.clickedBefore=true;
      }
    $.ajax({
      url: url+'user/getListingsUserAppliedFor',
      type: 'GET',

      success: function(data) {
        var listings = JSON.parse(data);
        console.log(listings);
        for(var i = 0; i<listings.length; i++){

           // var htm =  
           //            '<img src="'+ listings[i]["image"] +'" class="img-responsive img-thumbnail" alt="Responsive image">'+ 
           //              listings[i]["listing_id"] 



           var htm = '<li class="list-group-item">' + 
                        '<span> <a href="' + url + '/listing/detail?entry=' + listings[i]['id'] + '">' +
                            listings[i]["address"] + ', ' + listings[i]["city"] +
                        '</a> <span>' + 
                          ' <span class="glyphicon glyphicon-envelope pull-right applier-chat" aria-hidden="true"' + 
                             'listing-id='+ listings[i]['id']   + '></span>' +
                      '</li>';
          $("#applied-list-group").append(htm);

        }
        // end for loop

        $(".applier-chat").click(function(){
          startChat(this.getAttribute("listing-id"));
        });
      }
      // end success

    });



  }); 



  $("form#update-profile-form").submit(function(e){
      e.preventDefault();
      var frm = $(this)[0];
      console.log(frm);
      var formData = new FormData(frm);
      for (var pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]); 
      }

      $.ajax({
        url: url+'user/update',
        type: 'POST',
        data: formData,
        // async: false,
        success: function (data) {
            console.log(data);
        },
        cache: false,
        contentType: false,
        processData: false
    });

  });


//   $( "form#update-profile-form" ).on( "submit", function( event ) {
//   event.preventDefault();
//   console.log($(this));
//   var formData = new FormData($("#update-profile-form"));
//   for (var pair of formData.entries()) {
//     console.log(1);
//     console.log(pair[0]+ ', ' + pair[1]); 
//   }
// });

  // save-profile
  // $("#save-profile").click(function(e) {
  //   e.preventDefault();
  //   console.log('save-profile');
  //   console.log($("#update-profile-form"))
  //   console.log($("#update-profile-form").serialize());
    // url: $("form").attr("action"),
    // $.ajax({
    //   type: 'POST',
    //   data: $("form").serialize(), 
    //   //or your custom data either as object {foo: "bar", ...} or foo=bar&...
    //   success: function(response) { ... },
    // });


  // });

        $("#profile-link").click(function(e){
          console.log('profile');
          $('#dashboard').find(".main").hide();
            e.preventDefault();
        });

          $(".panel-heading-posted").siblings().hide();

        $('[data-toggle="tooltip"]').tooltip(); 


      $(".glyphicon-trash").click(function(event){
        $trash = $(this);
        var listingID = $trash.parent().find("#listing-id").text().trim();
        var listerID = $trash.parent().find("#lister-id").text().trim();
        console.log("listing id :" + listingID);
        console.log(url); 
        var del_url = url + "listing/delete"
        $.ajax({ url: del_url,
                data: {listingID: listingID},
                type: 'post',
                success: function(output) {
                    console.log(output);
               }
        });
        
        $trash.parent().parent().slideToggle(50);
        event.stopPropagation();
      });

      $(".glyphicon-pencil ").click(function(){
        event.stopPropagation();
        alert('edit');
      });
      


      // <img src="..." class="img-responsive" alt="Responsive image">
      // <img src="..." alt="..." class="">
      // 


      $("#panel-heading-profile").click(function(){
        $header = $(this);
         $header.siblings().slideToggle(50);
      });


      $(".panel-heading-posted").click(function(){
        $header = $(this);
        $pBody = $header.siblings(".panel-body")
        var listingID = $header.find("#listing-id").text().trim();
        $header.siblings().slideToggle(50);
        if(this.clickedBefore){
          return;
        }else{
          this.clickedBefore = true;
        }
        $.ajax({
          url: url+'listingApplications/getApplicants',
          data:{listing_id: listingID},
          type: 'get',
          success: function(applicants) {
            console.log(applicants);
            var apps_json = JSON.parse(applicants);
              for (var i = 0; i < apps_json.length; i++) {
                    var htmlStr = '<div class="listing-applicant">'+
                                  '<img src="https://www.2025ad.com/typo3conf/ext/providerconti/Resources/Public/src/Images/profil-pic_dummy.png" class="img-respnsive img-circle img-circle-custom" alt="Responsive image">'+
                                  '<span class="app-comment">'+    apps_json[i]["username"]+ ' : '  +'</span>'+
                                  '<span class="app-comment">'+    apps_json[i]["comment"]   +'</span>'+
                                  '<p class="hidden user-id">'  + apps_json[i]["user_id"] + '</p>' +
                                  '</div>';



                    // '<div class="dashboard-applicant">'+
                    //               '<p class="hidden user-id">' + apps_json[i]["user_id"] + '</p>'
                    //               <span>'+ 
                    //                apps_json[i]["comment"] + '</span></div>';

                    $pBody.append(htmlStr);
            }
             $(".listing-applicant").click(function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        $app = $(this)
                        var userID = $app.find(".user-id").text().trim();
                        // if (dbRef  && typeof dbRef !== 'undefined' ) {
                        //   dbRef.off();
                        // }
                        dbRef = firebase.database().ref('chats'+'/' + listingID + '/' + userID)
                        $("#chat-window-body").empty();
                        loadMessages()
                        $("#chat-window").show();

            
              });


             //set event listner to send messgae
              // $("#chat-text-area").keypress(function (e) {
              //     if(e.which == 13) {
              //       e.preventDefault();
              //       console.log('message sent')
              //       saveMessage(this.value);
              //       this.value = '';
              //     }
              // });





          }
        });
      });


});

var dbRef;

function loadMessages() {
  // Make sure we remove all previous listeners.
  dbRef.off();
  // Loads the last 12 messages and listen for new ones.
  var setMessage = function(data) {
    var val = data.val();
    console.log(val);
    displayMessage(data.key, val.username, val.text, val.photoUrl, val.imageUrl);
  }
  dbRef.limitToLast(12).on('child_added', setMessage);
  dbRef.limitToLast(12).on('child_changed', setMessage);
};

function displayMessage(key, username, text, photo, imageUrl) {
  $("#chat-window-body").append('<p>' + username +' : ' + text +'</p>');

}


function sendMessage(message, dbRef) {


}



var user_name_logged = $("#user_name").text().trim();
function saveMessage(text){
  console.log(user_name_logged);
  dbRef.push({username:user_name_logged, text: text});
}











// end document ready      
</script>