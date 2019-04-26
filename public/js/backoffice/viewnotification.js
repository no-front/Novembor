$(document).ready(function(){
  var db = firebase.firestore();
  var firebaseID = $("#firebaseID").val();

  // var updates = {};
  //   updates["/orders/" + String(firebaseID) + "/read"] = true;
  //   firebase.firestore().ref().update(updates)

  // db.collection("orders").doc("frank").update({"favorites.firebase": "Help"})
  // db.collection("orders").doc(String(firebaseID)).update({"read": true})
  db.collection("orders").doc(String(firebaseID)).update({"read": true})

  console.log(updates, "data");

  // firebase.database().ref().update(updates);
});

  var map;
  function initMap() {
    var location = {lat: parseFloat($('#latitude').val()), lng: parseFloat($('#longtitude').val())};
    
    console.log(location);
    
    map = new google.maps.Map(document.getElementById('map'), {
      center: location,
      zoom: 15
    });
    var marker = new google.maps.Marker({
      position: location,
      map: map,
      title: 'Hello World!'
    });
  }