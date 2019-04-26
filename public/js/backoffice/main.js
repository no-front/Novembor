var config = {
    apiKey: "AIzaSyArPoybVYQsjqisKZP6F_UICpqrnlDKBmc",
    authDomain: "novembor-3b325.firebaseapp.com",
    databaseURL: "https://novembor-3b325.firebaseio.com",
    projectId: "novembor-3b325",
    storageBucket: "novembor-3b325.appspot.com",
    messagingSenderId: "696546652986"
};
firebase.initializeApp(config);
console.log("555555555444444");

$(document).ready(function(){ 
    var defaultCountNotify = 0;
    var db = firebase.firestore();
    db.collection("orders")
        .orderBy("created_at", "desc")
        .onSnapshot(function(querySnapshot) {

            var countNotification = 0;
            querySnapshot.forEach(function(doc) {
                if (doc.data().read == false) {
                    countNotification++;
                }
                
            });
            console.log("countNotification : ", countNotification);
            if (defaultCountNotify > 0) {
                var sound = $('#sound').val();
                var audio = new Audio(String(sound));
                audio.play();
            }
            defaultCountNotify = countNotification;
            if (countNotification > 0) {
                document.getElementById("count-notification").style.display = "block";
                $("#count-notification").text(countNotification);
            }else{
                document.getElementById("count-notification").style.display = "none";
            }
    });
    console.log("454545454556565656565656");
    


    


});




