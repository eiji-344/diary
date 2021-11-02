function initMap() {

 //initialize();//マップの初期化
 
    // var map;
    // var geocoder;
    var marker = [];
    var center;
    //var infoWindow = [];
    let addressArray = [];

    var target = document.getElementById('map'); 
    var geocoder = new google.maps.Geocoder(); 
    var addressesData = document.getElementsByClassName('address');
    const addresses = Array.from(addressesData);
    addresses.forEach(function(address) {
    var element = address.innerText;
    addressArray.push(element);
        });
        console.log(addressArray);
    
    let test = [];
        
    for (let i = 0; i < addressArray.length; i++) {//ピンを多数立てるためにリストの数だけ回す
        if(addressArray[i] === ""){
            console.log('失敗')
        
        
        }else{
        // test.push(addressArray[i]);
        // console.log('テスト');
        // console.log(test);
        console.log(addressArray[i]);
            geocoder.geocode({
            address : addressArray[i]
        }, function(results, status) { // 結果
            if (status === 'OK' && results[0]){  
            // var map = new google.maps.Map(target, {
            // //results[0].geometry.location に緯度・経度のオブジェクトが入っている
            // center: results[0].geometry.location,
            // zoom:11
            // });
            
            console.log(i);
            // if(i === 0){
            //         map.setCenter(center);
            //     }
            // for(let j = 0; j < addressArray.length; i++){
                
            // }
            marker[i] = new google.maps.Marker({
                    position:results[0].geometry.location,
                    map: map,
                    animation: google.maps.Animation.DROP
            });
            }else{ 
            //ステータスが OK 以外の場合や results[0] が存在しなければ、アラートを表示して処理を中断
            alert('失敗しました。理由: ' + status);
            return;
            }

        });
        }
    }
}

// function markerEvent(i) {
//     marker[i].addListener('click', function() { // マーカーをクリックしたとき
//       infoWindow[i].open(map, marker[i]); // 吹き出しの表示
//    ))
// }

//status === google.maps.GeocoderStatus.OK
//let bounds = new google.maps.LatLngBounds();
//bounds.extend(latlng);