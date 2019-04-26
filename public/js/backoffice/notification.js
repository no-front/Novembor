
$(document).ready(function(){ 
    var db = firebase.firestore();
    db.collection("orders")
        .orderBy("created_at", "desc")
        .onSnapshot(function(querySnapshot) {
            var render = "";
            querySnapshot.forEach(function(doc) {
                if (doc.data().read == false) {
                    render += 
                        '<div class="col-12 pb-md-2">'+
                            '<a class="pointer" href="viewnotification/'+ doc.id +'">'+
                                '<div class="block-new-notification relative">'+
                                    '<b>มีการสั่งอาหาร '+ doc.data().total +' รายการ</b>'+
                                    '<div class="text-secondary font-lg-14 pt-md-1">'+
                                        'เบอร์โทร : '+ doc.data().phone +''+
                                    '</div>'+
                                    '<div class="text-secondary font-lg-14 pt-md-1">'+
                                        'จัดส่งที่ : '+ doc.data().location +
                                    '</div>'+
                                    '<div class="label-time-notification">'+
                                        // '1 นาที'+
                                        jQuery.timeago(doc.data().created_at)+
                                    '</div>'+
                                '</div>'+
                            '</a>'+
                        '</div>';
                }else{
                    render += 
                        '<div class="col-12 pb-md-2">'+
                            '<a class="pointer" href="viewnotification/'+ doc.id +'">'+
                                '<div class="block-default-notification relative">'+
                                    '<b>มีการสั่งอาหาร '+ doc.data().total +' รายการ</b>'+
                                    '<div class="text-secondary font-lg-14 pt-md-1">'+
                                        'เบอร์โทร : '+ doc.data().phone +''+
                                    '</div>'+
                                    '<div class="text-secondary font-lg-14 pt-md-1">'+
                                        'จัดส่งที่ : '+ doc.data().location +
                                    '</div>'+
                                    '<div class="label-time-notification">'+
                                        // '1 นาที'+
                                        jQuery.timeago(doc.data().created_at)+
                                    '</div>'+
                                '</div>'+
                            '</a>'+
                        '</div>';
                }
                
                // console.log("time ago : ", jQuery.timeago(doc.data().created_at));
                console.log("time ago : ", jQuery.timeago(doc.data().created_at));

            });
            
        $('#renderlistnotification').html(render);
    });
});
