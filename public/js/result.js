// function initMap() {

//  //initialize();//マップの初期化
 
//     // var map;
//     // var geocoder;
//     var marker = [];
//     var center;
//     //var infoWindow = [];
//     let addressArray = [];

//     var target = document.getElementById('map'); 
//     var geocoder = new google.maps.Geocoder(); 
//     var addressesData = document.getElementsByClassName('address');
//     const addresses = Array.from(addressesData);
//     addresses.forEach(function(address) {
//     var element = address.innerText;
//     addressArray.push(element);
//         });
//         console.log(addressArray);
    
//     let test = [];
        
//     for (let i = 0; i < addressArray.length; i++) {//ピンを多数立てるためにリストの数だけ回す
//         if(addressArray[i] === ""){
//             console.log('失敗')
        
        
//         }else{
//         // test.push(addressArray[i]);
//         // console.log('テスト');
//         // console.log(test);
//         console.log(addressArray[i]);
//             geocoder.geocode({
//             address : addressArray[i]
//         }, function(results, status) { // 結果
//             if (status === 'OK' && results[0]){  
//             // var map = new google.maps.Map(target, {
//             // //results[0].geometry.location に緯度・経度のオブジェクトが入っている
//             // center: results[0].geometry.location,
//             // zoom:11
//             // });
            
//             console.log(i);
//             // if(i === 0){
//             //         map.setCenter(center);
//             //     }
//             // for(let j = 0; j < addressArray.length; i++){
                
//             // }
//             marker[i] = new google.maps.Marker({
//                     position:results[0].geometry.location,
//                     map: map,
//                     animation: google.maps.Animation.DROP
//             });
//             }else{ 
//             //ステータスが OK 以外の場合や results[0] が存在しなければ、アラートを表示して処理を中断
//             alert('失敗しました。理由: ' + status);
//             return;
//             }

//         });
//         }
//     }
// }

// function markerEvent(i) {
//     marker[i].addListener('click', function() { // マーカーをクリックしたとき
//       infoWindow[i].open(map, marker[i]); // 吹き出しの表示
//    ))
// }

//status === google.maps.GeocoderStatus.OK
//let bounds = new google.maps.LatLngBounds();
//bounds.extend(latlng);

function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(37.0547, 135.5936);
    var mapOptions = {
        zoom: 4.5,
        center: latlng
    }
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
}

    var geocoder;//住所から座標を取得
    var latlng;//住所から緯度経度を取得
    var map;
    var marker = [];
    let addressArray = [];
    var addressesData = document.getElementsByClassName('address');
    const addresses = Array.from(addressesData);
    addresses.forEach(function(address) {
        if(address.innerText !== ""){
            var element = address.innerText;
        addressArray.push(element);
        }
    });
    //console.log(addressArray);

function initMap() {

    initialize();//マップの初期化

    for (let i = 0; i < addressArray.length; i++) {//ピンを多数立てるためにリストの数だけ回す
        geocoder.geocode({
            "address" : addressArray[i]
        }, function(results, status) { // 結果
            if (status === google.maps.GeocoderStatus.OK) { // ステータスがOKの場合
                let bounds = new google.maps.LatLngBounds();
                latlng = results[0].geometry.location;
                bounds.extend(latlng);

                //簡易的にしていますが本来はマップの中心に持ってきたい座標でのみmap.setCenter(latlng);をするべきだと思います。
                if(i === 0){
                    map.setCenter(latlng);
                }

                //マーカーを立てる
                marker[i] = new google.maps.Marker({
                    position: latlng,
                    map: map
                });

            } else { // 失敗した場合
                console.group('Error');
                console.log(results);
                console.log(status);
            }

        });
    }
}